<?php
// session_start();
include_once "../models/m_log.php";

$logModel = new m_log();

// ambil data log untuk ditampilkan
$dataLog = $logModel->getLog();


// fungsi helper untuk dipanggil dari controller lain
function tambahLog($aktivitas){

    include_once "../models/m_log.php";

    if (!isset($_SESSION['id_user'])) {
        return; // hentikan kalau tidak ada session
    }

    $user_id = $_SESSION['id_user']; // ✅ HARUS DI ATAS

    $logModel = new m_log();
    $logModel->simpanLog($user_id, $aktivitas);
}
?>