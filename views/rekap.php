<?php
include_once "../controllers/c_rekap.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Rekap Laporan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../asset/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="logo">ParkirApp</div>

    <a href="dashboard_owner.php">Dashboard</a>
    <a href="rekap.php">Rekap Laporan</a>
    <a href="../controllers/c_logout.php">Logout</a>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- NAVBAR -->
    <div class="navbar">
      <h1>Rekap Laporan</h1>
    </div>

    <div class="content">

      <!-- FILTER -->
      <div class="card filter-card">

        <form method="GET" class="filter-form">

          <input type="date" name="tanggal" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : '' ?>">

          <button class="btn-filter">
            <i class="fa-solid fa-filter"></i> Filter
          </button>

          <button type="submit" formaction="../views/cetak_laporan.php" class="btn-laporan">
            <i class="fa-solid fa-print"></i> Cetak Laporan
          </button>

        </form>

      </div>

      <!-- LAPORAN -->
      <div class="card">

        <h2 class="judul-laporan">Laporan Harian</h2>

        <table>

          <thead>
            <tr>
              <th>Masuk</th>
              <th>Keluar</th>
              <th>Plat</th>
              <th>Durasi</th>
              <th>Biaya</th>
            </tr>
          </thead>

          <tbody>

            <?php

            $total = 0;

            while ($row = $data->fetch_assoc()) {

              $menit = $row['durasi'];

              $jam = floor($menit / 60);
              $sisaMenit = $menit % 60;

              if ($jam > 0) {
                $durasi = $jam . " Jam " . $sisaMenit . " Menit";
              } else {
                $durasi = $sisaMenit . " Menit";
              }

              $total += $row['biaya_total'];

              ?>

              <tr>

                <td><?= $row['waktu_masuk'] ?></td>

                <td><?= $row['waktu_keluar'] ?></td>

                <td><?= $row['plat_nomor'] ?></td>

                <td><?= $durasi ?></td>

                <td>Rp <?= number_format($row['biaya_total']) ?></td>

              </tr>

            <?php } ?>

          </tbody>

          <tfoot>

            <tr>
              <td colspan="4" style="text-align:right;"><b>Total Pendapatan</b></td>

              <td>
                <b>Rp <?= number_format($total) ?></b>
              </td>

            </tr>

          </tfoot>

        </table>

      </div>

    </div>

  </div>

  <script src="../asset/js/main.js"></script>

</body>

</html>