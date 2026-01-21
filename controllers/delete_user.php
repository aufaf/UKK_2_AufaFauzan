<?php

include "koneksi.php";

$id = $_GET ['id'];

try {
    $koneksi -> query ("DELETE FROM user WHERE id_user = $id");
    header("location: ../public/tampil_data_user.php");
} catch (exception $e) {
    echo "Hapus Data Gagal :" . $e->getMessage();
}

?>