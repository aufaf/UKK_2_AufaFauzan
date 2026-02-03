<?php

$koneksi = new mysqli("localhost","root","","parkir");

require_once "models/m_login.php";
require_once "controllers/AuthController.php";

$c = $_GET['c'] ?? 'auth';
$a = $_GET['a'] ?? 'form';

$auth = new AuthController($koneksi);

if($c=="auth"){

    if($a=="login"){
        $auth->login();
    }
    elseif($a=="logout"){
        $auth->logout();
    }
    else{
        include "views/v_login.php";
    }

}
