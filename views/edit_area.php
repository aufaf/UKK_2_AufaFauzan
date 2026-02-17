<?php

include "../controllers/c_area.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <title>Edit User</title>

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
      <h1>Edit Area</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <div class="card form-card">
        <h2>Edit Data Area</h2>

        <form action="../controllers/c_area.php?aksi=update" method="post">

          <input type="text" name="id_area" value="<?= $areas->id_area ?>" hidden>

          <label for="nama_area" class="form-label">Nama Area</label>
          <input type="nama_area" class="form-control" id="nama_area" name="nama_area" value="<?= $areas->nama_area ?>"
            required><br>


          <label for="kapasitas" class="form-label">Kapasitas</label>
          <input type="kapasitas" class="form-control" id="kapasitas" name="kapasitas" value="<?= $areas->kapasitas ?>"
            required><br>

          <label for="terisi" class="form-label">Terisi</label>
          <input type="terisi" class="form-control" id="terisi" name="terisi" value="<?= $areas->terisi ?>"
            required><br>


          <div class="button-group">
            <button type="submit" class="btn btn-save">💾 Simpan</button>
            <button type="button" class="btn btn-cancel" onclick="window.location.href='tampil_data_area.php'">
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