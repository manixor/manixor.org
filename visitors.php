<?php
$file = 'visitors.txt';

// Citește datele din fișier
$data = file($file, FILE_IGNORE_NEW_LINES);
$onlineVisitors = intval(explode(':', $data[0])[1]);
$totalVisitors = intval(explode(':', $data[1])[1]);

// Crește numărul total de vizitatori
$totalVisitors++;

// Crește numărul de vizitatori online
$onlineVisitors++;

// Actualizează fișierul
file_put_contents($file, "online:$onlineVisitors\n");
file_put_contents($file, "total:$totalVisitors", FILE_APPEND);

// Returnează datele ca JSON
header('Content-Type: application/json');
echo json_encode([
    'online' => $onlineVisitors,
    'total' => $totalVisitors
]);
?>
