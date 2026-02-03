<?php
include "../models/m_koneksi.php";

$conn = new m_koneksi();        // buat object
$koneksi = $conn->koneksi;     // ambil koneksi


$id = $_GET['id'];

$data = $koneksi->query("SELECT * FROM `kendaraan` WHERE id_kendaraan='$id'");
$kendaraan = $data->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Tarif</title>
</head>
<body>

<h2>Edit Data Area</h2>

<form action="" method="post">
  <input type="hidden" name="id_area" value="<?= $area_parkir['id_area']; ?>">

   <label>Nama Area:</label><br>
  <input type="text" name="nama_area" value="<?= $area_parkir['nama_area']; ?>" required><br><br>


  <label>Kapasitas:</label><br>
  <input type="number" name="kapasitas" value="<?= $area_parkir['kapasitas']; ?>" required><br><br>

  <label>Terisi:</label><br>
  <input type="number" name="terisi" value="<?= $area_parkir['terisi']; ?>" required><br><br>

  
  <button type="submit">Edit</button>
  <button type="button" onclick="window.location.href='tampil_data_area.php'">Batal</button>
</form>

</body>
</html>
