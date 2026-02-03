<?php

include_once "../controllers/c_kendaraan.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href = "../asset/css/tampil_data.css">
<title>Data Kendaraan</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">


</head>

<body>

<div class="header">
  <h2>🚘 Data Kendaraan</h2>
  <a href="tambah_data_kendaraan.php" class="button add-button">+ Tambah Data</a>
</div>

<div class="table-container">
  <table>
    <tr>
      <th>No</th>
      <th>Plat Nomor</th>
      <th>Jenis</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    foreach ($kendaraans as $data){
    ?>

    <tr>
      <td><?= $no++ ?></td>
      <td><?= $data->plat_nomor ?></td>
      <td><?= $data->jenis_kendaraan ?></td>

       <td class="action-buttons">
  <a href="edit_kendaraan.php?id=<?= $data->id_kendaraan ?>" 
     class="button edit-button">Edit</a>

  <a href="../controllers/delete_kendaraan.php?id=<?= $data->id_kendaraan ?>"
     class="button delete-button"
     onclick="return confirm('Yakin ingin menghapus data ini?')">
     Hapus
  </a>
</td>
    </tr>

    <?php  } ?>

  </table>
</div>

</body>
</html>
