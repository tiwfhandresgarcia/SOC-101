<?php
$correcta = 'FLAG{http_basics_success}';
$flag = trim($_POST['flag'] ?? '');

include("../includes/header.php");
echo '<link rel="stylesheet" href="/reto1/assets/reto1.css">';
echo '<div class="reto-wrap"><div class="panel">';

if($flag === $correcta){
  echo "<h2 class='ok'>🎉 ¡Felicitaciones!</h2>";
  echo "<p>Has capturado la bandera correcta: <b>$flag</b></p>";
  // marca progreso en localStorage via JS
  echo "<script>localStorage.setItem('reto1','done');</script>";
} else {
  echo "<h2 class='err'>❌ Bandera incorrecta</h2>";
  echo "<p>Intenta nuevamente. Consejo: revisa cabeceras HTTP.</p>";
}
echo '<p><a class="btn" href="/reto1/?tab=desafio">Volver</a> <a class="btn" href="/">Panel</a></p>';
echo '</div></div>';
include("../includes/footer.php");
