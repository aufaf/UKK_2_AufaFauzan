<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f4f4f4;
    }
    .register-box {
      width: 380px;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    .register-box h2 {
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
    .link {
      text-align: center;
      margin-top: 15px;
    }
    .link a {
      color: #009688;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <h2>Register</h2>
    <form>
      <label>Nama Lengkap</label>
      <input type="text" placeholder="Nama lengkap">

      <label>Username</label>
      <input type="text" placeholder="Username">

      <label>Password</label>
      <input type="password" placeholder="Password">

      <label>Konfirmasi Password</label>
      <input type="password" placeholder="Ulangi password">

      <button type="submit">Daftar</button>
    </form>
    <div class="link">
      Sudah punya akun? <a href="v_login.php">Login</a>
    </div>
  </div>
</body>
</html>