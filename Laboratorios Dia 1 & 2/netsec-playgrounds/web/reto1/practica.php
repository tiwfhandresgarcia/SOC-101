<h2>Práctica · Genera GET y POST</h2>
<p>1) Realiza un <b>GET</b> descargando un archivo. 2) Envía un <b>POST</b> con el formulario. Captura ambos.</p>

<div class="grid2">
  <div>
    <h3>Ejercicio 1: GET</h3>
    <a class="btn" href="/reto1/download.php?file=demo.txt">Descargar archivo</a>
    <p class="note">Filtro Wireshark: <span class="kbd">http.request.method == "GET"</span></p>
  </div>
  <div>
    <h3>Ejercicio 2: POST</h3>
    <form method="POST" action="?tab=practica">
      <input class="input" type="text" name="nombre" placeholder="Tu nombre" required>
      <button class="btn" type="submit">Enviar</button>
    </form>
    <?php if($_SERVER['REQUEST_METHOD']==='POST'): ?>
      <p class="ok">¡Hola, <?=htmlspecialchars($_POST['nombre'])?>! Busca tu POST en la captura.</p>
      <p class="note">Filtro: <span class="kbd">http.request.method == "POST"</span></p>
    <?php endif; ?>
  </div>
</div>

<h3>Quick test con tcpdump (desde el contenedor)</h3>
<pre class="out">$ tcpdump -i eth0 -n -A 'tcp port 80'</pre>
