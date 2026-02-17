<?php

session_start();

if(isset($_SESSION['log'])){

    if($_SESSION['role']=="admin"){
        header("Location: views/dashboard_admin.php");
    }
    elseif($_SESSION['role']=="petugas"){
        header("Location: views/dashboard_petugas.php");
    }
    else{
        header("Location: views/dashboard_owner.php");
    }

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="asset/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body class="login-page">

  <div class="login-container">

    <div class="login-box">
      <h2>🔐 Login</h2>
      <p class="login-subtitle">Sistem Parkir</p>

      <?php if(isset($_GET['error'])) echo "Login gagal!"; ?>

      <form method="POST" action="controllers/c_login.php">

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan username" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>

        <button type="submit" class="btn-login" name="login">Login</button>

      </form>

    </div>

  </div>

  <script src="asset/js/main.js"></script>

</body>

</html>