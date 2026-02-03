<?php

session_start();

class AuthController {

    private $model;

    public function __construct($koneksi){
        $this->model = new UserModel($koneksi);
    }

    public function login(){

        $user = $this->model->login(
            $_POST['username'],
            $_POST['password']
        );

        if($user){
            $_SESSION['user']=$user;

            // redirect sesuai role
            if($user['role']=="admin"){
                header("Location:views/dashboard_admin.php");
            }
            elseif($user['role']=="petugas"){
                header("Location:views/dashboard_petugas.php");
            }
            else{
                header("Location:views/dashboard_owner.php");
            }

        }else{
            echo "Login gagal!";
        }
    }

    public function logout(){
        session_destroy();
        header("Location:index.php");
    }
}
