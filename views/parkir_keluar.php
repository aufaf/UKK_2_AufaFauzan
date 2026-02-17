<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Parkir Keluar</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<style>
*{font-family:Inter;margin:0;padding:0;box-sizing:border-box}

body{
  background:#f1f5f9;
  padding:30px;
}

.container{
  display:grid;
  grid-template-columns:2fr 1fr;
  gap:25px;
}

.card{
  background:white;
  padding:20px;
  border-radius:15px;
  box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.header-red{
  background:linear-gradient(90deg,#ef4444,#f43f5e);
  color:white;
  padding:15px;
  border-radius:10px;
  margin-bottom:15px;
}

select{
  width:100%;
  padding:12px;
  border-radius:10px;
  border:1px solid #e5e7eb;
}

button{
  padding:12px;
  border:none;
  border-radius:10px;
  cursor:pointer;
}

.btn-red{
  background:#ef4444;
  color:white;
  width:100%;
  margin-top:15px;
}

.estimasi{
  background:#fff7ed;
  padding:15px;
  border-radius:12px;
  margin-top:15px;
}

.info{
  background:#fef3c7;
}

.stat{
  background:#dcfce7;
  padding:15px;
  border-radius:12px;
  margin-top:15px;
}
</style>
</head>

<body>

<h2>🚗 Parkir Keluar</h2>
<p style="color:gray">Pilih kendaraan yang akan keluar</p>

<div class="container">

<!-- KIRI -->
<div class="card">

  <div class="header-red">
    Form Parkir Keluar
  </div>

  <label>Plat Nomor Kendaraan</label>

  <select id="kendaraan" onchange="hitungEstimasi()">
    <option value="" disabled selected>Pilih kendaraan</option>

    <!-- value = jam masuk -->
    <option value="2026-01-06 18:00" data-tarif="2000">
      BC 2000 BS - Motor (Masuk 18:00)
    </option>

    <option value="2026-01-06 17:30" data-tarif="5000">
      BA 1111 AQ - Mobil (Masuk 17:30)
    </option>
  </select>

  <!-- ESTIMASI -->
  <div class="estimasi" id="hasil" style="display:none">
    <h4>Estimasi Pembayaran</h4>
    <p>Durasi Parkir: <b id="durasi"></b></p>
    <p>Estimasi Biaya: <b id="biaya"></b></p>
  </div>

 <button class="btn-red" onclick="alert('Kendaraan berhasil checkout!')">
  Proses Parkir Keluar
</button>


  <!-- TABEL KENDARAAN TERPARKIR -->
<div class="card" style="margin-top:20px">

<h3>Kendaraan Sedang Parkir</h3>

<table width="100%" border="0" style="margin-top:10px;border-collapse:collapse">
<tr style="background:#f1f5f9">
  <th align="left">Plat</th>
  <th align="left">Jenis</th>
  <th align="left">Waktu Masuk</th>
  <th align="left">Durasi</th>
</tr>

<tr>
  <td>BC 2000 BS</td>
  <td>🏍️ Motor</td>
  <td>18:00</td>
  <td id="d1">-</td>
</tr>

<tr>
  <td>BA 1111 AQ</td>
  <td>🚗 Mobil</td>
  <td>17:30</td>
  <td id="d2">-</td>
</tr>

</table>

</div>


</div>

<!-- KANAN -->
<div class="card info">
  <h3>Informasi Parkir Keluar</h3>

  <ul style="margin-left:18px;margin-top:10px">
    <li>Sistem hitung durasi otomatis</li>
    <li>Pembulatan per jam</li>
    <li>Struk bisa dicetak</li>
  </ul>

  <div class="stat">
    <b>Pendapatan Hari Ini</b>
    <h3>Rp 18.000</h3>
  </div reported? No fine>
</div>

</div>

<script>
function hitungEstimasi(){

  let select = document.getElementById("kendaraan");

  if(select.value == ""){
    return;
  }

  let masuk = new Date(select.value);
  let tarif = select.options[select.selectedIndex].dataset.tarif;

  let sekarang = new Date();

  // hitung selisih menit
  let diff = (sekarang - masuk) / 60000;

  // pembulatan jam ke atas
  let jam = Math.ceil(diff / 60);

  let biaya = jam * tarif;

  // tampilkan
  document.getElementById("durasi").innerText =
    Math.floor(diff) + " menit ("+jam+" jam)";

  document.getElementById("biaya").innerText =
    "Rp " + biaya.toLocaleString();

  document.getElementById("hasil").style.display="block";
}


function hitungDurasi(id, jamMasuk){
  let masuk = new Date(jamMasuk);
  let sekarang = new Date();

  let menit = Math.floor((sekarang - masuk)/60000);

  document.getElementById(id).innerText = menit+" menit";
}

// update tiap 1 menit
setInterval(()=>{
  hitungDurasi("d1","2026-01-06 18:00");
  hitungDurasi("d2","2026-01-06 17:30");
},1000);
</script>

</body>
</html>
