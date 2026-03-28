<?php

include "../controllers/c_kendaraan.php";

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
    <a href="log_aktIvitas">Log Aktivitas</a>
    <a href="../controllers/c_logout.php">Logout</a>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- NAVBAR -->
    <div class="navbar">
      <h1>Edit Kendaraan</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <div class="card form-card">
        <h2>Edit Data Kendaraan</h2>

        <form action="../controllers/c_kendaraan.php?aksi=update" method="post">

          <input type="hidden" name="id_kendaraan" value="<?= $kendaraans->id_kendaraan ?>">

          <label>Plat Nomor:</label><br>
          <input type="text" name="plat_nomor" value="<?= $kendaraans->plat_nomor ?>" required><br><br>


          <!-- ROLE DROPDOWN -->
          <label>Jenis Kendaraan</label>
          <select name="jenis_kendaraan" required>
            <option value="mobil" <?= $kendaraans->jenis_kendaraan == 'mobil' ? 'selected' : '' ?>>Mobil</option>
            <option value="motor" <?= $kendaraans->jenis_kendaraan == 'motor' ? 'selected' : '' ?>>Motor</option>
            <option value="lainnya" <?= $kendaraans->jenis_kendaraan == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
          </select>



          <div class="button-group">
            <button type="submit" class="btn btn-save">💾 Simpan</button>
            <button type="button" class="btn btn-cancel" onclick="window.location.href='tampil_data_kendaraan.php'">
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