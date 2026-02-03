<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../asset/css/dashboard.css">
<title>Dashboard Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<div class="sidebar">
  <h2>ADMIN PANEL</h2>
  <a href="tampil_data_user.php">👤 Kelola User</a>
  <a href="tampil_data_tarif.php">💳 Tarif Parkir</a>
  <a href="tampil_data_area.php">📍 Area Parkir</a>
  <a href="tampil_data_kendaraan.php">🚘 Kendaraan</a>
  <a href="#">📑 Log Aktivitas</a>
  <a href="../controllers/logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')">🚪 Logout</a>
</div>

<div class="main-content">
  <div class="navbar">
    <h1>Dashboard</h1>
    <span>👤 Admin</span>
  </div>

  <div class="container">

    <!-- CARD WELCOME -->
    <div class="card">
      <h2>Selamat Datang 👋</h2>
      <p>Kelola data parkir dengan tampilan dashboard modern dan profesional.</p>
    </div>

  

  </div>
</div>

</body>
</html>
