<?php
include_once "../models/m_parkir.php";

$parkirModel = new m_parkir();
$dataAreaParkir = $parkirModel->getArea();
?>

<h2>Parkir Masuk</h2>

<form method="POST" action="../controllers/c_parkir_masuk.php">

Plat Nomor <br>
<input type="text" name="plat_nomor" required>
<br><br>

Jenis Kendaraan <br>
<select name="jenis_kendaraan" required>
<option value="">-- pilih --</option>
<option value="motor">Motor</option>
<option value="mobil">Mobil</option>
</select>
<br><br>

Area Parkir <br>
<select name="id_area" required>
<option value="">-- pilih area --</option>

<?php
while($dataArea = $dataAreaParkir->fetch_assoc()){
?>

<option value="<?= $dataArea['id_area'] ?>">
<?= $dataArea['nama_area'] ?>
</option>

<?php } ?>

</select>

<br><br>

<button name="simpan">Simpan</button>

</form>