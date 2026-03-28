<?php
require_once "../models/m_koneksi.php";

$db = (new m_koneksi())->koneksi;

$id = $_GET['id'];

$data = $db->query("
SELECT 
t.id_parkir,
k.plat_nomor,
k.jenis_kendaraan,
a.nama_area,
t.waktu_masuk,
t.waktu_keluar,
t.biaya_total

FROM transaksi t
JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
JOIN area_parkir a ON t.id_area = a.id_area

WHERE t.id_parkir='$id'
")->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Struk Parkir Keluar</title>
    <link rel="stylesheet" href="../asset/css/struk.css">

</head>

<body>

    <div class="struk">

        <div class="center">

            <h3>STRUK PARKIR</h3>
            <p>ParkirApp</p>

            <hr>

        </div>

        ID Transaksi : <?= $data['id_parkir'] ?><br>
        Plat Nomor : <?= $data['plat_nomor'] ?><br>
        Jenis : <?= $data['jenis_kendaraan'] ?><br>
        Area : <?= $data['nama_area'] ?><br>

        <hr>

        Masuk : <?= $data['waktu_masuk'] ?><br>
        Keluar : <?= $data['waktu_keluar'] ?><br>

        <hr>

        Total Bayar :
        <b>Rp <?= number_format($data['biaya_total']) ?></b>

        <hr>

        <div class="center">
            Terima Kasih 🙏
        </div>

        <button onclick="window.print()">🖨️ Cetak</button>

        <a href="parkir_keluar.php">
            <button>Kembali</button>
        </a>

    </div>

</body>

</html>