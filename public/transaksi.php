<?php
include "../models/m_koneksi.php";

$conn = new m_koneksi();      
$koneksi = $conn->koneksi;

$db = $koneksi->query("SELECT * FROM transaksi");
$data = $db->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Transaksi</title>
</head>
<body>
     
<h2>Tambah Kendaraan Masuk</h2>
<form action="transaksi.php" method="post">

  <label>Jenis Kendaraan:</label><br>
  <select name="jenis_kendaraan" required>
      <option value="pilih_jenis">Pilih Jenis</option>
      <option value="mobil">Mobil</option>
      <option value="motor">Motor</option>
      <option value="lainnya">Lainnya</option>
    </select><br>

     <label>Plat Nomor:</label><br>
    <input type="text" name="plat_nomor" required>

  <button type="submit">Masuk</button>
</form>

<h2>📋 Data Masuk Parkir</h2>
  <a href="masuk_parkir.php" class="button add-button">+ Tamb</a>
</div>
<div class="table-container">
  <table>
    <tr>
      <th>Jenis Kendaraan</th>
      <th>Plat Nomor</th>
      <th>Waktu Masuk</th>
    </tr>

    <?php foreach ($data as $transaksi): ?>
    <tr>
      <td><?= $transaksi['id_parkir'] ?></td>
      <td><?= $transaksi['id_kendaraan'] ?></td>
      <td><?= $transaksi['waktu_masuk'] ?></td>
      <td><?= $transaksi['waktu_masuk'] ?></td>
      <td><?= $transaksi['id_tarif'] ?></td>
      <td><?= $transaksi['durasi_jam'] ?></td>
        <td><?= $transaksi['biaya_total'] ?></td>
        <td><?= $transaksi['status'] ?></td>
        <td><?= $transaksi['id_area'] ?></td>
        <td class="action-buttons">
        <a href="edit_user.php?id=<?= $transaksi['id_user'] ?>" class="button edit-button">Edit</a>
        <a href="../controllers/delete_user.php?id=<?= $transaksi['id_user'] ?>" 
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




