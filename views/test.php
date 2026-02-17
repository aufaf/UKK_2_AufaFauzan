<?php
require_once "../models/m_parkir.php";
$m = new m_parkir();
$area = $m->getArea();
?>

<!DOCTYPE html>
<html>
<head>
<title>Parkir Masuk</title>
</head>
<body>

<h2>Parkir Masuk</h2>

<?php if(isset($_GET['success'])){ ?>
<p style="color:green;">Data berhasil disimpan!</p>
<?php } ?>

<form method="POST" action="../controllers/c_parkir_masuk.php">

Plat Nomor:<br>
<input type="text" name="plat" required><br><br>

Jenis Kendaraan:<br>
<select name="jenis" required>
  <option value="">-- pilih --</option>
  <option value="Motor">Motor</option>
  <option value="Mobil">Mobil</option>
</select><br><br>

Area Parkir:<br>
<select name="area" required>
  <option value="">-- pilih area --</option>
  <?php while($a=$area->fetch_assoc()){ ?>
    <option value="<?= $a['id_area'] ?>">
      <?= $a['nama_area'] ?>
    </option>
  <?php } ?>
</select><br><br>

<button name="simpan">Simpan</button>

</form>

</body>
</html>
