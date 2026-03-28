<?php

include "../controllers/c_tarif.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Edit Tarif</title>

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
      <h1>Edit Tarif</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <div class="card form-card">
        <h2>Edit Data Tarif</h2>

        <form action="../controllers/c_tarif.php?aksi=update" method="post">

          <input type="text" name="id_tarif" value="<?= $tarifs->id_tarif ?>" hidden>

          <!-- ROLE DROPDOWN -->
          <label>Jenis Kendaraan</label>
          <select name="jenis_kendaraan" required>
            <option value="mobil" <?= $tarifs->jenis_kendaraan == 'mobil' ? 'selected' : '' ?>>Mobil</option>
            <option value="motor" <?= $tarifs->jenis_kendaraan == 'motor' ? 'selected' : '' ?>>Motor</option>
            <option value="lainnya" <?= $tarifs->jenis_kendaraan == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
          </select>

          <label for="tarif_per_jam">Tarif Per Jam</label>
          <input type="number" id="tarif_per_jam" name="tarif_per_jam" value="<?= $tarifs->tarif_per_jam ?>"
            required><br>



          <div class="button-group">
            <button type="submit" class="btn btn-save">💾 Simpan</button>

            <button type="button" class="btn btn-cancel" onclick="window.location.href='tampil_data_tarif.php'">
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