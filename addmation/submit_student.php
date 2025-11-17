<?php
header('Content-Type: application/json');

// DB connection
$host = 'localhost';
$db   = 'student_admission';
$user = 'root'; // change if needed
$pass = '';     // change if needed

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}

// Clean input function
function clean_input($data) {
    return htmlspecialchars(trim($data));
}

// Get and clean form data
$fullName    = clean_input($_POST['fullName'] ?? '');
$dob         = clean_input($_POST['dob'] ?? '');
$gender      = clean_input($_POST['gender'] ?? '');
$class       = clean_input($_POST['class'] ?? '');
$fatherName  = clean_input($_POST['fatherName'] ?? '');
$motherName  = clean_input($_POST['motherName'] ?? '');
$phone       = clean_input($_POST['phone'] ?? '');
$email       = clean_input($_POST['email'] ?? '');
$address     = clean_input($_POST['address'] ?? '');

// Validation
if (
    empty($fullName) || empty($dob) || empty($gender) || empty($class) ||
    empty($fatherName) || empty($motherName) || empty($phone) ||
    empty($email) || empty($address)
) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit;
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO students (fullName, dob, gender, class, fatherName, motherName, phone, email, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $fullName, $dob, $gender, $class, $fatherName, $motherName, $phone, $email, $address);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Admission submitted successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to submit admission.']);
}

$stmt->close();
$conn->close();
?>
