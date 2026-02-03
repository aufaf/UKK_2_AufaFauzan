<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href = "../asset/css/tambah_data.css">
<title>Tambah User</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">


</head>

<body>

<div class="card">
  <h2>➕ Tambah Data User</h2>

  <form action="../models/insert_user.php" method="post">

    <label>Nama Lengkap</label>
    <input type="text" name="nama_lengkap" required>

    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <label>Role</label>
    <select name="role" required>
      <option value="">Pilih Role</option>
      <option value="admin">Admin</option>
      <option value="petugas">Petugas</option>
      <option value="owner">Owner</option>
    </select>

    <label>Status</label>
    <select name="status_aktif" required>
      <option value="">Pilih Status</option>
      <option value="aktif">Aktif</option>
      <option value="nonaktif">Nonaktif</option>
    </select>

    <div class="button-group">
      <button type="submit" class="btn btn-save">💾 Simpan</button>
      <button type="button" class="btn btn-cancel"
        onclick="window.location.href='tampil_data_user.php'">
        Batal
      </button>
    </div>

  </form>
</div>

</body>
</html>
