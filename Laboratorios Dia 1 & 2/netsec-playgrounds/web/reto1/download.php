<?php
// Envía un texto simple para generar un GET visible
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="demo.txt"');
echo "Este es un demo de descarga via GET.\nCaptura esta petición en tu analizador.\n";
