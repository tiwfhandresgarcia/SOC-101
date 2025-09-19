#!/usr/bin/env bash
# manage_soc101.sh - Automatiza SOC-101 + WebGoat + Nginx con Docker Compose
# Uso rápido:
#   ./manage_soc101.sh setup        # instala docker y compose si faltan
#   ./manage_soc101.sh up           # build + up -d
#   ./manage_soc101.sh down         # down
#   ./manage_soc101.sh restart      # restart
#   ./manage_soc101.sh status       # docker-compose ps
#   ./manage_soc101.sh logs [svc]   # logs de todo o de un servicio (nginx|webgoat|soc101)
#   ./manage_soc101.sh prune        # elimina contenedores/volúmenes huérfanos
#   ./manage_soc101.sh enable       # crea servicio systemd para arranque automático
#   ./manage_soc101.sh disable      # deshabilita servicio systemd
#   ./manage_soc101.sh doctor       # chequeos de puertos y archivos clave

set -euo pipefail

PROJECT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
COMPOSE_FILE="${PROJECT_DIR}/docker-compose.yml"
NGINX_CONF="${PROJECT_DIR}/nginx.conf"
SERVICE_NAME="soc101.service"

# Escoge docker compose (plugin v2) o docker-compose (v1)
dc() {
  if command -v docker &>/dev/null && docker compose version &>/dev/null; then
    docker compose -f "$COMPOSE_FILE" "$@"
  else
    docker-compose -f "$COMPOSE_FILE" "$@"
  fi
}

need_sudo() {
  if [[ $EUID -ne 0 ]]; then echo "sudo"; fi
}

check_bin() {
  command -v "$1" >/dev/null 2>&1
}

install_docker() {
  echo "[*] Instalando Docker..."
  $(need_sudo) apt-get update -y
  $(need_sudo) apt-get install -y docker.io
  $(need_sudo) systemctl enable --now docker
  $(need_sudo) usermod -aG docker "$USER" || true
  echo "[*] Docker instalado. (Cierra y abre sesión si quieres usarlo sin sudo)"
}

install_compose() {
  echo "[*] Instalando Docker Compose..."
  # Preferir plugin v2 si está en repos
  if apt-cache policy docker-compose-plugin 2>/dev/null | grep -q Candidate; then
    $(need_sudo) apt-get install -y docker-compose-plugin
  else
    # v1 (legacy) desde repos de Debian/Kali
    $(need_sudo) apt-get install -y docker-compose
  fi
  echo "[*] Docker Compose instalado."
}

check_ports() {
  # Nginx (host) -> 8000:80 por defecto en tu compose; Apache dashboard 8080; WebGoat 8081/9091
  echo "[*] Comprobando puertos de host (8000, 8080, 8081, 9091)..."
  for P in 8000 8080 8081 9091; do
    if ss -ltn "( sport = :$P )" | grep -q ":$P"; then
      echo "  - Puerto $P: OCUPADO"
    else
      echo "  - Puerto $P: libre"
    fi
  done
}

doctor() {
  echo "=== SOC-101 Doctor ==="
  [[ -f "$COMPOSE_FILE" ]] && echo "[OK] docker-compose.yml encontrado" || { echo "[ERROR] Falta docker-compose.yml"; exit 1; }
  [[ -f "$NGINX_CONF"  ]] && echo "[OK] nginx.conf encontrado" || { echo "[WARN] Falta nginx.conf (revisa proxy)"; }
  if ! check_bin docker; then echo "[WARN] Docker no instalado"; else docker --version || true; fi
  if docker compose version &>/dev/null; then
    echo "[OK] docker compose (plugin v2) disponible"
  elif check_bin docker-compose; then
    echo "[OK] docker-compose (v1) disponible"
  else
    echo "[WARN] Docker Compose no instalado"
  fi
  check_ports
  echo "======================="
}

setup() {
  echo "=== Setup dependencias ==="
  check_bin docker || install_docker
  if docker compose version &>/dev/null; then
    echo "[OK] docker compose v2 presente"
  elif check_bin docker-compose; then
    echo "[OK] docker-compose v1 presente"
  else
    install_compose
  fi
  echo "=== Setup listo ==="
}

up() {
  echo "=== Levantando stack (build + up -d) ==="
  dc build
  dc up -d
  dc ps
  echo "[*] Accesos esperados:"
  echo " - Dashboard: http://localhost:8080/"
  echo " - Proxy Nginx: http://localhost:8000/"
  echo " - WebGoat vía proxy: http://localhost:8000/lab/webgoat/"
  echo " - WebGoat directo:  http://localhost:8081/WebGoat"
}

down() {
  echo "=== Down (contenedores) ==="
  dc down
}

restart() {
  echo "=== Restart ==="
  dc down
  dc up -d
  dc ps
}

status() {
  echo "=== Estado ==="
  dc ps
}

logs() {
  local svc="${1:-}"
  echo "=== Logs ${svc:-(todos)} ==="
  if [[ -n "$svc" ]]; then
    dc logs -f "$svc"
  else
    dc logs -f
  fi
}

prune() {
  echo "=== Limpiando recursos huérfanos ==="
  dc down -v
  $(need_sudo) docker system prune -f
  $(need_sudo) docker volume prune -f
  $(need_sudo) docker network prune -f
  echo "[*] Limpieza completa."
}

enable_service() {
  echo "=== Creando servicio systemd: ${SERVICE_NAME} ==="
  local svc_path="/etc/systemd/system/${SERVICE_NAME}"
  $(need_sudo) bash -c "cat > '$svc_path' <<'EOF'
[Unit]
Description=SOC101 & WebGoat Stack
Requires=docker.service
After=docker.service

[Service]
Type=oneshot
RemainAfterExit=true
WorkingDirectory=${PROJECT_DIR}
ExecStart=$(command -v docker) compose -f ${COMPOSE_FILE} up -d || $(command -v docker-compose) -f ${COMPOSE_FILE} up -d
ExecStop=$(command -v docker) compose -f ${COMPOSE_FILE} down || $(command -v docker-compose) -f ${COMPOSE_FILE} down
TimeoutStartSec=0

[Install]
WantedBy=multi-user.target
EOF"
  $(need_sudo) systemctl daemon-reload
  $(need_sudo) systemctl enable "$SERVICE_NAME"
  $(need_sudo) systemctl start "$SERVICE_NAME"
  $(need_sudo) systemctl status "$SERVICE_NAME" --no-pager || true
  echo "[*] Servicio habilitado: se iniciará automáticamente al arrancar."
}

disable_service() {
  echo "=== Deshabilitando servicio systemd: ${SERVICE_NAME} ==="
  $(need_sudo) systemctl stop "$SERVICE_NAME" || true
  $(need_sudo) systemctl disable "$SERVICE_NAME" || true
  $(need_sudo) rm -f "/etc/systemd/system/${SERVICE_NAME}"
  $(need_sudo) systemctl daemon-reload
  echo "[*] Servicio eliminado."
}

usage() {
  cat <<USAGE
Uso: $0 <comando>

Comandos:
  setup         - Instala y configura Docker/Compose si faltan
  up            - Construye y levanta el stack en segundo plano
  down          - Detiene y baja los contenedores
  restart       - Reinicia el stack
  status        - Muestra estado (ps)
  logs [svc]    - Logs en vivo (nginx|webgoat|soc101 o todos)
  prune         - Limpia contenedores/volúmenes/redes huérfanos
  enable        - Crea y habilita servicio systemd (arranque automático)
  disable       - Deshabilita/elimina servicio systemd
  doctor        - Chequea dependencias, archivos y puertos
USAGE
}

main() {
  local cmd="${1:-}"
  case "$cmd" in
    setup) setup ;;
    up) up ;;
    down) down ;;
    restart) restart ;;
    status) status ;;
    logs) shift || true; logs "${1:-}";;
    prune) prune ;;
    enable) enable_service ;;
    disable) disable_service ;;
    doctor) doctor ;;
    *) usage; exit 1 ;;
  esac
}

main "$@"
