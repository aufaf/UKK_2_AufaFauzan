<?php
include "../models/m_koneksi.php";

$conn = new m_koneksi();        // buat object
$koneksi = $conn->koneksi;     // ambil koneksi


$id = $_GET['id'];

$data = $koneksi->query("SELECT * FROM `tarif` WHERE id_tarif='$id'");
$tarif = $data->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Tarif</title>
</head>
<body>

<h2>Edit Data User</h2>

<form action="../models/update_tarif.php" method="post">
  <input type="hidden" name="id_tarif" value="<?= $tarif['id_tarif']; ?>">

  <label>Jenis Kendaraan:</label><br>
  <select name="tarif" required>
    <option value="motor" <?= ($tarif['jenis_kendaraan']=='motor')?'selected':''; ?>>Motor</option>
    <option value="mobil" <?= ($tarif['jenis_kendaraan']=='mobil')?'selected':''; ?>>Mobil</option>
    <option value="lainnya" <?= ($tarif['jenis_kendaraan']=='lainnya')?'selected':''; ?>>Lainnya</option>
  </select><br><br>

  <label>Tarif Per Jam:</label><br>
  <input type="text" name="tarif_per_jam" value="<?= $tarif['tarif_per_jam']; ?>" required><br><br>

  
  <button type="submit">Edit</button>
  <button type="button" onclick="window.location.href='tampil_data_tarif.php'">Batal</button>
</form>

</body>
</html>
