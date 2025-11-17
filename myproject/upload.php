<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$filename = basename($data['file'] ?? '');

$uploadDir = __DIR__ . '/uploads/';
$metaFile = $uploadDir . 'videos.json';

if (!$filename || !file_exists($uploadDir . $filename)) {
    echo json_encode(['success' => false, 'message' => 'File not found']);
    exit;
}

// Delete video file
unlink($uploadDir . $filename);

// Update JSON file
$videos = file_exists($metaFile) ? json_decode(file_get_contents($metaFile), true) : [];
$videos = array_filter($videos, fn($v) => $v['file'] !== $filename);
file_put_contents($metaFile, json_encode(array_values($videos), JSON_PRETTY_PRINT));

echo json_encode(['success' => true, 'message' => 'Video deleted']);
