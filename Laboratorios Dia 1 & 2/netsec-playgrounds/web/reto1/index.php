<?php include("../includes/header.php"); ?>
<link rel="stylesheet" href="/reto1/assets/reto1.css">

<?php
$tab = $_GET['tab'] ?? 'teoria';
function tabCls($t, $cur){ return $t===$cur ? 'reto-tab active' : 'reto-tab'; }
?>
<div class="reto-wrap">
  <h1>Reto 1 · Explorando HTTP</h1>
  <p class="note">Aprende a generar y capturar tráfico HTTP (GET/POST y cabeceras) y encuentra una bandera oculta.</p>

  <div class="reto-tabs">
    <a class="<?=tabCls('teoria',$tab)?>"   href="?tab=teoria">Teoría</a>
    <a class="<?=tabCls('practica',$tab)?>" href="?tab=practica">Práctica</a>
    <a class="<?=tabCls('desafio',$tab)?>"  href="?tab=desafio">Desafío Final</a>
  </div>

  <div class="panel">
  <?php
    if($tab==='practica')      include __DIR__.'/practica.php';
    elseif($tab==='desafio')   include __DIR__.'/desafio.php';
    else                       include __DIR__.'/teoria.php';
  ?>
  </div>

  <p class="note">Tip: usa <span class="kbd">tcpdump -i eth0 -n -A</span> o Wireshark. En HTTP, las cabeceras viajan en claro.</p>
</div>
<?php include("../includes/footer.php"); ?>
