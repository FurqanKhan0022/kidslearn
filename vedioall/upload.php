<?php
require 'db.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['videoTitle'] ?? '');
    $description = trim($_POST['videoDescription'] ?? '');

    if (empty($title) || empty($description)) {
        $response['message'] = 'Title and Description are required.';
        echo json_encode($response);
        exit;
    }

    if (!isset($_FILES['videoFile']) || $_FILES['videoFile']['error'] !== UPLOAD_ERR_OK) {
        $response['message'] = 'Error uploading video file.';
        echo json_encode($response);
        exit;
    }

    $allowedTypes = ['video/mp4', 'video/webm', 'video/ogg', 'video/avi', 'video/mov', 'video/mkv'];
    $fileType = mime_content_type($_FILES['videoFile']['tmp_name']);
    if (!in_array($fileType, $allowedTypes)) {
        $response['message'] = 'Unsupported video format.';
        echo json_encode($response);
        exit;
    }

    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $fileName = uniqid('video_', true) . '.' . pathinfo($_FILES['videoFile']['name'], PATHINFO_EXTENSION);
    $uploadFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['videoFile']['tmp_name'], $uploadFile)) {
        // Store in database
        $stmt = $conn->prepare("INSERT INTO videos (title, description, file) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $fileName);
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['video'] = [
                'title' => htmlspecialchars($title),
                'description' => htmlspecialchars($description),
                'file' => $fileName
            ];
        } else {
            $response['message'] = 'Database insert failed.';
        }
        $stmt->close();
    } else {
        $response['message'] = 'Failed to move uploaded file.';
    }
} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
