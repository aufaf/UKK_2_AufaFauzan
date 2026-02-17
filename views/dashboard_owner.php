<?php
session_start();

if($_SESSION['role']!="owner"){
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../asset/css/dashboard.css">
  <title>Dashboard Owner</title>

  <link rel="stylesheet" href="../asset/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">


</head>

<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="logo">ParkirApp</div>

    <a href="dashboard_owner.php">Dashboard</a>
    <a href="rekap_transaksi.php">Rekap Transaksi</a>
    <a href="laporan_pendapatan.php">Laporan Pendapatan</a>
    <a href="../controllers/c_logout.php">Logout</a>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- NAVBAR -->
    <div class="navbar">
      <h1>Dashboard</h1>
      <span>Owner</span>
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

      <div class="card">
        <h2>Selamat Datang 👋</h2>
        <p>
          Pantau rekap transaksi dan pendapatan parkir dengan tampilan dashboard
          yang modern dan profesional.
        </p>
      </div>
    </div>

  </div>

  <script src="../asset/js/main.js"></script>

</body>

</html>