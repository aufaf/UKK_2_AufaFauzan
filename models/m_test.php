<?php
class ParkirModel {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "parkir";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    public function simpanMasuk($plat, $jenis, $id_area) {
        // 1. Simpan kendaraan (Update jika sudah ada)
        $this->conn->query("INSERT INTO kendaraan (plat_nomor, jenis_kendaraan) 
                            VALUES ('$plat', '$jenis') 
                            ON DUPLICATE KEY UPDATE jenis_kendaraan='$jenis'");
        
        $res_k = $this->conn->query("SELECT id_kendaraan FROM kendaraan WHERE plat_nomor='$plat'");
        $id_k  = $res_k->fetch_assoc()['id_kendaraan'];

        // 2. Tentukan tarif (Mobil=1, Motor=2 - sesuaikan dengan tb_tarif)
        $id_tarif = ($jenis == 'mobil') ? 1 : 2;

        // 3. Simpan Transaksi
        $sql = "INSERT INTO transaksi (id_kendaraan, waktu_masuk, id_tarif, id_area, status) 
                VALUES ('$id_k', NOW(), '$id_tarif', '$id_area', 'masuk')";
        
        if ($this->conn->query($sql)) {
            return $this->conn->insert_id; // Mengembalikan ID Transaksi
        }
        return false;
    }

    public function ambilDetail($id_transaksi) {
        $sql = "SELECT t.*, k.plat_nomor, k.jenis_kendaraan, a.nama_area 
                FROM transaksi t
                JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
                JOIN area_parkir a ON t.id_area = a.id_area
                WHERE id_parkir = '$id_transaksi'";
        return $this->conn->query($sql)->fetch_assoc();
    }
}