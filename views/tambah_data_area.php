<?php

include_once "../controllers/c_area.php"

  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../asset/css/tambah_data.css">
  <title>Tambah Area</title>

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
    <a href="log_aktivitas">Log Aktivitas</a>
    <a href="../controllers/c_logout.php">Logout</a>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- NAVBAR -->
    <div class="navbar">
      <h1>Tambah Area</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <div class="card form-card">
        <h2>➕ Tambah Data Area</h2>

        <form action="../controllers/c_area.php?aksi=tambah" method="post">

          <input type="text" name="id_area" value="null" placeholder="id_area" hidden>

          <label for="nama_area">Nama Area</label>
          <input type="nama_area" id="nama_area" name="nama_area" required><br>

          <label for="kapasitas">Kapasitas</label>
          <input type="kapasitas" id="kapasitas" name="kapasitas" required><br>

          <label for="terisi">Terisi</label>
          <input type="terisi" id="terisi" name="terisi"><br>

          <div class="button-group">
            <button type="submit" class="btn btn-save">💾 Simpan</button>
            <button type="button" class="btn btn-cancel" onclick="window.location.href='tampil_data_user.php'">
              Batal
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="../asset/js/main.js"></script>

</body>

</html>