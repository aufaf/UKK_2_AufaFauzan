<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
* {
  box-sizing: border-box;
  font-family: 'Inter', sans-serif;
}

body {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f1f5f9;
}

/* Card */
.login-box {
  width: 360px;
  background: #ffffff;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}

/* Title */
.login-box h2 {
  text-align: center;
  margin-bottom: 25px;
  color: #0f172a;
  font-weight: 600;
}

/* Label */
label {
  font-size: 14px;
  font-weight: 500;
  color: #334155;
}

/* Input */
input {
  width: 100%;
  padding: 12px;
  margin: 8px 0 18px;
  border-radius: 10px;
  border: 1px solid #e2e8f0;
  font-size: 14px;
}

input:focus {
  outline: none;
  border-color: #6366f1;
  box-shadow: 0 0 0 2px rgba(99,102,241,0.2);
}

/* Button */
button {
  width: 100%;
  padding: 12px;
  background: #6366f1;
  color: white;
  border: none;
  border-radius: 10px;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  transition: 0.3s;
}

button:hover {
  background: #4f46e5;
}
</style>
</head>

<body>

<div class="login-box">
  <h2>🔐 Login</h2>

  <?php if(isset($_GET['error'])): ?>
    <p style="color:red">Username atau Password salah</p>
  <?php endif; ?>

 <form method="POST" action="index.php?c=auth&a=login">
    <label>Username</label>
    <input type="text" name="username" placeholder="Masukkan username" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Masukkan password" required>

    <button type="submit">Login</button>
  </form>
</div>

</body>
</html>
