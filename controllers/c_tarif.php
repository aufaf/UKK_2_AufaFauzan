<?php

include_once "../models/m_tarif.php";

// membuat objek dari kelas tarif
$tarif = new m_tarif;

//Fungsi try catch adalah struktur pengendalian kesalahan (error handling) dalam pemrograman yang menungkinkan penanganan kesalahan yang terjadi selama eksekusi kode
try {
    //mengecek apakah ada aksi atau tidak
    if (!empty($_GET['aksi'])) {


        if (!($_GET['aksi'] == 'hapus')) { //mengecek aksi tidak sama dengan hapus

            if ($_GET['aksi'] == 'edit') {
                $id_tarif = $_GET['id'];

                $tarifs = $tarif->tampil_data_by_id($id_tarif);

                include_once "../views/edit_tarif.php";

                //else ini untuk fungsi tambah dan update
            } else {

                //menangkap isi inputan dari tarif
                $id_tarif = $_POST['id_tarif'];
                $jenis_kendaraan = $_POST['jenis_kendaraan'];
                $tarif_per_jam = $_POST['tarif_per_jam'];


                if ($_GET['aksi'] == 'tambah') { //mengecek apbila aksi sama dengan tambah

                    //memanggil fungsi tambah
                    $tarif->tambah_data_tarif($id_tarif, $jenis_kendaraan, $tarif_per_jam);


                } elseif ($_GET['aksi'] == 'update') { //mengecek aksi sama dengan update
                    // update 
                    $tarif->ubah_tarif($id_tarif, $jenis_kendaraan, $tarif_per_jam);
                }
            }
        } else {
            //buat aksi  hapus
            $id_tarif = $_GET['id'];

            //memanggil fungsi hapus
            $tarif->hapus($id_tarif);
        }
    } else {

        // ✅ BAGIAN SEARCH
        if (isset($_POST['aksi'])) {
            $keyword = $_POST['keyword'];

            $tarifs = $tarif->tampil_data_tarif($keyword);
        } else {

            $tarifs = $tarif->tampil_data_tarif();
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}



?>