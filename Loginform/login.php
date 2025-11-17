<?php
include("connection.php");
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_type'] = $row['user_type'];

        if ($row['user_type'] == 'admin') {
            header('location:admin/index.php');
        } elseif ($row['user_type'] == 'user') {
            header('location:user/index.php');
        } elseif ($row['user_type'] == 'guest') {
            header('location:teacher.php');
        } elseif ($row['user_type'] == 'doctor') {
            header('location:doctor/index.php');
        }
    } else {
        echo "Incorrect email or password!";
    }
}
?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../Loginform/style22.css"> -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
        <style>
        
body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', sans-serif;
}

#signup-box {
    max-width: 900px;
    background-color: #fff;
    border-radius: 20px;
}

.left-panel {
    background-color: #f0c91a;
    padding: 2rem;
}

.btn-teal {
    background-color: #f0c91a;
    color: #fff;
}

.btn-teal:hover {
    background-color: #f0c91a;
}

.input-group-text.eye-toggle {
    cursor: pointer;
    user-select: none;
}

.card, .btn, .input-group, input {
    border-radius: 12px;
}

    </style>
</head>
<body>
    <!-- <div class="form">
        <form action="" method="post">
            <h2></h2>
                <p class="msg"></p>
            
             <div class="form_group my-4">
                <input type="email" name="email" placeholder="email" class="form-control" require>
            </div>
            
             <div class="form_group my-4">
                <input type="password" name="password" placeholder="password" class="form-control" require>
            </div>
            
            
<button  class="btn btn-secondary" name="submit">login</button>
            
            <p>Don't  have an account? <a href="register.php">register now</a></p>
        </form>
    </div> -->
    
    <div class="form">
        <form action="" method="post">
            <h2></h2>
                <p class="msg"><?  $msg?></p>

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="row w-100 shadow rounded overflow-hidden" id="signup-box">
      <!-- Left Panel -->
      <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center text-white text-center left-panel">
        <div>
          <h1 class="fw-bold">Login</h1>
          <p class="lead">Start your journey<br>with SKAMS in Pakistan</p>
        </div>
      </div>

      <!-- Right Panel -->
      <div class="col-md-6 bg-white p-5">
        <h4 class="mb-4 text-center fw-bold">Create a new account</h4>
        <form id="signupForm">
       

          <div class="form_group mb-3">
            <label for="email" class="form-label" >Email</label>
            <input type="email" name="email" placeholder="email" class="form-control" required />
          </div>

          
          

          <!-- Password -->
          <div class=" form_group mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" name="password" placeholder="password" class="form-control" required />
              <span class="input-group-text eye-toggle" onclick="togglePassword('password', this)">👁️</span>
            </div>
          </div>

          <!-- <button  class="btn btn-secondary" name="submit">login</button> -->

          <button  class="btn btn-teal w-100 mb-3"  name="submit">login</button>

          <button type="button" class="btn btn-outline-secondary w-100 mb-3 d-flex align-items-center justify-content-center">
            <img src="OIP.webp" alt="Google Icon" style="width: 20px; margin-right: 8px;">
            Continue with Google
          </button>
<p>Don't  have an account? <a href="register.php">register now</a></p>
          
        </form>
      </div>
    </div>
  </div>
        </form>
    </div>
    <script>
        
function togglePassword(id, el) {
    const input = document.getElementById(id);
    if (input.type === "password") {
        input.type = "text";
        el.innerText = "🙈";
    } else {
        input.type = "password";
        el.innerText = "👁️";
    }
}

document.getElementById("signupForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const pwd = document.getElementById("password").value;
    const cpwd = document.getElementById("cpassword").value;
    if (pwd !== cpwd) {
        alert("Passwords do not match!");
        return false;
    }
    alert("Form submitted successfully!");
});

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>
</html> 