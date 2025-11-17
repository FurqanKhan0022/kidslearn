<?php
require 'db.php';
header('Content-Type: application/json');

$result = $conn->query("SELECT * FROM videos ORDER BY uploaded_at DESC");
$videos = [];

while ($row = $result->fetch_assoc()) {
    $videos[] = [
        'title' => $row['title'],
        'description' => $row['description'],
        'file' => $row['file']
    ];
}

echo json_encode($videos);
