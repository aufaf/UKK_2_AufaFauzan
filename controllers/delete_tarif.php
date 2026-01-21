<?php

include "koneksi.php";

$id = $_GET ['id'];

try {
    $koneksi -> query ("DELETE FROM tarif WHERE id_tarif = $id");
    header("location: ../public/tampil_data_tarif.php");
} catch (exception $e) {
    echo "Hapus Data Gagal :" . $e->getMessage();
}

?>