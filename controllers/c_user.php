<?php

include_once "../models/m_user.php";

// membuat objek dari kelas tarif
$user = new m_user;

//Fungsi try catch adalah struktur pengendalian kesalahan (error handling) dalam pemrograman yang menungkinkan penanganan kesalahan yang terjadi selama eksekusi kode
try {
    //mengecek apakah ada aksi atau tidak
    if (!empty($_GET['aksi'])) {


        if (!($_GET['aksi'] == 'hapus')) { //mengecek aksi tidak sama dengan hapus

            if ($_GET['aksi'] == 'edit') {
                $id_user = $_GET['id'];

                $users = $user->tampil_data_by_id($id_user);

                include_once "../views/edit_user.php";

                //else ini untuk fungsi tambah dan update
            } else {


                //menangkap isi inputan dari user
                $id_user = $_POST['id_user'];
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password_input = $_POST['password'];

                if(!empty($password_input)){
                $password = password_hash($password_input, PASSWORD_DEFAULT);
                } else {
                $password = "";
                }
                
                $role = $_POST['role'];
                $status_aktif = $_POST['status_aktif'];


                if ($_GET['aksi'] == 'tambah') { //mengecek apbila aksi sama dengan tambah

                    //memanggil fungsi tambah
                    $user->tambah_data_user($id_user, $nama, $username, $password, $role, $status_aktif);



                } elseif ($_GET['aksi'] == 'update') { //mengecek aksi sama dengan update
                    // update 
                    $user->ubah_user($id_user, $nama, $username, $password, $role, $status_aktif);
                }
            }
        } else {
            //buat aksi  hapus
            $id_user = $_GET['id'];

            //memanggil fungsi hapus
            $user->hapus($id_user);
        }
    } else {
        // memanggil fungsi tampil data yang ada pada kelas m_user
        $users = $user->tampil_data_user();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}





?>