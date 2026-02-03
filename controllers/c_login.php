<?php
session_start();
require_once "../models/proses_login.php";

class AuthController {
    public function login() {
        $user = new User();

        $result = $user->login(
            $_POST['username'],
            $_POST['password']
        );

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            $_SESSION['login'] = true;
            $_SESSION['role']  = $data['role'];
            $_SESSION['nama']  = $data['username'];

            // Redirect sesuai role
            if ($data['role'] == 'admin') {
                header("Location: ../views/dashboard_admin.php");
            } elseif ($data['role'] == 'petugas') {
                header("Location: ../view/dashboard_petugas.php");
            } else {
                header("Location: ../views/dashboard_owner.php");
            }
        } else {
            header("Location: ../views/v_login.php?error=1");
        }
    }
}

$auth = new AuthController();
$auth->login();

?>
