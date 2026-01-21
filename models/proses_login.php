<?php
session_start();
include "../controller/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = $koneksi->query("SELECT * FROM `user` WHERE username='$username' AND status_aktif='aktif'");

if ($data->num_rows > 0) {
    $user = $data->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // simpan session
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // arahkan berdasarkan role
        if ($user['role'] == 'admin') {
            header("Location: ../public/dashboard_admin.php");
        } elseif ($user['role'] == 'petugas') {
            header("Location: ../public/dashboard_petugas.php");
        } else {
            header("Location:../public/dashboard_owner.php");
        }
        exit;
    }
}

echo "Login gagal! Username atau password salah.";
?>
