<?php
include_once "../models/m_transaksi.php";
$m = new m_parkir();
$area = $m->getArea();
$parkirModel = new m_parkir();

$dataArea = $parkirModel->getArea();
$dataParkir = $parkirModel->tampil_parkir();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Parkir Masuk</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../asset/css/style.css">
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
      <h1>Parkir Masuk</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <!-- FORM CARD -->
      <div class="card form-card">

        <h2>Tambah Kendaraan Masuk</h2>

        <?php if (isset($_GET['success'])) { ?>
          <p class="success-msg">Data berhasil disimpan!</p>
        <?php } ?>

        <form method="POST" action="../controllers/c_transaksi.php">

          <label>Plat Nomor</label>
          <input type="text" name="plat" placeholder="Contoh: B 1234 ABC" required>

          <label>Jenis Kendaraan</label>
          <select name="jenis" required>
            <option value="">-- pilih kendaraan --</option>
            <option value="motor">Motor</option>
            <option value="mobil">Mobil</option>
            <option value="lainnya">Lainnya</option>
          </select>

          <label>Area Parkir</label>
          <select name="area" required>
            <option value="">-- pilih area --</option>

            <?php while ($a = $area->fetch_assoc()) {

              $sisa = $a['kapasitas'] - $a['terisi'];

              ?>

              <option value="<?= $a['id_area'] ?>" <?= $sisa <= 0 ? 'disabled' : '' ?>>

                <?= $a['nama_area'] ?> (<?= $sisa ?>)

              </option>

            <?php } ?>

          </select>

          <button class="btn-save" name="simpan">Simpan</button>

        </form>

      </div>

      <!-- TABLE CARD -->
      <div class="card">

        <h3>Data Kendaraan Parkir</h3>

        <table>

          <thead>
            <tr>
              <th>No</th>
              <th>Waktu Masuk</th>
              <th>Plat Nomor</th>
              <th>Jenis Kendaraan</th>
              <th>Area</th>
              <th>Durasi</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>

            <?php
            $no = 1;
            while ($parkir = $dataParkir->fetch_assoc()) {
              ?>

              <tr>
                <td>
                  <?= $no++ ?>
                </td>

                <td>
                  <?= $parkir['waktu_masuk'] ?>
                </td>

                <td>
                  <?= $parkir['plat_nomor'] ?>
                </td>

                <td>
                  <?= $parkir['jenis_kendaraan'] ?>
                </td>

                <td>
                  <?= $parkir['nama_area'] ?>
                </td>

                <td>
                  <?php

                  $menit = $parkir['durasi_menit'];

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
                  <span class="status aktif">
                    <?= $parkir['status'] ?>
                  </span>
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