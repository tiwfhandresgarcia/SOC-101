<?php include("includes/header.php"); ?>

<div class="hero">
  <h1>SOC 101 | ACADEMIA DE CIBERSEGURIDAD</h1>
  <p>Laboratorio interactivo para aprender Redes y Seguridad con retos prácticos.</p>
  <div class="hero-actions">
    <a href="#" class="chip">Modo: <span id="modeLabel">Principiante</span></a>
    <a href="#" class="chip" id="toggleTheme">Tema: <span id="themeLabel">Oscuro</span></a>
  </div>
</div>

<div class="grid">
  <!-- Reto 1 -->
  <a class="card" href="reto1/index.php" data-key="reto1">
    <div class="card-top">
      <span class="icon" aria-hidden="true">
        <!-- HTTP (globo) -->
        <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 17.93V20a8 8 0 0 1-7.06-4H8a1 1 0 0 0 0-2H4.26A7.984 7.984 0 0 1 4 12h3a1 1 0 0 0 0-2H4.26A8 8 0 0 1 11 4v2a1 1 0 0 0 2 0V4a8 8 0 0 1 6.74 6H17a1 1 0 0 0 0 2h2.74A8 8 0 0 1 13 20v-.07Z"/></svg>
      </span>
      <span class="badge green">Fácil</span>
    </div>
    <h3>Reto 1 · Explorando HTTP</h3>
    <p>Analiza métodos GET/POST y cabeceras. Captura el tráfico generado por formularios.</p>
    <div class="meta">
      <span>~15 min</span>
      <span class="progress" data-progress="reto1"></span>
    </div>
  </a>

  <!-- Reto 2 -->
  <a class="card" href="reto2/index.php" data-key="reto2">
    <div class="card-top">
      <span class="icon">
        <!-- FTP (carpeta) -->
        <svg viewBox="0 0 24 24"><path d="M10 4H4a2 2 0 0 0-2 2v1h20V7a2 2 0 0 0-2-2h-8l-2-1Zm12 5H2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2Z"/></svg>
      </span>
      <span class="badge yellow">Intermedio</span>
    </div>
    <h3>Reto 2 · FTP Inseguro</h3>
    <p>Enumera, rompe credenciales débiles y observa cómo viajan en texto claro.</p>
    <div class="meta">
      <span>~20 min</span>
      <span class="progress" data-progress="reto2"></span>
    </div>
  </a>

  <!-- Reto 3 -->
  <a class="card" href="reto3/index.php" data-key="reto3">
    <div class="card-top">
      <span class="icon">
        <!-- Beaconing (onda) -->
        <svg viewBox="0 0 24 24"><path d="M12 20a2 2 0 0 1-2-2V6a2 2 0 1 1 4 0v12a2 2 0 0 1-2 2Zm7-3a1 1 0 0 1-.7-1.71A7.973 7.973 0 0 0 19 8a7.973 7.973 0 0 0-.7-7.29A1 1 0 1 1 19.7-.29 9.973 9.973 0 0 1 21 8a9.973 9.973 0 0 1-1.3 6.29A1 1 0 0 1 19 17ZM5 17a1 1 0 0 1-.7-1.71A7.973 7.973 0 0 0 5 8a7.973 7.973 0 0 0-.7-7.29A1 1 0 1 1 5.7-.29 9.973 9.973 0 0 1 7 8a9.973 9.973 0 0 1-1.3 6.29A1 1 0 0 1 5 17Z"/></svg>
      </span>
      <span class="badge yellow">Intermedio</span>
    </div>
    <h3>Reto 3 · Tráfico Sospechoso</h3>
    <p>Detecta patrones de beaconing con filtros en tcpdump/Wireshark.</p>
    <div class="meta">
      <span>~20 min</span>
      <span class="progress" data-progress="reto3"></span>
    </div>
  </a>

  <!-- Reto 4 -->
  <a class="card" href="reto4/index.php" data-key="reto4">
    <div class="card-top">
      <span class="icon">
        <!-- Escudo -->
        <svg viewBox="0 0 24 24"><path d="M12 2 3 5v6c0 5 3.4 9.7 9 11 5.6-1.3 9-6 9-11V5l-9-3Z"/></svg>
      </span>
      <span class="badge blue">Práctico</span>
    </div>
    <h3>Reto 4 · Firewall & Hardening</h3>
    <p>Aplica controles básicos en un servicio y compara antes/después.</p>
    <div class="meta">
      <span>~25 min</span>
      <span class="progress" data-progress="reto4"></span>
    </div>
  </a>
	    <!-- Tarjeta WebGoat -->
    <div class="card webgoat">
        <h3>WebGoat - Laboratorio OWASP</h3>
        <p>
            Aprende y explota vulnerabilidades web
            basadas en el Top 10 de OWASP.
        </p>
        <span class="time">~40 min</span>
        <br>
        <a href="http://localhost:8081/WebGoat/login" class="btn">Iniciar Laboratorio</a>
    </div>



</div>

<?php include("includes/footer.php"); ?>
