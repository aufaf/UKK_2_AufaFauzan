<?php

require_once "m_koneksi.php";

//membuat kelas area
class m_area
{
    public function tampil_data_area($keyword = null)
    {

        //membuat objek dari kelas m_koneksi
        $conn = new m_koneksi();

        //membuat query untuk menampilkan semua data dari tabel area
        $sql = "SELECT * FROM area_parkir";

        // 2. Jika ada keyword, modifikasi query-nya
        if ($keyword != null) {
            // Bersihkan input agar aman dari SQL Injection
            $keyword = mysqli_real_escape_string($conn->koneksi, $keyword);

            // Tambahkan kondisi WHERE untuk mencari di kolom plat_nomor atau jenis_kendaraan
            $sql .= " WHERE nama_area LIKE '%$keyword%'";
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

    function tambah_data_area($nama_area, $kapasitas, $terisi)
    {
        //membuat objek dari kelas m_koneksi
        $conn = new m_koneksi();

        //membuat query untuk memasukkan data ke tabel user
        $sql = "INSERT INTO area_parkir VALUES (NULL, '$nama_area', '$kapasitas', '$terisi')";

        //perintah unruk menjalankan query atau sql di atas
        $query = mysqli_query($conn->koneksi, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/tampil_data_area.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');window.location='../views/tambah_data_area.php'</script>";
        }
    }

    function tampil_data_by_id($id_area)
    {
        $conn = new m_koneksi();
        $sql = "SELECT * FROM area_parkir WHERE id_area = $id_area";
        $query = mysqli_query($conn->koneksi, $sql);

        //data single
        return mysqli_fetch_object($query);
    }

    function ubah_area($id_area, $nama_area, $kapasitas, $terisi)
    {
        $conn = new m_koneksi();
        $sql = "UPDATE area_parkir SET nama_area = '$nama_area', kapasitas = '$kapasitas', terisi = '$terisi' WHERE id_area = '$id_area'";

        $query = mysqli_query($conn->koneksi, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/tampil_data_area.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah');window.location='../views/edit_area.php'</script>";
        }
    }

    function hapus($id_area)
    {
        $conn = new m_koneksi();
        $query = "DELETE FROM area_parkir WHERE id_area = '$id_area'";
        mysqli_query($conn->koneksi, $query);
        header("location:../views/tampil_data_area.php");
    }


    //chatgpt
    private $db;

    public function __construct()
    {
        $koneksi = new m_koneksi();
        $this->db = $koneksi->koneksi; // ambil mysqli-nya
    }

    public function tambahTerisi($id_area)
    {
        $this->db->query("
            UPDATE area_parkir
            SET terisi = terisi + 1
            WHERE id_area='$id_area'
        ");
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM area_parkir");
    }
}

?>