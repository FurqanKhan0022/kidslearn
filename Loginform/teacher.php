<?php
session_start();
if (!isset($_SESSION['user_name']) || $_SESSION['user_type'] != 'guest') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
  <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #eef;
    padding: 40px;
    color: #333;
}
h2 {
    color: #336699;
}
a {
    padding: 8px 12px;
    background-color: #f0c91a;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

  </style>
</head>
<body>
    <h2>Welcome Teacher <?php echo $_SESSION['user_name']; ?></h2>
    <p>This is the teacher dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
