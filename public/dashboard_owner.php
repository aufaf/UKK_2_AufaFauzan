<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Owner</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #0f625d;
      color: white;
      min-height: 100vh;
      padding: 20px 0;
      position: fixed;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 24px;
      font-family: 'Courier New', Courier, monospace;
    }

    .sidebar a {
      display: block;
      padding: 15px 20px;
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }

    .sidebar a:hover {
      background-color: #07524e;
    }

    /* Main Content */
    .main-content {
      margin-left: 250px;
      width: calc(100% - 250px);
    }

    .navbar {
      background-color: #009688;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar h1 {
      font-size: 20px;
    }

    .container {
      padding: 30px;
    }

    .card {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
      margin-bottom: 10px;
      color: #333;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Menu</h2>
    <a href="#">Rekap Transaksi</a>
    <a href="v_login.php">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="navbar">
      <h1>Dashboard</h1>
      <span>👤 Owner</span>
    </div>

    <div class="container">
      <div class="card">
        <h2>Selamat Datang</h2>
        <p>Gunakan menu di samping untuk mengelola data</p>
      </div>
    </div>
  </div>

</body>
</html>
