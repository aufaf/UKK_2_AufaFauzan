<?php

include "../controllers/c_area.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href = "../asset/css/tampil_data.css">
<title>Data Area</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">


</head>

<body>

<div class="header">
  <h2>🅿️ Area Parkir</h2>
  <a href="tambah_data_area.php" class="button add-button">+ Tambah Data</a>
</div>

<div class="table-container">
  <table>
    <tr>
      <th>No</th>
      <th>Nama Area</th>
      <th>Kapasitas</th>
      <th>Terisi</th>
      <th>Aksi</th>
    </tr>

    <?php 
    $no = 1;
    foreach ($areas as $data){ 
      ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $data->nama_area ?></td>
      <td><?= $data->kapasitas ?></td>
      <td><?= $data->terisi ?></td>
      
      
      <td class="action-buttons">
        <a href="edit_area.php?id=<?= $area_parkir['id_area'] ?>" class="button edit-button">Edit</a>
        <a href="../controllers/delete_area.php?id=<?= $area_parkir['id_area'] ?>"
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
