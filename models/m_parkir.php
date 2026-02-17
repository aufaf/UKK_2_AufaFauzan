<?php
require_once "m_koneksi.php";

class m_parkir
{

    private $db;

    public function __construct()
    {
        $k = new m_koneksi();
        $this->db = $k->koneksi;
    }

    // ambil area
    public function getArea()
    {
        return $this->db->query("SELECT * FROM area_parkir");
    }

    // parkir masuk
    public function parkirMasuk($plat, $jenis, $id_area)
    {

        // 1️⃣ CEK kendaraan sudah ada atau belum
        $cek = $this->db->query("
            SELECT * FROM kendaraan 
            WHERE plat_nomor='$plat'
        ");

        if ($cek->num_rows == 0) {
            $this->db->query("
                INSERT INTO kendaraan(plat_nomor,jenis_kendaraan)
                VALUES('$plat','$jenis')
            ");
        }

        // 2️⃣ Ambil id kendaraan
        $kend = $this->db->query("
            SELECT id_kendaraan FROM kendaraan 
            WHERE plat_nomor='$plat'
        ")->fetch_assoc();

        $id_kendaraan = $kend['id_kendaraan'];

        // 3️⃣ Ambil id tarif berdasarkan jenis
        $tarif = $this->db->query("
            SELECT id_tarif FROM tarif
            WHERE jenis_kendaraan='$jenis'
        ")->fetch_assoc();

        $id_tarif = $tarif['id_tarif'];

        // 4️⃣ Simpan transaksi
        $this->db->query("
            INSERT INTO transaksi
            (id_kendaraan,id_area,id_tarif,waktu_masuk,status)
            VALUES
            ('$id_kendaraan','$id_area','$id_tarif',NOW(),'masuk')
        ");

        $id_transaksi = $this->db->insert_id;

        // 5️⃣ Update kapasitas area
        $this->db->query("
            UPDATE area_parkir
            SET terisi = terisi + 1
            WHERE id_area='$id_area'
        ");

        return $id_transaksi;
    }

    public function tampil_parkir()
    {
        $conn = new m_koneksi();
        $sql = "SELECT FROM * transaksi, kendaraan";
        $post = mysqli_query($conn->koneksi, $sql);
        if ($post->num_rows > 0) {
            while ($data = mysqli_fetch_object($post)) {
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