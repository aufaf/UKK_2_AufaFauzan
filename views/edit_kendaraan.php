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
  <title>Edit Kendaraan</title>
</head>
<body>

<h2>Edit Data Kendaraan</h2>

<form action="" method="post">
  <input type="hidden" name="id_kendaraan" value="<?= $kendaraan['id_kendaraan']; ?>">

   <label>Plat Nomor:</label><br>
  <input type="text" name="plat_nomor" value="<?= $kendaraan['plat_nomor']; ?>" required><br><br>


  <label>Jenis Kendaraan:</label><br>
  <input type="text" name="jenis_kendaraan" value="<?= $kendaraan['jenis_kendaraan']; ?>" required><br><br>


  
  <button type="submit">Edit</button>
  <button type="button" onclick="window.location.href='tampil_data_area.php'">Batal</button>
</form>

</body>
</html>
