<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "../models/m_transaksi.php";
include_once "c_log.php"; 

$transaksiModel = new m_parkir();

// DATA PARKIR (DEFAULT)
// =======================
$dataParkir = $transaksiModel->kendaraanParkir();



try {

// =======================
// FITUR CARI
// =======================
if (isset($_POST['cari'])) {

    $keyword = $_POST['keyword'];

    $dataParkir = $transaksiModel->cariKendaraanParkir($keyword);
}
    // PARKIR MASUK
    if (isset($_POST['simpan'])) {

        $plat = $_POST['plat'];
        $jenis = $_POST['jenis'];
        $area = $_POST['area'];

        $idParkir = $transaksiModel->parkirMasuk($plat, $jenis, $area);

        // ✅ LOG
        tambahLog("Petugas menambahkan kendaraan [$plat] ke area [$area]");

        header("Location: ../views/cetak_struk.php?id=" . $idParkir);
        exit;

    }

    // PARKIR KELUAR
    if (isset($_GET['keluar'])) {

        $idParkir = $_GET['keluar'];

        $transaksiModel->parkirKeluar($idParkir);

         // ✅ LOG
        tambahLog("Petugas mengeluarkan kendaraan ID [$idParkir] dari parkir");

        // arahkan ke struk keluar
        header("Location: ../views/cetak_struk_keluar.php?id=" . $idParkir);
        exit;

    }

} catch (Exception $e) {

    echo $e->getMessage();

}
?>