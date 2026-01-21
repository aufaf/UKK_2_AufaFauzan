<?php
include "../controllers/koneksi.php";

$db = $koneksi->query("SELECT * FROM user");
$data = $db->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data User</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
body {
  font-family: 'Inter', sans-serif;
  background-color: #f1f5f9;
  padding: 30px;
}

/* Header */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 25px;
}

.header h2 {
  color: #0f172a;
}

/* Button */
.button {
  padding: 10px 16px;
  border-radius: 8px;
  text-decoration: none;
  font-size: 14px;
  font-weight: 500;
  transition: 0.3s;
}

.add-button {
  background-color: #6366f1;
  color: #fff;
}

.add-button:hover {
  background-color: #4f46e5;
}

.edit-button {
  background-color: #0ea5e9;
  color: #fff;
}

.delete-button {
  background-color: #ef4444;
  color: #fff;
}

.edit-button:hover {
  background-color: #0284c7;
}

.delete-button:hover {
  background-color: #dc2626;
}

/* Table */
.table-container {
  background: #ffffff;
  padding: 25px;
  border-radius: 14px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.05);
}

table {
  width: 100%;
  border-collapse: collapse;
}

th {
  background-color: #f8fafc;
  color: #334155;
  padding: 12px;
  text-align: left;
  font-size: 14px;
}

td {
  padding: 12px;
  border-bottom: 1px solid #e2e8f0;
  font-size: 14px;
  color: #475569;
}

tr:hover {
  background-color: #f1f5f9;
}

.action-buttons a {
  margin-right: 6px;
}
</style>
</head>

<body>

<div class="header">
  <h2>📋 Data User</h2>
  <a href="tambah_data_user.php" class="button add-button">+ Tambah Data</a>
</div>

<div class="table-container">
  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Password</th>
      <th>Role</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>

    <?php foreach ($data as $user): ?>
    <tr>
      <td><?= $user['id_user'] ?></td>
      <td><?= $user['nama_lengkap'] ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['password'] ?></td>
      <td><?= $user['role'] ?></td>
      <td><?= $user['status_aktif'] ?></td>
      <td class="action-buttons">
        <a href="edit_user.php?id=<?= $user['id_user'] ?>" class="button edit-button">Edit</a>
        <a href="../controllers/delete_user.php?id=<?= $user['id_user'] ?>" 
           class="button delete-button"
           onclick="return confirm('Yakin ingin menghapus data ini?')">
           Hapus
        </a>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
</div>

</body>
</html>
