<?php
session_start();



if($_SESSION['role']!="owner"){
    header("Location: ../index.php");
    exit();
}

include_once "../models/m_koneksi.php";
$conn = new m_koneksi();
$db = $conn->koneksi;



// =======================
// TOTAL TRANSAKSI
// =======================
$qTransaksi = mysqli_query($db, "
    SELECT * FROM transaksi 
    WHERE waktu_keluar IS NOT NULL
");
$totalTransaksi = mysqli_num_rows($qTransaksi);


// =======================
// TOTAL PENDAPATAN
// =======================
$qPendapatan = mysqli_query($db, "
    SELECT SUM(COALESCE(biaya_total,0)) as total 
    FROM transaksi
");

if (!$qPendapatan) {
    die("Query error: " . mysqli_error($db));
}

$dataPendapatan = mysqli_fetch_assoc($qPendapatan);

// 🔥 FIX WAJIB
$totalPendapatan = (int) $dataPendapatan['total'];


// =======================
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Owner</title>

  <link rel="stylesheet" href="../asset/css/style.css">
  <link rel="stylesheet" href="../asset/css/dashboard.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="logo">ParkirApp</div>

    <a href="dashboard_owner.php" class="active">Dashboard</a>
    <a href="rekap.php">Rekap Transaksi</a>
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
          <h3>Total Transaksi</h3>
          <p><?= $totalTransaksi; ?></p>
        </div>

        <div class="stat">
          <h3>Total Pendapatan</h3>
          <p><?= $totalPendapatan ?></p>
        </div>

        <div class="stat">
          <h3>Pendapatan Hari Ini</h3>
          <p><?= $pendapatanHariIni; ?></p>
        </div>

      </div>

      <!-- WELCOME CARD -->
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