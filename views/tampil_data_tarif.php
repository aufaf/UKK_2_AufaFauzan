<?php

include "../controllers/c_tarif.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href = "../asset/css/tampil_data.css">
<title>Data Tarif</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">


</head>

<body>

<div class="header">
  <h2>🚗 Tarif Parkir</h2>
  <a href="tambah_data_tarif.php" class="button add-button">+ Tambah Data</a>
</div>

<div class="table-container">
  <table>
    <tr>
      <th>No</th>
      <th>Jenis Kendaraan</th>
      <th>Tarif Per Jam</th>
      <th>Aksi</th>
    </tr>

    <?php 
     $no = 1;
    foreach ($tarifs as $data){
     ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $data->jenis_kendaraan ?></td>
      <td>Rp <?= $data->tarif_per_jam ?></td>

      <td class="action-buttons">
  <a href="edit_tarif.php?id=<?= $data->id_tarif ?>" 
     class="button edit-button">Edit</a>

  <a href="../controllers/delete_tarif.php?id=<?= $data->id_tarif ?>"
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
        