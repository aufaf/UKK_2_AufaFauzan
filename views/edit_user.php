<?php

include "../controllers/c_user.php";

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
      <h1>Edit User</h1>
    </div>

    <!-- CONTENT -->
    <div class="content">

      <div class="card form-card">
        <h2>✏️ Edit Data User</h2>

        <form action="../controllers/c_user.php?aksi=update" method="post">


          <input type="text" name="id_user" value="<?= $users->id_user ?>" hidden>

          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= $users->nama_lengkap ?>"
            required><br>


          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="<?= $users->username ?>"
            required><br>

            <label for="">Password</label>
          <input type="password" id="password" name="password" placeholder="kosongkan jika tidak diubah"><br>


          <!-- ROLE DROPDOWN -->
          <label>Role</label>
          <select name="role" required>
            <option value="admin" <?= $users->role == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="petugas" <?= $users->role == 'petugas' ? 'selected' : '' ?>>Petugas</option>
            <option value="owner" <?= $users->role == 'owner' ? 'selected' : '' ?>>Owner</option>
          </select>

          <!-- STATUS DROPDOWN -->
          <label>Status</label>
          <select name="status_aktif" required>
            <option value="1" <?= $users->status_aktif == '1' ? 'selected' : '' ?>>Aktif</option>
            <option value="0" <?= $users->status_aktif == '0' ? 'selected' : '' ?>>Nonaktif</option>
          </select>

          <div class="button-group">
            <button type="submit" class="btn-save">💾 Simpan</button>

            <button type="button" class="btn-cancel" onclick="window.location.href='tampil_data_user.php'">
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