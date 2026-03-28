<?php
include "../controllers/c_user.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Data User</title>

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
    <a href="log_aktivitas.php">Log Aktivitas</a>
    <a href="../controllers/c_logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="navbar">
      <h1>Data User</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <!-- HEADER CARD -->
      <div class="card header-card">
        <div>
          <h3>Daftar Pengguna</h3>
          <p>Kelola semua user sistem di sini</p>
        </div>

        <a href="tambah_data_user.php" class="add-button">
          + Tambah User
        </a>
      </div>

      <form action="" method="post">
        <input type="text" name="keyword" placeholder="Masukkan nama/username">
        <button type="submit" name="aksi">Cari</button>
      </form>

      <div class="card">
        <table>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>

          <?php
          $no = 1;
          foreach ($users as $data) {
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->nama_lengkap ?></td>
              <td><?= $data->username ?></td>
              <td><?= $data->role ?></td>
              <td>
                <span class="status <?= $data->status_aktif == 'aktif' ? 'aktif' : 'nonaktif' ?>">
                  <?= $data->status_aktif ?>
                </span>
              </td>

              <td class="action-buttons">

                <a href="../controllers/c_user.php?aksi=edit&id=<?= $data->id_user ?>" class="btn-edit">
                  <i class="fa-solid fa-pen"></i>
                </a>

                <a onclick="return confirm('Yakin hapus data?')"
                  href="../controllers/c_user.php?id=<?= $data->id_user ?>&aksi=hapus" class="btn-hapus">
                  <i class="fa-solid fa-trash"></i>
                </a>

              </td>
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