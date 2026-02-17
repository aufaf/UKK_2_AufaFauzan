<?php

include "../controllers/c_tarif.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../asset/css/tambah_data.css">
  <title>Data Tarif</title>

  <link rel="stylesheet" href="../asset/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- pakai dashboard.css -->
  <link rel="stylesheet" href="../asset/css/dashboard.css">

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

  <div class="main">
    <div class="navbar">
      <h1>Data Tarif</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <!-- HEADER CARD -->
      <div class="card header-card">
        <div>
          <h3>Daftar Tarif</h3>
          <p>Kelola semua tarif sistem di sini</p>
        </div>

        <a href="tambah_data_tarif.php" class="add-button">
          + Tambah User
        </a>
      </div>

      <div class="card">
        <table>
          <tr>
            <th>No</th>
            <th>Jenis Kendaraan</th>
            <th>Tarif Per Jam</th>
            <th>Aksi</th>
          </tr>

          <?php
          $no = 1;
          foreach ($tarifs as $data) {
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->jenis_kendaraan ?></td>
              <td>Rp <?= $data->tarif_per_jam ?></td>

              <td class="action-buttons">
                <a href="../controllers/c_tarif.php?aksi=edit&id=<?= $data->id_tarif ?>">
                  <button class="btn-edit">Edit</button>
                </a>

                <a onclick="return confirm('Apakah yakin ingin menghapus data ini?')"
                  href="../controllers/c_tarif.php?id=<?= $data->id_tarif ?>&aksi=hapus">
                  <button class="btn-hapus">Hapus</button>
                </a>
        </div>
        </td>

        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
  </div>

  <script src="../asset/js/main.js"></script>
  
</body>

</html>