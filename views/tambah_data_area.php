<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel = "stylesheet" href = "../asset/css/tambah_data.css">
     <title>Tambah Area</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>
<body>
     
<div class="card">
  <h2>➕ Tambah Data Area</h2>

<form action="" method="post">

  <label>Nama Area:</label><br>
  <input type="text" name="nama_area" required><br>

  <label>Kapasitas:</label><br>
  <input type="number" name="kapasitas" required><br>

  <label>Terisi:</label><br>
  <input type="number" name="terisi" required><br>

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
