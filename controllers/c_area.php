<?php

include_once "../models/m_area.php";

// membuat objek dari kelas tarif
$area = new m_area;

// memanggil fungsi tampil data yang ada pada kelas m_area
$areas = $area -> tampil_data_area();



?>