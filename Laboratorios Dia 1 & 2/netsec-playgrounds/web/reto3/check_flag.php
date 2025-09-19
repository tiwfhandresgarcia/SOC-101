<?php
$correcta = 'FLAG{beacon_detected_success}';
$flag = trim($_POST['flag'] ?? '');

include('../includes/header.php');
echo '<link rel="stylesheet" href="/reto3/assets/reto3.css">';
echo '<div class="r3-wrap"><div class="panel">';

if ($flag === $correcta) {
  echo "<h2 class='ok'>🎉 ¡Correcto!</h2>";
  echo "<p>Identificaste el beacon malicioso y la bandera: <b>{$flag}</b>.</p>";
  // marca de completado para el panel principal si lo usas
  echo "<script>try{localStorage.setItem('reto3','done');}catch(e){}</script>";
} else {
  echo "<h2 class='err'>❌ Bandera incorrecta</h2>";
  echo "<p>Revisa <em>mixed_traffic.pcap</em> y filtra por la cabecera <span class='kbd'>X-SECRET-FLAG</span> o <span class='kbd'>X-Beacon-ID</span>.</p>";
}
echo "<p><a class='btn' href='/reto3/desafio.php'>Volver</a> <a class='btn' href='/reto3/'>Panel del reto</a></p>";
echo '</div></div>';

include('../includes/footer.php');
