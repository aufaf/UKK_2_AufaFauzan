<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tambah Tarif</title>
</head>
<body>
     

<form action="../models/insert_tarif.php" method="post">

  <label>Jenis Kendaraan:</label><br>
 <select name="jenis_kendaraan" required>
    <option value="">Pilih Jenis</option>
    <option value="motor">Motor</option>
    <option value="mobil">Mobil</option>
    <option value="lainnya">Lainnya</option>
  </select><br>

  <label>Tarif Per Jam:</label><br>
  <input type="text" name="tarif_per_jam" required><br>


  <button type="submit">Tambah</button>
  <button type="button" onclick="window.location.href='tampil_data_tarif.php'">Batal</button>
</form>

</body>
</html>
