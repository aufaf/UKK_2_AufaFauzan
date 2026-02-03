<?php

include "../controllers/c_user.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href = "../asset/css/tampil_data.css">
<title>Data User</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">


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
      <th>Role</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>

    <?php 
    $no = 1;
    foreach ($users as $data){
       ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $data->nama_lengkap ?></td>
      <td><?= $data->username ?></td>
      <td><?= $data->role ?></td>
      <td><?= $data->status_aktif ?></td>
  

      <td class="action-buttons">
      <a href="edit_user.php?id=<?= $data->id_user ?>" 
       class="button edit-button">Edit</a>

      <a href="../controllers/delete_user.php?id=<?= $data->id_user ?>"
         class="button delete-button"
        onclick="return confirm('Yakin ingin menghapus data ini?')">
        Hapus
     </a>
</td>

    </tr>
      <?php } ?>
  </table>
</div>

</body>
</html>
