<h2>Desafío Final · Captura la bandera</h2>
<p>Un servicio interno está emitiendo una cabecera secreta en tráfico HTTP. 
Tu misión: <b>capturarla</b> y escribir la FLAG aquí.</p>

<ul>
  <li>Pista 1: la cabecera se llama <b>X-SECRET-FLAG</b>.</li>
  <li>Pista 2: ese tráfico se genera automáticamente cada ~15s.</li>
  <li>Wireshark: <span class="kbd">http.header contains "X-SECRET-FLAG"</span></li>
</ul>

<form class="flag-form" method="POST" action="/reto1/validar.php">
  <input class="input" name="flag" placeholder="FLAG{...}" required>
  <button class="btn" type="submit">Validar</button>
</form>

<p class="note">También puedes probar con <span class="kbd">curl -v http://localhost/reto1/traffic.php</span> (verás las cabeceras).</p>
