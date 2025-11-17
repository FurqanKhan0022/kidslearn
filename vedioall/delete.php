<?php
require 'db.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$filename = basename($data['file'] ?? '');

$uploadDir = __DIR__ . '/uploads/';
$filePath = $uploadDir . $filename;

if (!$filename || !file_exists($filePath)) {
    echo json_encode(['success' => false, 'message' => 'File not found']);
    exit;
}

// Delete file
unlink($filePath);

// Delete from DB
$stmt = $conn->prepare("DELETE FROM videos WHERE file = ?");
$stmt->bind_param("s", $filename);
$success = $stmt->execute();
$stmt->close();

echo json_encode([
    'success' => $success,
    'message' => $success ? 'Video deleted' : 'Failed to delete from DB'
]);
