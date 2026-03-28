<?php
session_start();

if($_SESSION['role']!="petugas"){
    header("Location: ../index.php");
    exit();
}

include_once "../models/m_koneksi.php";
$conn = new m_koneksi();
$db = $conn->koneksi;

// ✅ KENDARAAN SEDANG PARKIR
$qParkir = mysqli_query($db, "SELECT * FROM transaksi WHERE waktu_keluar IS NULL");
$countParkir = mysqli_num_rows($qParkir);

// ✅ TOTAL SLOT
$qSlot = mysqli_query($db, "SELECT SUM(kapasitas) as total FROM area_parkir");
$dataSlot = mysqli_fetch_assoc($qSlot);
$totalSlot = $dataSlot['total'] ?? 0;

// ✅ SLOT TERSEDIA
$slotTersedia = $totalSlot - $countParkir;

// PENDAPATAN HARI INI
// =======================
$qHariIni = mysqli_query($db, "
    SELECT SUM(COALESCE(biaya_total,0)) as total 
    FROM transaksi 
    WHERE DATE(waktu_keluar) = CURDATE()
");

$dataHariIni = mysqli_fetch_assoc($qHariIni);

// 🔥 FIX WAJIB
$pendapatanHariIni = (int) $dataHariIni['total'];

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Parkir</title>

  <link rel="stylesheet" href="../asset/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="logo">ParkirApp</div>

    <a href="dashboard_petugas.php">Dashboard</a>
    <a href="parkir_masuk.php">Parkir Masuk</a>
    <a href="parkir_keluar.php">Parkir Keluar</a>
    <a href="../controllers/c_logout.php">Logout</a>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- NAVBAR -->
    <div class="navbar">
      <h1>Dashboard</h1>
      <span>Petugas</span>
    </div>

    <div class="content">

      <!-- STATISTICS -->
      <div class="stats">

        <div class="stat">
          <h3>Kendaraan Parkir</h3>
          <p><?= $countParkir; ?></p>
        </div>

        <div class="stat">
          <h3>Slot Tersedia</h3>
          <p><?= $slotTersedia; ?></p>
        </div>

        <div class="stat">
          <h3>Pendapatan</h3>
          <p><?= $pendapatanHariIni; ?></p>
        </div>
      </div>

      <div class="card">
        <h2>Selamat Datang 👋</h2>
        <p>
          Pantau setiap kendaraan yang masuk.
        </p>
      </div>
    </div>

  </div>

  <script src="../asset/js/main.js"></script>

</body>

</html>