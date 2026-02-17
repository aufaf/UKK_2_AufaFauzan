<?php
session_start();

if ($_SESSION['role'] != "admin") {
  header("Location: ../index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>

  <link rel="stylesheet" href="../asset/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="logo">ParkirApp</div>

    <a href="dashboard_admin.php">Dashboard</a>
    <a href="tampil_data_user.php">Kelola User</a>
    <a href="tampil_data_tarif.php">Tarif Parkir</a>
    <a href="tampil_data_area.php">Area Parkir</a>
    <a href="tampil_data_kendaraan.php">Kendaraan</a>
    <a href="#">Log Aktivitas</a>
    <a href="../controllers/c_logout.php">Logout</a>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- NAVBAR -->
    <div class="navbar">
      <h1>Dashboard</h1>
      <span>Admin</span>
    </div>

    <div class="content">

      <!-- STATISTICS -->
      <div class="stats">
        <div class="stat">
          <h3>Total User</h3>
          <p>12</p>
        </div>

        <div class="stat">
          <h3>Kendaraan Parkir</h3>
          <p>7</p>
        </div>

        <div class="stat">
          <h3>Slot Tersedia</h3>
          <p>21</p>
        </div>

        <div class="stat">
          <h3>Pendapatan</h3>
          <p>Rp250K</p>
        </div>
      </div>

      <!-- WELCOME -->
      <div class="card">
        <h2>Selamat Datang 👋</h2>
        <p>
          Sistem parkir siap digunakan.
          Pantau kendaraan, kelola area, dan lihat transaksi dengan nyaman.
        </p>
      </div>

    </div>
  </div>

  <script src="../asset/js/main.js"></script>

</body>



</html>