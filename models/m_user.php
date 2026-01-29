<?php

include_once "m_koneksi.php";

//membuat kelas area
class m_user
{
    public function tampil_data_user(){

    //membuat objek dari kelas m_koneksi
    $conn = new m_koneksi();

    //membuat query untuk menampilkan semua data dari tabel kendaraan
    $sql = "SELECT * FROM user";
    
    //perintah untuk menjalankan query di atas baris ke 14
    $post = mysqli_query($conn->koneksi, $sql);

    //mengecek apakah hasil variabel $post ada datanya atau tidak
    if($post->num_rows > 0){
        //merubah data dari variabel $post menjadi data berbentuk objek
        while ($data = mysqli_fetch_object($post)){
            //menyimpan data objek kedalam variabel $result yang berbentuk array
            $result[] = $data;
        }
        //kembalikan nilainya
        return $result;
        } else {
        echo "tidak ada data";
        }
    }
}



?>