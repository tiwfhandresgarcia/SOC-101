<?php
$portsFile = 'ports.json';
$ports = json_decode(file_get_contents($portsFile), true);

$port = intval($_POST['port']);
$action = $_POST['action'];

foreach ($ports as &$p) {
    if ($p['port'] == $port) {
        $p['status'] = ($action === 'block') ? 'safe' : 'malicious';
        break;
    }
}

file_put_contents($portsFile, json_encode($ports, JSON_PRETTY_PRINT));

// Validar si todos los puertos están en "safe"
$allSafe = true;
foreach ($ports as $p) {
    if ($p['status'] !== 'safe') {
        $allSafe = false;
        break;
    }
}

$response = [
    "success" => true,
    "allSafe" => $allSafe,
    "message" => $allSafe ? "Servidor asegurado" : "Puerto actualizado"
];

echo json_encode($response);
?>
