<?php

include_once "../models/m_tarif.php";

// membuat objek dari kelas tarif
$tarif = new m_tarif;

// memanggil fungsi tampil data yang ada pada kelas m_kendaraan
$tarifs = $tarif -> tampil_data_tarif();



?>