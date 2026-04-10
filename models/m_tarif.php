<?php

include_once "m_koneksi.php";

//membuat kelas area
class m_tarif
{
    public function tampil_data_tarif($keyword = null)
    {

        //membuat objek dari kelas m_koneksi
        $conn = new m_koneksi();

        //membuat query untuk menampilkan semua data dari tabel kendaraan
        $sql = "SELECT * FROM tarif";

        // 2. Jika ada keyword, modifikasi query-nya
        if ($keyword != null) {
            // Bersihkan input agar aman dari SQL Injection
            $keyword = mysqli_real_escape_string($conn->koneksi, $keyword);

            // Tambahkan kondisi WHERE untuk mencari di kolom plat_nomor atau jenis_kendaraan
            $sql .= " WHERE jenis_kendaraan LIKE '%$keyword%'";
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

    function tambah_data_tarif($jenis_kendaraan, $tarif_per_jam)
    {

        //membuat objek dari kelas m_koneksi
        $conn = new m_koneksi();

        //membuat query untuk memasukkan data ke tabel user
        $sql = "INSERT INTO tarif VALUES (NULL, '$jenis_kendaraan', '$tarif_per_jam')";

        //perintah unruk menjalankan query atau sql di atas
        $query = mysqli_query($conn->koneksi, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/tampil_data_tarif.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');window.location='../views/tambah_data_tarif.php'</script>";
        }
    }

    function tampil_data_by_id($id_tarif)
    {
        $conn = new m_koneksi();
        $sql = "SELECT * FROM tarif WHERE id_tarif = $id_tarif";
        $query = mysqli_query($conn->koneksi, $sql);

        //data single
        return mysqli_fetch_object($query);
    }

    function ubah_tarif($id_tarif, $jenis_kendaraan, $tarif_per_jam)
    {
        $conn = new m_koneksi();
        $sql = "UPDATE tarif SET jenis_kendaraan = '$jenis_kendaraan', tarif_per_jam = '$tarif_per_jam' WHERE id_tarif = '$id_tarif'";

        $query = mysqli_query($conn->koneksi, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/tampil_data_tarif.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah');window.location='../views/edit_tarif.php'</script>";
        }
    }

    function hapus($id_tarif)
    {
        $conn = new m_koneksi();
        $query = "DELETE FROM tarif WHERE id_tarif = $id_tarif";
        mysqli_query($conn->koneksi, $query);
        header("location:../views/tampil_data_tarif.php");
    }
}



?>