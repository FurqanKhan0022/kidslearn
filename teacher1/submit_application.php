<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "teacher_applications";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$qualification = $_POST['qualification'];
$experience = $_POST['experience'];
$subject = $_POST['subject'];
$address = $_POST['address'];

$cv = $_FILES['cv'];
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$cvName = time() . "_" . basename($cv["name"]);
$targetFile = $uploadDir . $cvName;

if (move_uploaded_file($cv["tmp_name"], $targetFile)) {
    $stmt = $conn->prepare("INSERT INTO applications (fullname, email, phone, dob, qualification, experience, subject, address, cv_filename) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $fullname, $email, $phone, $dob, $qualification, $experience, $subject, $address, $cvName);
    
    if ($stmt->execute()) {
        echo "<h2 style='text-align:center'>Application Submitted Successfully!</h2>";
    } else {
        echo "Database Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "File Upload Error.";
}

$conn->close();
?>
