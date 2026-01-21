<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f4f4f4;
    }
    .login-box {
      width: 350px;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    .login-box h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #0f625d;
    }
    label { font-weight: bold; }
    input {
      width: 100%;
      padding: 10px;
      margin: 8px 0 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #009688;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover { background: #07524e; }
  </style>
</head>
<body>

<div class="login-box">
  <h2>Login</h2>

  <form action="proses_login.php" method="post">
    <label>Username</label>
    <input type="text" name="username" placeholder="Masukkan username" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Masukkan password" required>

    <button type="submit">Login</button>
  </form>
</div>

</body>
</html>
