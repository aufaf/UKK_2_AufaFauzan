<?php
include_once "../controllers/c_log.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Log Aktivitas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../asset/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
    <a href="log_aktivitas.php" class="active">Log Aktivitas</a>
    <a href="../controllers/c_logout.php">Logout</a>
  </div>

  <!-- MAIN -->
  <div class="main">

    <div class="navbar">
      <h1>Log Aktivitas Sistem</h1>
    </div>

    <div class="content">

      <div class="card">

        <h3>Riwayat Aktivitas Pengguna</h3>

        <!-- SEARCH -->
        <div class="card">
          <form method="post" action="log_aktivitas.php" class="search-form">
            <input type="text" name="keyword" placeholder="Cari username atau aktivitas"
              value="<?= isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>">
            <button type="submit" name="aksi" class="btn-save">
              <i class="fa fa-search"></i> Cari
            </button>
          </form>
        </div>

        <table>

          <thead>
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Aktivitas</th>
              <th>Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>

            <?php
            $no = 1;
            while ($log = $dataLog->fetch_assoc()) {
              ?>

              <tr>

                <td><?= $no++ ?></td>

                <td><?= $log['username'] ?></td>

                <td><?= $log['aktivitas'] ?></td>

                <td><?= $log['waktu_aktivitas'] ?></td>

                <td class="action-buttons">
                  <a onclick="return confirm('Apakah yakin ingin menghapus data ini?')"
                    href="../controllers/c_log.php?id=<?= $log['id_log'] ?>&aksi=hapus" class="btn-hapus">
                    <i class="fa-solid fa-trash"></i>
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