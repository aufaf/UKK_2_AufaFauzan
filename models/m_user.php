<?php

include_once "m_koneksi.php";

//membuat kelas area
class m_user
{
    public function tampil_data_user($keyword = null)
    {

        //membuat objek dari kelas m_koneksi
        $conn = new m_koneksi();

        //membuat query untuk menampilkan semua data dari tabel kendaraan
        $sql = "SELECT * FROM user";

        // 2. Jika ada keyword, modifikasi query-nya
        if ($keyword != null) {
            // Bersihkan input agar aman dari SQL Injection
            $keyword = mysqli_real_escape_string($conn->koneksi, $keyword);

            // Tambahkan kondisi WHERE untuk mencari di kolom plat_nomor atau jenis_kendaraan
            $sql .= " WHERE nama_lengkap LIKE '%$keyword%' OR username LIKE '%$keyword%'";
        }

        //perintah untuk menjalankan query di atas baris ke 15
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

    function tambah_data_user($nama, $username, $password, $role, $status_aktif)
    {
        //membuat objek dari kelas m_koneksi
        $conn = new m_koneksi();

        //membuat query untuk memasukkan data ke tabel user
        $sql = "INSERT INTO user VALUES (NULL, '$nama', '$username', '$password', '$role', '$status_aktif')";

        //perintah unruk menjalankan query atau sql di atas
        $query = mysqli_query($conn->koneksi, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/tampil_data_user.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan');window.location='../views/tambah_data_user.php'</script>";
        }
    }

    function tampil_data_by_id($id_user)
    {
        $conn = new m_koneksi();
        $sql = "SELECT * FROM user WHERE id_user = $id_user";
        $query = mysqli_query($conn->koneksi, $sql);

        //data single
        return mysqli_fetch_object($query);
    }

    function ubah_user($id_user, $nama_lengkap, $username, $password, $role, $status_aktif)
    {
        $conn = new m_koneksi();
        if (!empty($password)) {
            // update termasuk password
            $sql = "UPDATE user SET 
            username='$username',
            nama_lengkap='$nama_lengkap',
            password='$password',
            role='$role',
            status_aktif='$status_aktif'
            WHERE id_user='$id_user'";
        } else {
            // update tanpa password
            $sql = "UPDATE user SET 
            username='$username',
            nama_lengkap='$nama_lengkap',
            role='$role',
            status_aktif='$status_aktif'
            WHERE id_user='$id_user'";
        }
        $query = mysqli_query($conn->koneksi, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/tampil_data_user.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah');window.location='../views/edit_user.php'</script>";
        }
    }

    function hapus($id_user)
    {
        $conn = new m_koneksi();
        $query = "DELETE FROM user WHERE id_user = $id_user";
        mysqli_query($conn->koneksi, $query);
        header("location:../views/tampil_data_user.php");
    }
}



?>