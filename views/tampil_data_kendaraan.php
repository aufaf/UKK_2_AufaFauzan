<?php

include_once "../controllers/c_kendaraan.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Data Kendaraan</title>

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

  <div class="main">
    <div class="navbar">
      <h1>Data Kendaraan</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <!-- HEADER CARD -->
      <div class="card header-card">
        <div>
          <h3>Daftar Kendaraan</h3>
          <p>Kelola semua kendaraan sistem di sini</p>
        </div>

        <a href="tambah_data_kendaraan.php" class="button add-button">
          + Tambah Data</a>
      </div>

      <div class="card">
        <table>
          <tr>
            <th>No</th>
            <th>Plat Nomor</th>
            <th>Jenis</th>
            <th>Aksi</th>
          </tr>
          <?php
          $no = 1;
          foreach ($kendaraans as $data) {
            ?>

            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->plat_nomor ?></td>
              <td><?= $data->jenis_kendaraan ?></td>

              <td class="action-buttons">
                <a href="../controllers/c_kendaraan.php?aksi=edit&id=<?= $data->id_kendaraan ?>">
                  <button class="btn-edit">Edit</button>

                  <a onclick="return confirm('Apakah yakin ingin menghapus data ini?')"
                    href="../controllers/c_kendaraan.php?id=<?= $data->id_kendaraan ?>&aksi=hapus">
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