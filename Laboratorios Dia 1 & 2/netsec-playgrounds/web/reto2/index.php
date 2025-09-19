<?php include("../includes/header.php"); ?>
<link rel="stylesheet" href="/reto2/assets/reto2.css">

<div class="r2-wrap">
  <h1>Reto 2 · FTP Inseguro</h1>
  <p>Enumera el servicio, rompe credenciales débiles, descarga la bandera y demuestra que viste las credenciales en la red.</p>

  <div class="panel">
    <h2>Objetivos</h2>
    <ul>
      <li>Descubrir el servicio FTP y su versión (fingerprinting).</li>
      <li>Acceder con credenciales débiles.</li>
      <li>Descargar <b>flag_ftp.txt</b> desde el FTP.</li>
      <li>Capturar tráfico y observar usuario/contraseña en claro.</li>
    </ul>
  </div>

  <div class="grid2">
    <div class="panel">
      <h2>1) Enumeración</h2>
      <p>Comprueba el puerto y el banner:</p>
      <pre class="out">$ nmap -sV -p21 localhost
$ telnet localhost 21</pre>
      <p class="note">Filtro Wireshark: <span class="kbd">ftp</span> o <span class="kbd">tcp.port == 21</span></p>
    </div>
    <div class="panel">
      <h2>2) Ataque de credenciales</h2>
      <p>Puedes probar user/pass débiles manualmente o con Hydra.</p>
      <p>Wordlists: 
        <a class="btn" href="/reto2/assets/wordlists/users.txt" target="_blank">users.txt</a>
        <a class="btn" href="/reto2/assets/wordlists/passwords.txt" target="_blank">passwords.txt</a>
      </p>
      <pre class="out">$ hydra -L users.txt -P passwords.txt ftp://localhost</pre>
      <p class="note">Consejo: también puedes intentar <span class="kbd">ftpuser : password123</span>.</p>
    </div>
  </div>

  <div class="grid2">
    <div class="panel">
      <h2>3) Conexión y descarga</h2>
      <pre class="out">$ ftp localhost
Name: ftpuser
Password: ***********
ftp> ls
ftp> get flag_ftp.txt
ftp> bye</pre>
      <p class="note">Con tcpdump dentro del contenedor: <span class="kbd">tcpdump -i eth0 -n -A 'tcp port 21'</span></p>
    </div>
    <div class="panel">
      <h2>4) Validar bandera</h2>
      <p>Abre <code>flag_ftp.txt</code>, copia la FLAG y pégala aquí:</p>
      <form method="POST" action="/reto2/validar.php">
        <input class="input" name="flag" placeholder="FLAG{...}" required>
        <button class="btn" type="submit">Validar</button>
      </form>
      <p class="note">La bandera tiene formato <span class="kbd">FLAG{...}</span></p>
    </div>
  </div>
</div>

<?php include("../includes/footer.php"); ?>
