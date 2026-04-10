<?php
session_start();
include_once "../models/m_login.php";
include_once "c_log.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $model = new m_login();
    $result = $model->getUserByUsername($username);

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

        // 2. CEK STATUS AKTIF
            // Sesuaikan dengan isi database Anda, misalnya 'Aktif' atau '1'
            if ($user['status_aktif'] != 1) {
                // Jika status tidak aktif, arahkan kembali dengan error khusus
                header("Location: ../index.php?error=nonaktif");
                exit();
            }

            $_SESSION['log'] = "logged";
            $_SESSION['id_user'] = $user['id_user']; // ✅ TAMBAHKAN INI
            $_SESSION['username'] = $user['username']; // (opsional tapi bagus)
            $_SESSION['role'] = $user['role'];

            // Kita panggil setelah session set agar fungsi tambahLog bisa menangkap id_user
            tambahLog("melakukan login ke dalam sistem");

            if ($user['role'] == "admin") {
                header("Location: ../views/dashboard_admin.php");
            } elseif ($user['role'] == "petugas") {
                header("Location: ../views/dashboard_petugas.php");
            } else {
                header("Location: ../views/dashboard_owner.php");
            }
            exit();
        }
    }

    header("Location: ../index.php?error=1");
    exit();
}
