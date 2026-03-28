<?php
include_once "m_koneksi.php";

class m_log
{

    private $db;

    public function __construct()
    {
        $conn = new m_koneksi();
        $this->db = $conn->koneksi;
    }

    // fungsi simpan log
    public function simpanLog($id_user, $aktivitas)
    {
        $stmt = $this->db->prepare("INSERT INTO log_aktivitas (id_user, aktivitas, waktu_aktivitas) VALUES (?, ?, NOW())");
        $stmt->bind_param("is", $id_user, $aktivitas);
        return $stmt->execute();
    }

    // ambil data log + username
    public function getLog()
    {
        return $this->db->query("
    SELECT log_aktivitas.*, user.username 
    FROM log_aktivitas
    JOIN user ON user.id_user = log_aktivitas.id_user
    ORDER BY waktu_aktivitas DESC
");
    }
}
?>