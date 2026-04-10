<?php

session_start();
include_once "c_log.php";
tambahLog("telah keluar dari sistem (logout)");
session_unset();
session_destroy();

header("Location: ../index.php");
exit();

?>