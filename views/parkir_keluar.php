<?php
include_once "../models/m_transaksi.php";
include_once "../controllers/c_transaksi.php";

$transaksiModel = new m_parkir();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Parkir Keluar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../asset/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
      <h1>Parkir Keluar</h1>
    </div>

    <div class="content">

      <!-- FORM CARI -->
      <div class="card form-card">

        <h2>Cari Kendaraan</h2>

        <form action="" method="post">
          <input type="text" name="keyword" placeholder="Masukkan plat nomor">
          <button type="submit" name="cari">Cari</button>

          <a href="parkir_keluar.php">
            <button type="button">Reset</button>
          </a>
        </form>

      </div>

      <!-- TABEL KENDARAAN PARKIR -->
      <div class="card">

        <h3>Kendaraan Sedang Parkir</h3>

        <table>

          <thead>
            <tr>
              <th>No</th>
              <th>Waktu Masuk</th>
              <th>Plat Nomor</th>
              <th>Jenis Kendaraan</th>
              <th>Area</th>
              <th>Durasi</th>
              <th>Tarif</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>

            <?php
            $no = 1;

            while ($parkir = $dataParkir->fetch_assoc()) {
              ?>

              <tr>

                <td><?= $no++ ?></td>

                <td><?= $parkir['waktu_masuk'] ?></td>

                <td><?= $parkir['plat_nomor'] ?></td>

                <td><?= $parkir['jenis_kendaraan'] ?></td>

                <td><?= $parkir['nama_area'] ?></td>

                <td>

                  <?php

                  $menit = $parkir['durasi'];

                  $jam = floor($menit / 60);
                  $sisaMenit = $menit % 60;

                  if ($jam > 0) {
                    echo $jam . " Jam " . $sisaMenit . " Menit";
                  } else {
                    echo $sisaMenit . " Menit";
                  }

                  ?>

                </td>

                <td>
                  Rp <?= number_format($parkir['tarif_per_jam']) ?>
                </td>

                <td>
                  <span class="status aktif">
                    Masuk
                  </span>
                </td>

                <td class="action-buttons">

                  <a href="../controllers/c_transaksi.php?keluar=<?= $parkir['id_parkir'] ?>">

                    <button class="btn-save">
                      <i class="fa-solid fa-right-from-bracket"></i>
                    </button>

                  </a>

                </td>

              </tr>

            <?php } ?>

          </tbody>

        </table>

      </div>

    </div>

  </div>

  <script src="../asset/js/main.js"></script>

</body>

</html>