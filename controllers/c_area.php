<?php

include_once "../models/m_area.php";
include_once "c_log.php";

// membuat objek dari kelas tarif
$area = new m_area;

//Fungsi try catch adalah struktur pengendalian kesalahan (error handling) dalam pemrograman yang menungkinkan penanganan kesalahan yang terjadi selama eksekusi kode
try {
    //mengecek apakah ada aksi atau tidak
    if (!empty($_GET['aksi'])) {


        if (!($_GET['aksi'] == 'hapus')) { //mengecek aksi tidak sama dengan hapus

            if ($_GET['aksi'] == 'edit') {
                $id_area = $_GET['id'];

                $areas = $area->tampil_data_by_id($id_area);

                include_once "../views/edit_area.php";

                //else ini untuk fungsi tambah dan update
            } else {

                //menangkap isi inputan dari user
                $id_area = $_POST['id_area'];
                $nama_area = $_POST['nama_area'];
                $kapasitas = $_POST['kapasitas'];
                $terisi = $_POST['terisi'];


                if ($_GET['aksi'] == 'tambah') { //mengecek apbila aksi sama dengan tambah

                    //memanggil fungsi tambah
                    $area->tambah_data_area($nama_area, $kapasitas, $terisi);

                    // ✅ PERBAIKAN LOG TAMBAH
                    tambahLog("menambahkan area parkir baru: [$nama_area] dengan kapasitas ($kapasitas)");

                } elseif ($_GET['aksi'] == 'update') { //mengecek aksi sama dengan update
                    // update 
                    $area->ubah_area($id_area, $nama_area, $kapasitas, $terisi);

                    // ✅ PERBAIKAN LOG UPDATE (Gunakan $id_area, bukan $id_tarif)
                    tambahLog("memperbarui data area [$nama_area] (ID: $id_area). Kapasitas: $kapasitas, Terisi: $terisi");


                }
            }
        } else {
            //buat aksi  hapus
            $id_area = $_GET['id'];

            //memanggil fungsi hapus
            $area->hapus($id_area);

            // ✅ PERBAIKAN LOG HAPUS
            tambahLog("menghapus area parkir dengan ID [$id_area]");
        }
    } else {

        // ✅ BAGIAN SEARCH
        if (isset($_POST['aksi'])) {
            $keyword = $_POST['keyword'];

            $areas = $area->tampil_data_area($keyword);
        } else {

            $areas = $area->tampil_data_area();
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}



?>