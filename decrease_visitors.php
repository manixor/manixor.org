<?php
$file = 'visitors.txt';

// Citește datele din fișier
$data = file($file, FILE_IGNORE_NEW_LINES);
$onlineVisitors = intval(explode(':', $data[0])[1]);

// Scade numărul de vizitatori online
if ($onlineVisitors > 0) {
    $onlineVisitors--;
}

// Actualizează fișierul
file_put_contents($file, "online:$onlineVisitors\n");
file_put_contents($file, $data[1], FILE_APPEND);

header('Content-Type: application/json');
echo json_encode(['online' => $onlineVisitors]);
?>
