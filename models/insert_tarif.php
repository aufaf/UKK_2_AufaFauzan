<?php
include "../controllers/koneksi.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$jenis_kendaraan = $_POST['jenis_kendaraan'];
$tarif_per_jam     = $_POST['tarif_per_jam'];

try {
    $koneksi->query("
        INSERT INTO `tarif` (jenis_kendaraan, tarif_per_jam) 
        VALUES ('$jenis_kendaraan', '$tarif_per_jam')");

    header("Location: ../public/tampil_data_tarif.php");
    exit;

} catch (Exception $e) {
    echo "Tambah data gagal: " . $e->getMessage();
}
?>
