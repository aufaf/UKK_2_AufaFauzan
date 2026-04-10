<?php

//membuat sebuah class pada konsep oop
class m_koneksi
{

//membuat variabel/properti

//jenis jenis modifier/konsep enkapsulasi pada oop
//private hanya dapat diakses di dalam kelas tempat ia didefinisikan, sering digunakan untuk data hiding
//public dapat diakses di mana saja, baik di dalam maupun maupun diluar paket/kelas
//protected komponen dapat diakses oleh kelas yang sama, subclass (kelas anak), dam paket yang sama

    private $host = "localhost",
    $username = "root",
    $pass = "",
    $db = "parkir";

    public $koneksi;

    //membuat konstrak yang dimana fungsi ini akan dijalankan otomatis ketika kita membuat objek dari dari kelas koneksi
    function __construct()
    {
        //variabel $this adalah sebuah variabel khusus dalasm oop php yang digunakan sebagai penunjuk kepada objek, ketika kita mengaksesnya dari dalam class.
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->username,
            $this->pass,
            $this->db
        );

        if ($this->koneksi) {
            //echo "koneksi ke database" . $this->db . "berhasil"; 

            //mengembalikan nilai true jika koneksi ke database berhasil
            //return $this->koneksi;
        } else {

            //memunculkan pesan error jika koneksi database gagal
            die("koneksi ke database gagal" . mysqli_connect_error());
        }
    }

}
//cara membuat variabel objek
$conn = new m_koneksi();


