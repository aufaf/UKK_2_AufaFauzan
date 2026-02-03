<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel = "stylesheet" href = "../asset/css/tambah_data.css">
     <title>Tambah Data Kendaraan</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>
<body>
     
<div class="card">
  <h2>➕ Tambah Data Kendaraan</h2>

<form action="" method="post">

  <label>Plat Nomor:</label><br>
  <input type="text" name="plat_nomor" required><br>

  <label>Jenis Kendaraan:</label><br>
 <select name="jenis_kendaraan" required>
    <option value="">Pilih Jenis</option>
    <option value="motor">Motor</option>
    <option value="mobil">Mobil</option>
    <option value="lainnya">Lainnya</option>
  </select><br>



 <div class="button-group">
      <button type="submit" class="btn btn-save">💾 Simpan</button>
      <button type="button" class="btn btn-cancel"
        onclick="window.location.href='tampil_data_user.php'">
        Batal
      </button>
    </div>
</form>
</div>

</body>
</html>
