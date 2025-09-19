<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="/reto3/assets/reto3.css">

<div class="r3-wrap">
  <h1>Teoría · Beaconing</h1>

  <div class="panel">
    <h2>Conceptos clave</h2>
    <p>
      El <b>beaconing</b> es un patrón de comunicación periódica (cada N segundos) entre un equipo comprometido y su servidor C2.
      Suele ocultarse dentro de protocolos comunes (HTTP/DNS) y usar mensajes pequeños y repetitivos.
    </p>
    <ul>
      <li>Intervalos regulares entre solicitudes.</li>
      <li>Tamaños de paquetes similares.</li>
      <li>Cabeceras personalizadas o rutas fijas.</li>
    </ul>
    <p>Filtros útiles en Wireshark:</p>
    <pre class="out">http
http.header contains "X-Beacon-ID"
tcp.port == 80</pre>

    <a class="btn" href="/reto3/practica.php">Ir a la práctica</a>
  </div>
</div>

<?php include('../includes/footer.php'); ?>
