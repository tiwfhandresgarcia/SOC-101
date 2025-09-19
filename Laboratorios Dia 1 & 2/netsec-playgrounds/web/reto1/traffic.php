<?php
// Cabecera con la FLAG oculta
header("X-SECRET-FLAG: FLAG{http_basics_success}");
header("Content-Type: text/plain");
echo "Simulando tráfico interno...\n";
echo "Si capturas cabeceras HTTP verás un premio ;)\n";
