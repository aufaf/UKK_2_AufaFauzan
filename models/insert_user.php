<?php
include "../controllers/koneksi.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$nama_lengkap = $_POST['nama_lengkap'];
$username     = $_POST['username'];
$password     = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role         = $_POST['role'];
$status_aktif = $_POST['status_aktif'];

try {
    $koneksi->query("
        INSERT INTO `user` (nama_lengkap, username, password, role, status_aktif) 
        VALUES ('$nama_lengkap', '$username', '$password', '$role', '$status_aktif')");

    header("Location: ../public/tampil_data_user.php");
    exit;

} catch (Exception $e) {
    echo "Tambah data gagal: " . $e->getMessage();
}
?>
