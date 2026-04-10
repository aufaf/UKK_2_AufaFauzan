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
   public function getLog($keyword = null)
{
    $query = "SELECT log_aktivitas.*, user.username 
              FROM log_aktivitas
              JOIN user ON user.id_user = log_aktivitas.id_user";

    if ($keyword != null) {
        // Mencari berdasarkan username atau deskripsi aktivitas
        $query .= " WHERE user.username LIKE '%$keyword%' OR log_aktivitas.aktivitas LIKE '%$keyword%'";
    }

    $query .= " ORDER BY waktu_aktivitas DESC";
    
    return $this->db->query($query);
}

    // Di dalam class m_log
public function hapusLog($id_log) {
    $stmt = $this->db->prepare("DELETE FROM log_aktivitas WHERE id_log = ?");
    $stmt->bind_param("i", $id_log);
    return $stmt->execute();
}
}
?>