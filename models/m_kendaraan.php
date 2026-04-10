<?php

require_once "m_koneksi.php";

//membuat kelas area
class m_kendaraan
{
    public function tampil_data_kendaraan($keyword = null)
    {

        //membuat objek dari kelas m_koneksi
        $conn = new m_koneksi();

        //membuat query untuk menampilkan semua data dari tabel kendaraan
        $sql = "SELECT * FROM kendaraan";

        // 2. Jika ada keyword, modifikasi query-nya
        if ($keyword != null) {
            // Bersihkan input agar aman dari SQL Injection
            $keyword = mysqli_real_escape_string($conn->koneksi, $keyword);

            // Tambahkan kondisi WHERE untuk mencari di kolom plat_nomor atau jenis_kendaraan
            $sql .= " WHERE plat_nomor LIKE '%$keyword%' OR jenis_kendaraan LIKE '%$keyword%'";
        }

        //perintah untuk menjalankan query di atas baris ke 14
        $post = mysqli_query($conn->koneksi, $sql);


        //mengecek apakah hasil variabel $post ada datanya atau tidak
        if ($post->num_rows > 0) {
            //merubah data dari variabel $post menjadi data berbentuk objek
            while ($data = mysqli_fetch_object($post)) {
                //menyimpan data objek kedalam variabel $result yang berbentuk array
                $result[] = $data;
            }
            //kembalikan nilainya
            return $result;
        } else {
            echo "tidak ada data";
        }
    }

    function tambah_data_kendaraan($plat_nomor, $jenis_kendaraan)
    {
        //membuat objek dari kelas m_koneksi
        $conn = new m_koneksi();

        //membuat query untuk memasukkan data ke tabel user
        $sql = "INSERT INTO kendaraan VALUES (NULL, '$plat_nomor', '$jenis_kendaraan')";

        //perintah unruk menjalankan query atau sql di atas
        $query = mysqli_query($conn->koneksi, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/tampil_data_kendaraan.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');window.location='../views/tambah_data_kendaraan.php'</script>";
        }
    }

    function tampil_data_by_id($id_kendaraan)
    {
        $conn = new m_koneksi();
        $sql = "SELECT * FROM kendaraan WHERE id_kendaraan = $id_kendaraan";
        $query = mysqli_query($conn->koneksi, $sql);

        //data single
        return mysqli_fetch_object($query);
    }

    function ubah_kendaraan($id_kendaraan, $plat_nomor, $jenis_kendaraan)
    {
        $conn = new m_koneksi();
        $sql = "UPDATE kendaraan SET plat_nomor = '$plat_nomor',  jenis_kendaraan = '$jenis_kendaraan' WHERE id_kendaraan = '$id_kendaraan'";

        $query = mysqli_query($conn->koneksi, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/tampil_data_kendaraan.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah');window.location='../views/edit_kendaraan.php'</script>";
        }
    }

    function hapus($id_kendaraan)
    {
        $conn = new m_koneksi();
        $query = "DELETE FROM kendaraan WHERE id_kendaraan = $id_kendaraan";
        mysqli_query($conn->koneksi, $query);
        header("location:../views/tampil_data_kendaraan.php");
    }

//    function cari($keyword){
//     $query = "SELECT * FROM kendaraan WHERE plat_nomor LIKE '%$keyword%' OR jenis_kendaraan LIKE '%$keyword%'";
//    }
}



?>