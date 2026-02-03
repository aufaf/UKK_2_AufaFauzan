<?php

include_once "../models/m_masuk.php";

// membuat objek dari kelas tarif
$parkir_masuk = new m_masuk;

// memanggil fungsi tampil data yang ada pada kelas m_kendaraan
$masuks = $masuk -> tampil_data_parkir_masuk();



?>