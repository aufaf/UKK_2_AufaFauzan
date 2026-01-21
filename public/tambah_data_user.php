<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah User</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
body {
  font-family: 'Inter', sans-serif;
  background-color: #f1f5f9;
  padding: 40px;
}

/* Card */
.card {
  max-width: 600px;
  margin: auto;
  background-color: #ffffff;
  padding: 35px;
  border-radius: 18px;
  box-shadow: 0 25px 50px rgba(0,0,0,0.08);
}

.card h2 {
  margin-bottom: 25px;
  color: #0f172a;
  text-align: center;
}

/* Form */
label {
  font-size: 14px;
  color: #334155;
  font-weight: 500;
}

input, select {
  width: 100%;
  padding: 12px 14px;
  margin-top: 6px;
  margin-bottom: 18px;
  border-radius: 10px;
  border: 1px solid #cbd5f5;
  font-size: 14px;
}

input:focus, select:focus {
  outline: none;
  border-color: #6366f1;
}

/* Buttons */
.button-group {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

.btn {
  padding: 12px 22px;
  border-radius: 10px;
  border: none;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: 0.3s;
}

.btn-save {
  background-color: #6366f1;
  color: white;
}

.btn-save:hover {
  background-color: #4f46e5;
}

.btn-cancel {
  background-color: #e5e7eb;
  color: #1f2937;
}

.btn-cancel:hover {
  background-color: #d1d5db;
}
</style>
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
