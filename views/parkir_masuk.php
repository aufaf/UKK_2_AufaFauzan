<?php
require_once "../models/m_area.php";
$area = new m_area();
$dataArea = $area->getAll();
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Parkir Masuk</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Inter',sans-serif;
}

body{
  background:#f1f5f9;
  padding:30px;
}

/* BACK LINK */
.back{
  text-decoration:none;
  color:#64748b;
  font-size:14px;
}

/* LAYOUT */
.container{
  display:grid;
  grid-template-columns:2fr 1fr;
  gap:25px;
  margin-top:20px;
}

/* CARD */
.card{
  background:white;
  border-radius:15px;
  box-shadow:0 5px 15px rgba(0,0,0,0.05);
  padding:20px;
}

/* HEADER ORANGE */
.card-header{
  background:linear-gradient(90deg,#f59e0b,#f97316);
  color:white;
  padding:15px;
  border-radius:12px;
  margin-bottom:20px;
  font-weight:600;
}

/* INPUT */
label{
  font-size:14px;
  color:#475569;
}

input{
  width:100%;
  padding:12px;
  margin-top:8px;
  margin-bottom:15px;
  border-radius:10px;
  border:1px solid #e5e7eb;
}

/* JENIS KENDARAAN */
.jenis{
  display:flex;
  gap:15px;
}

.jenis div{
  flex:1;
  padding:15px;
  border:2px solid #e5e7eb;
  border-radius:12px;
  cursor:pointer;
  text-align:center;
}

.jenis div:hover{
  border-color:#f97316;
  background:#fff7ed;
}

/* BUTTON */
.btn{
  padding:12px 20px;
  border:none;
  border-radius:10px;
  cursor:pointer;
}

.btn-orange{
  background:#f97316;
  color:white;
}

.btn-gray{
  background:#e5e7eb;
}

.actions{
  display:flex;
  gap:10px;
  margin-top:10px;
}

/* INFO PANEL */
.info{
  background:#fff7ed;
}

.info ul{
  padding-left:18px;
  margin-top:10px;
}

.stat{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:10px;
  margin-top:15px;
}

.stat div{
  background:white;
  padding:10px;
  border-radius:10px;
  text-align:center;
}

.zona{
  display:flex;
  gap:15px;
  margin-top:10px;
}

.zona div{
  flex:1;
  padding:15px;
  border:2px solid #e5e7eb;
  border-radius:12px;
  text-align:center;
  cursor:pointer;
  font-weight:500;
}

.zona div:hover{
  border-color:#f97316;
  background:#fff7ed;
}

/* aktif */
.zona .aktif{
  background:#f97316;
  color:white;
  border-color:#f97316;
}

.jenis .aktif{
  background:#f97316;
  color:white;
  border-color:#f97316;
}


</style>
</head>

<body>

<a href="dashboard_petugas.php" class="back">← Kembali ke Dashboard</a>

<h2 style="margin-top:10px;">🅿️ Parkir Masuk</h2>
<p style="color:#64748b;">Input data kendaraan yang masuk area parkir</p>

<div class="container">

<!-- FORM -->
<div class="card">

  <div class="card-header">
    Form Input Kendaraan
  </div>

  <form method="POST" action="../controllers/c_parkir_masuk.php" onsubmit="return validasi()">


    <label>Plat Nomor Kendaraan *</label>
    <input type="text" name="plat" placeholder="Contoh: B 1234 ABC" required>

    <label>Jenis Kendaraan *</label>

    <div class="jenis">
      <div onclick="pilih('Motor', this)">🏍️ Motor</div>
      <div onclick="pilih('Mobil', this)">🚗 Mobil</div>
    </div>

    <label>Area Parkir *</label>

<div class="zona">
<?php while($a=$dataArea->fetch_assoc()){ ?>
  <div onclick="pilihZona('<?= $a['id_area'] ?>', this)">
    <?= $a['nama_area'] ?>
  </div>
<?php } ?>
</div>

<input type="hidden" name="area" id="zonaInput">



    <input type="hidden" name="jenis" id="jenisInput">

    <div class="actions">
      <button class="btn btn-orange" type="submit">
        💾 Simpan Data Masuk
      </button>

      <button type="reset" class="btn btn-gray">
        Reset
      </button>
    </div>

  </form>

</div>

<!-- INFO -->
<div class="card info">

  <h3>Informasi Parkir Masuk</h3>

  <ul>
    <li>Pastikan plat nomor jelas</li>
    <li>Pilih jenis kendaraan sesuai kategori</li>
    <li>Waktu masuk tercatat otomatis</li>
    <li>Kendaraan aktif tidak bisa masuk lagi</li>
  </ul>

  <h4 style="margin-top:15px;">Statistik Hari Ini</h4>

  <div class="stat">
    <div>
      <b>7</b>
      <p>Total Masuk</p>
    </div>

    <div>
      <b>3</b>
      <p>Mobil</p>
    </div>

    <div>
      <b>4</b>
      <p>Motor</p>
    </div>

    <div>
      <b id="jam"></b>
            <p>Waktu</p>
    </div>
  </div>

</div>

</div>

<script>
function pilih(j, el){
  document.getElementById('jenisInput').value = j;

  document.querySelectorAll('.jenis div')
    .forEach(d=>d.classList.remove('aktif'));

  el.classList.add('aktif');
}


// Jam realtime
setInterval(()=>{
  const d = new Date();
  document.getElementById('jam').innerText =
    d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
},1000);

// PILIH ZONA
function pilihZona(zona, el){

  // hapus aktif sebelumnya
  document.querySelectorAll('.zona div')
    .forEach(d=>d.classList.remove('aktif'));

  // aktifkan yang dipilih
  el.classList.add('aktif');

  // set value ke input
  document.getElementById('zonaInput').value = zona;
}
</script>


</body>
</html>

