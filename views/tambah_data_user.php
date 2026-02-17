<?php

include_once "../controllers/c_user.php"

  ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Tambah User</title>

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
      <h1>Tambah User</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <div class="card form-card">
        <h2>➕ Tambah Data User</h2>

        <form action="../controllers/c_user.php?aksi=tambah" method="post">

          <input type="text" name="id_user" value="null" placeholder="id_user" hidden>

          <label for="nama">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" required><br>

          <label for="username">Username</label>
          <input type="text" id="username" name="username" required><br>

          <label for="">Password</label>
          <input type="password" id="password" name="password" required><br>

          <label for="role"></label>
          <input type="text" id="role" name="role" value="petugas" hidden>

          <label for="status_aktif"></label>
          <input type="text" id="status_aktif" name="status_aktif" value="1" hidden>

          <div class="button-group">
            <button type="submit" class="btn-save">💾 Simpan</button>

            <button type="button" class="btn-cancel" onclick="window.location.href='tampil_data_user.php'">
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