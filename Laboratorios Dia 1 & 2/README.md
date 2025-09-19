
# SOC-101 · Laboratorio Interactivo de Redes y Seguridad

Proyecto desarrollado para la **Academia de Ciberseguridad**  
Instructor: **Jose Angel Alamillo**

---

## 📖 Descripción

**SOC-101** es un laboratorio interactivo diseñado para enseñar fundamentos de redes, seguridad y análisis de amenazas.  
Incluye retos prácticos, integración con WebGoat, automatización con Docker, y soporte para despliegue en servidores o entornos locales.

El laboratorio está diseñado con un enfoque **60% práctico y 40% teórico**, ofreciendo escenarios reales para reforzar el aprendizaje.

---

## 🚀 Características principales

- **Dashboard SOC101** con interfaz amigable.
- **Retos prácticos** progresivos:
  - Reto 1: HTTP Básico
  - Reto 2: FTP Inseguro
  - Reto 3: Tráfico Sospechoso
  - Reto 4: Firewall y Hardening
- Integración con **WebGoat** para aprender OWASP Top 10.
- Automatización con **Docker Compose**.
- Compatible con despliegue en:
  - Entorno local.
  - AWS / VPS con IP pública.
  - Plantillas personalizadas (AMI, OVA).

---

## 📂 Estructura del proyecto

```bash
soc-101/
├── docker-compose.yml        # Orquestación de servicios
├── nginx.conf                 # Configuración del proxy reverso
├── netsec-playgrounds/        # Dashboard y retos
│   ├── Dockerfile             # Imagen base para los retos
│   ├── services/              # Servicios internos (ej. vsftpd)
│   └── web/                   # Código de la interfaz web
│       ├── index.php          # Página principal
│       ├── reto1/             # Reto HTTP
│       ├── reto2/             # Reto FTP
│       ├── reto3/             # Reto Beaconing
│       └── reto4/             # Reto Firewall
└── manage_soc101.sh           # Script de automatización
```

---

## 🛠️ Requisitos previos

Asegúrate de tener instalado en tu sistema:

- [Docker](https://www.docker.com/)  
- [Docker Compose](https://docs.docker.com/compose/)

Para verificar, ejecuta:
```bash
docker --version
docker-compose --version
```

---

## ⚙️ Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/tu-usuario/soc-101.git
   cd soc-101
   ```

2. **Dar permisos al script:**
   ```bash
   chmod +x manage_soc101.sh
   ```

3. **Configurar e iniciar el laboratorio:**
   ```bash
   ./manage_soc101.sh setup
   ./manage_soc101.sh up
   ```

---

## 🌐 Acceso a los servicios

| Servicio            | URL                                 |
|--------------------|-------------------------------------|
| Dashboard SOC101   | http://localhost:8080/              |
| WebGoat Proxy      | http://localhost:8000/lab/webgoat/  |
| WebGoat Directo    | http://localhost:8081/WebGoat       |

---

## 🧩 Retos incluidos

| Reto      | Descripción                                    | Dificultad |
|-----------|------------------------------------------------|------------|
| **Reto 1**| HTTP básico, métodos GET/POST y cabeceras      | Fácil      |
| **Reto 2**| FTP inseguro, credenciales en texto plano      | Intermedio |
| **Reto 3**| Identificación de tráfico sospechoso/beaconing | Intermedio |
| **Reto 4**| Configuración de firewall y hardening básico   | Práctico   |

---

## 🔗 Opciones de despliegue para alumnos

Puedes compartir el laboratorio con los participantes de distintas formas:

1. **Levantarlo en AWS o VPS**  
   - Crear una instancia EC2 y desplegarlo ahí para dar acceso público.

2. **Subir el código completo a GitHub**  
   - Los alumnos lo clonan y lo corren localmente con Docker.

3. **Crear una plantilla (AMI o OVA)**  
   - Ideal para cursos presenciales o virtuales sin conexión estable.

4. **Entregar acceso directo por IP pública**  
   - El instructor lo levanta y los alumnos acceden vía navegador.

---

## 📝 Script de automatización (manage_soc101.sh)

Este script facilita las operaciones comunes:

- **setup** → Instala dependencias y prepara el entorno.
- **up** → Levanta el laboratorio.
- **down** → Apaga y elimina los contenedores.
- **logs** → Muestra logs en tiempo real.

Ejemplo:
```bash
./manage_soc101.sh setup
./manage_soc101.sh up
./manage_soc101.sh logs
./manage_soc101.sh down
```

---

## 🧑‍💻 Contribución

Si deseas contribuir:
1. Haz un fork del repositorio.
2. Crea una rama para tu feature:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3. Realiza tus cambios y súbelos:
   ```bash
   git commit -m "Agregada nueva funcionalidad"
   git push origin feature/nueva-funcionalidad
   ```
4. Abre un Pull Request.

---

## 📜 Licencia

Este proyecto se distribuye bajo la licencia **MIT**.  
Uso libre para fines educativos y de capacitación.

---

## 🙌 Créditos

Proyecto desarrollado por **Jose Angel Alamillo**  
Academia de Ciberseguridad © 2025
