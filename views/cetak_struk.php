<?php
require_once "../models/m_koneksi.php";

$db = (new m_koneksi())->koneksi;

$id = $_GET['id'];

$data = $db->query("
SELECT t.id_parkir,k.plat_nomor,k.jenis_kendaraan,
       a.nama_area,t.waktu_masuk,t.status
FROM transaksi t
JOIN kendaraan k ON t.id_kendaraan=k.id_kendaraan
JOIN area_parkir a ON t.id_area=a.id_area
WHERE t.id_parkir='$id'
")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Struk Parkir</title>
<style>
body{
  font-family:monospace;
  display:flex;
  justify-content:center;
}

.struk{
  width:300px;
  border:1px dashed black;
  padding:15px;
}

.center{text-align:center;}
button{
  width:100%;
  padding:10px;
  margin-top:10px;
}
</style>
</head>

<body>

<div class="struk">

<div class="center">
<h3>STRUK PARKIR</h3>
<p>ParkirKu</p>
<hr>
</div>

ID Transaksi : <?= $data['id_parkir'] ?><br>
Plat : <?= $data['plat_nomor'] ?><br>
Jenis : <?= $data['jenis_kendaraan'] ?><br>
Area : <?= $data['nama_area'] ?><br>
Masuk : <?= $data['waktu_masuk'] ?><br>
Status : <?= $data['status'] ?><br>

<hr>

<div class="center">
Terima Kasih 🙏
</div>

<button onclick="window.print()">🖨️ Cetak</button>

</div>

</body>
</html>
