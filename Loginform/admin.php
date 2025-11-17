<?php
include('connection.php');
session_start();




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Page</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }

    .user-page {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
      animation: fadeInUp 1.2s ease-in-out;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 2em;
      color: #333;
      animation: textFadeIn 2s ease forwards;
    }

    .btn {
      margin: 10px;
      padding: 10px 20px;
      font-size: 1em;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes textFadeIn {
      0% {
        opacity: 0;
        transform: scale(0.9);
      }
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }
  </style>
</head>
<body>
  <div class="user-page">
    <h2>Welcome to Admin Page!</h2>
    <a href="logout.php"><button class="btn">Logout</button></a>
    <a href="../index.php"><button class="btn">Go to Home Page</button></a>
  </div>
</body>
</html>
