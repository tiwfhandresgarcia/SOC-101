<?php
$correcta = 'FLAG{ftp_plaintext_credentials}';
$flag = trim($_POST['flag'] ?? '');

include("../includes/header.php");
echo '<link rel="stylesheet" href="/reto2/assets/reto2.css">';
echo '<div class="r2-wrap"><div class="panel">';

if($flag === $correcta){
  echo "<h2 class='ok'>🎉 ¡Bien hecho!</h2>";
  echo "<p>Conseguiste la bandera: <b>$flag</b>. Recuerda: FTP sin cifrar expone credenciales.</p>";
  echo "<script>localStorage.setItem('reto2','done');</script>";
} else {
  echo "<h2 class='err'>❌ Bandera incorrecta</h2>";
  echo "<p>Revisa tu descarga o vuelve a conectar por FTP.</p>";
}
echo '<p><a class="btn" href="/reto2/">Volver</a> <a class="btn" href="/">Panel</a></p>';
echo '</div></div>';
include("../includes/footer.php");
