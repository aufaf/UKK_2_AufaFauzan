<?php

include_once "../models/m_user.php";

// membuat objek dari kelas tarif
$user = new m_user;

// memanggil fungsi tampil data yang ada pada kelas m_user
$users = $user -> tampil_data_user();



?>