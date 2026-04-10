<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "../models/m_log.php";

$logModel = new m_log();

// --- BAGIAN LOGIKA PENCARIAN (SIMPAN DI SINI) ---
if (isset($_POST['aksi']) && !empty($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    // Ambil data berdasarkan keyword
    $dataLog = $logModel->getLog($keyword);
} else {
    // Jika tidak ada pencarian, ambil semua data seperti biasa
    $dataLog = $logModel->getLog();
}

// LOGIKA HAPUS
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    
    if ($logModel->hapusLog($id)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location='../views/log_aktivitas.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.location='../views/log_aktivitas.php';
              </script>";
    }
}


// fungsi helper untuk dipanggil dari controller lain
// Di dalam c_log.php
function tambahLog($aktivitas) {
    include_once "../models/m_log.php";

    if (!isset($_SESSION['id_user'])) {
        return; 
    }

    $user_id = $_SESSION['id_user'];
    $role = $_SESSION['role']; // Pastikan saat login, session 'role' sudah di-set

    // Tambahkan prefix role pada pesan aktivitas
    $pesan_log = "[" . ucfirst($role) . "] " . $aktivitas;

    $logModel = new m_log();
    $logModel->simpanLog($user_id, $pesan_log);
}


?>