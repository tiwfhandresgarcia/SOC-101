<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="/reto3/assets/reto3.css">

<div class="r3-wrap">
  <h1>Desafío Final</h1>

  <div class="panel">
    <p>
      Analiza <b>mixed_traffic.pcap</b>, detecta el beaconing y localiza la cabecera con la bandera.
      Cuando la tengas, introdúcela aquí con el formato <span class="kbd">FLAG{...}</span>.
    </p>

    <form method="POST" action="/reto3/check_flag.php" style="margin-top:10px">
      <input class="input" name="flag" placeholder="FLAG{...}" required>
      <button class="btn" type="submit">Validar FLAG</button>
    </form>
  </div>
</div>

<?php include('../includes/footer.php'); ?>
