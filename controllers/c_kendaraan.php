<?php

include_once "../models/m_kendaraan.php";

// membuat objek dari kelas kendaraan
$kendaraan = new m_kendaraan;

// memanggil fungsi tampil data yang ada pada kelas m_kendaraan
$kendaraans = $kendaraan -> tampil_data_kendaraan();



?>