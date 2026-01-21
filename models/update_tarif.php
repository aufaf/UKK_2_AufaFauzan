<?php
include "../controllers/koneksi.php";

$id_tarif            = $_POST['id_tarif'];
$jenis_kendaraan     = $_POST['jenis_kendaraan'];
$tarif_per_jam       = $_POST['tarif_per_jam'];

try {
    mysqli_query
    ($koneksi,
    "UPDATE tarif SET id_tarif = '$id_tarif', jenis_kendaraan = '$jenis_kendaraan', tarif_per_jam = '$tarif_per_jam'" );

    header ("location: tampildata.php");

} catch (exception $e) {
    echo "Edit Data Gagal :" . $e->getMessage();
}


$koneksi->query($sql);

header("Location: ../public/tampil_data_tarif.php");
exit;
?>
