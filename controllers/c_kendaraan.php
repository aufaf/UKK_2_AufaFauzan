<?php

include_once "../models/m_kendaraan.php";
include_once "c_log.php";

// membuat objek dari kelas kendaraan
$kendaraan = new m_kendaraan;

//Fungsi try catch adalah struktur pengendalian kesalahan (error handling) dalam pemrograman yang menungkinkan penanganan kesalahan yang terjadi selama eksekusi kode
try {
    //mengecek apakah ada aksi atau tidak
    if (!empty($_GET['aksi'])) {


        if (!($_GET['aksi'] == 'hapus')) { //mengecek aksi tidak sama dengan hapus

            if ($_GET['aksi'] == 'edit') {
                $id_kendaraan = $_GET['id'];

                $kendaraans = $kendaraan->tampil_data_by_id($id_kendaraan);

                include_once "../views/edit_kendaraan.php";

                //else ini untuk fungsi tambah dan update
            } else {

                //menangkap isi inputan dari user
                $id_kendaraan = $_POST['id_kendaraan'];
                $plat_nomor = $_POST['plat_nomor'];
                $jenis_kendaraan = $_POST['jenis_kendaraan'];


                if ($_GET['aksi'] == 'tambah') { //mengecek apbila aksi sama dengan tambah

                    //memanggil fungsi tambah
                    $kendaraan->tambah_data_kendaraan($plat_nomor, $jenis_kendaraan);

                    // ✅ TAMBAHKAN LOG tambah
                    tambahLog("menambah kendaraan dengan plat nomor [$plat_nomor]");

                } elseif ($_GET['aksi'] == 'update') { //mengecek aksi sama dengan update
                    // update 
                    $kendaraan->ubah_kendaraan($id_kendaraan, $plat_nomor, $jenis_kendaraan);

                    // ✅ TAMBAHKAN LOG update
                    tambahLog("mengubah data kendaraan dengan ID [$id_kendaraan]");
                }
            }
        } else {
            //buat aksi  hapus
            $id_kendaraan = $_GET['id'];

            //memanggil fungsi hapus
            $kendaraan->hapus($id_kendaraan);

            // ✅ TAMBAHKAN LOG HAPUS
            tambahLog("menghapus data kendaraan dengan ID [$plat_nomor]");

        }
    } else {

        // ✅ BAGIAN SEARCH
        if (isset($_POST['aksi'])) {
            $keyword = $_POST['keyword'];

            $kendaraans = $kendaraan->tampil_data_kendaraan($keyword);
        } else {

            $kendaraans = $kendaraan->tampil_data_kendaraan();
        }
    }

} catch (Exception $e) {
    echo $e->getMessage();
}



?>