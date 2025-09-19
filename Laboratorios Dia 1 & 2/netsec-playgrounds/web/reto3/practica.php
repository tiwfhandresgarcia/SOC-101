<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="/reto3/assets/reto3.css">

<div class="r3-wrap">
  <h1>Práctica · Descarga y Análisis</h1>

  <div class="panel">
    <h2>Archivos PCAP</h2>
    <p>Descarga y abre en Wireshark:</p>
    <ul>
      <li><a href="/reto3/pcaps/normal_traffic.pcap" download>normal_traffic.pcap</a> — navegación/ruido legítimo.</li>
      <li><a href="/reto3/pcaps/suspicious_beacon.pcap" download>suspicious_beacon.pcap</a> — patrón periódico con cabeceras.</li>
      <li><a href="/reto3/pcaps/mixed_traffic.pcap" download>mixed_traffic.pcap</a> — mezcla de ambos (para el desafío).</li>
    </ul>

    <h3>Tips</h3>
    <pre class="out">http.header contains "X-Beacon-ID"
frame.time_delta &gt; 8 and frame.time_delta &lt; 12   # buscar intervalos ~10s
tcp.stream                                       # seguir flujo</pre>

    <a class="btn" href="/reto3/desafio.php">Ir al desafío final</a>
  </div>
</div>

<?php include('../includes/footer.php'); ?>
