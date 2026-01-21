<?php
include "../controllers/koneksi.php";

$id            = $_POST['id_user'];
$nama_lengkap  = $_POST['nama_lengkap'];
$username      = $_POST['username'];
$role          = $_POST['role'];
$status_aktif  = $_POST['status_aktif'];
$password      = $_POST['password'];

if (!empty($password)) {
    // jika password diubah
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE `user` SET 
            nama_lengkap='$nama_lengkap',
            username='$username',
            password='$password',
            role='$role',
            status_aktif='$status_aktif'
            WHERE id_user='$id'";
} else {
    // jika password tidak diubah
    $sql = "UPDATE `user` SET 
            nama_lengkap='$nama_lengkap',
            username='$username',
            role='$role',
            status_aktif='$status_aktif'
            WHERE id_user='$id'";
}

$koneksi->query($sql);

header("Location: ../public/tampil_data_user.php");
exit;
?>
