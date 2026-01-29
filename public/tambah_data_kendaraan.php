<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tambah Data Kendaraan</title>
</head>
<body>
     

<form action="" method="post">

  <label>Plat Nomor:</label><br>
  <input type="text" name="plat_nomor" required><br>

  <label>Jenis Kendaraan:</label><br>
  <input type="text" name="jenis_kendaraan" required><br>

  <label>Warna:</label><br>
  <input type="text" name="warna" required><br>

  <label>Pemilik:</label><br>
  <input type="text" name="pemilik" required><br>

  <label>ID User:</label><br>
  <input type="number" name="id_user" required><br>

  <button type="submit">Tambah</button>
  <button type="button" onclick="window.location.href='tampil_data_kendaraan.php'">Batal</button>
</form>

</body>
</html>
