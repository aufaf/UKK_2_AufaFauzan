<?php

session_start();
//log activity baris 5,8,10
//include_once "../models/m_log.php";


//$log = new m_log();

//$log->tambahLog($_SESSION['id_user'],"Logout dari sistem");
session_unset();
session_destroy();

header("Location: ../index.php");
exit();

?>