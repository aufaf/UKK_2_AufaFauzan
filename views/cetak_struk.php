<?php
require_once '../controllers/c_test.php';
$ctrl = new ParkirController();
$data = $ctrl->siapkanStruk($_GET['id']);

// Konversi waktu masuk ke format timestamp untuk JS
$waktu_masuk_ts = strtotime($data['waktu_masuk']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Parkir</title>
    <style>
        .box { border: 2px solid #000; width: 300px; padding: 15px; font-family: sans-serif; }
        .timer { font-size: 20px; color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="box">
        <h3>STRUK PARKIR MASUK</h3>
        <hr>
        <p>Plat Nomor: <b><?= $data['plat_nomor'] ?></b></p>
        <p>Jenis: <?= $data['jenis_kendaraan'] ?></p>
        <p>Area: <?= $data['nama_area'] ?></p>
        <p>Waktu Masuk: <?= $data['waktu_masuk'] ?></p>
        <hr>
        <p>Durasi Berjalan:</p>
        <div class="timer" id="display-durasi">00:00:00</div>
        <hr>
        <button onclick="window.print()">Cetak</button>
        <a href="test.php">Kembali</a>
    </div>

    <script>
        // Ambil waktu masuk dari PHP ke JavaScript
        const waktuMasuk = <?= $waktu_masuk_ts ?> * 1000; 

        function updateTimer() {
            const sekarang = new Date().getTime();
            const selisih = sekarang - waktuMasuk;

            const jam = Math.floor(selisih / (1000 * 60 * 60));
            const menit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
            const detik = Math.floor((selisih % (1000 * 60)) / 1000);

            document.getElementById("display-durasi").innerHTML = 
                (jam < 10 ? "0"+jam : jam) + ":" + 
                (menit < 10 ? "0"+menit : menit) + ":" + 
                (detik < 10 ? "0"+detik : detik);
        }

        // Jalankan timer setiap 1 detik
        setInterval(updateTimer, 1000);
    </script>
</body>
</html>