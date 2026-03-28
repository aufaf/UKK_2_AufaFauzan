<?php
include_once "m_koneksi.php";

class m_parkir
{

    private $db;

    public function __construct()
    {
        $conn = new m_koneksi();
        $this->db = $conn->koneksi;
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

        $query = "
SELECT 
t.id_parkir,
k.plat_nomor,
k.jenis_kendaraan,
a.nama_area,
t.waktu_masuk,
t.status,

TIMESTAMPDIFF(MINUTE,t.waktu_masuk,NOW()) AS durasi_menit

FROM transaksi t
JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
JOIN area_parkir a ON t.id_area = a.id_area

WHERE t.status='masuk'

ORDER BY t.waktu_masuk DESC
";

        return $this->db->query($query);

    }

    public function parkirKeluar($idParkir)
{

$dataTransaksi = $this->db->query("
SELECT 
t.id_parkir,
t.waktu_masuk,
t.id_area,
tarif.tarif_per_jam
FROM transaksi t
JOIN tarif ON t.id_tarif = tarif.id_tarif
WHERE t.id_parkir='$idParkir'
")->fetch_assoc();

$waktuMasuk = strtotime($dataTransaksi['waktu_masuk']);
$waktuSekarang = time();

$selisih = $waktuSekarang - $waktuMasuk;

// 🔥 anti minus
$selisih = max(0, $selisih);

// hitung jam (minimal 1 jam kalau sudah masuk)
$durasiJam = ceil($selisih / 3600);
$durasiJam = max(1, $durasiJam);

$totalBayar = $durasiJam * $dataTransaksi['tarif_per_jam'];

$this->db->query("
UPDATE transaksi
SET 
waktu_keluar = NOW(),
biaya_total = '$totalBayar',
status = 'keluar'
WHERE id_parkir='$idParkir'
");

$this->db->query("
UPDATE area_parkir
SET terisi = terisi - 1
WHERE id_area='".$dataTransaksi['id_area']."'
");

return $totalBayar;

}

    public function kendaraanParkir()
{

$query = "
SELECT 
t.id_parkir,
t.waktu_masuk,
k.plat_nomor,
k.jenis_kendaraan,
a.nama_area,
tarif.tarif_per_jam,

TIMESTAMPDIFF(MINUTE,t.waktu_masuk,NOW()) AS durasi

FROM transaksi t
JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan
JOIN area_parkir a ON t.id_area = a.id_area
JOIN tarif ON t.id_tarif = tarif.id_tarif

WHERE t.status='masuk'

ORDER BY t.waktu_masuk DESC
";

return $this->db->query($query);

}

public function laporan($tanggal = null)
{

    if($tanggal){

        $query = "
        SELECT 
        t.waktu_masuk,
        t.waktu_keluar,
        k.plat_nomor,
        t.biaya_total,

        GREATEST(TIMESTAMPDIFF(MINUTE,t.waktu_masuk,t.waktu_keluar),0) AS durasi

        FROM transaksi t
        JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan

        WHERE t.waktu_keluar >= '$tanggal 00:00:00'
AND t.waktu_keluar <= '$tanggal 23:59:59'
        AND t.status='keluar'

        ORDER BY t.waktu_keluar DESC
        ";

    }else{

        $query = "
        SELECT 
        t.waktu_masuk,
        t.waktu_keluar,
        k.plat_nomor,
        t.biaya_total,

        GREATEST(TIMESTAMPDIFF(MINUTE,t.waktu_masuk,t.waktu_keluar),0) AS durasi

        FROM transaksi t
        JOIN kendaraan k ON t.id_kendaraan = k.id_kendaraan

        WHERE t.status='keluar'

        ORDER BY t.waktu_keluar DESC
        ";
    }

    return $this->db->query($query);
}

public function cariKendaraanParkir($keyword)
{
    $keyword = mysqli_real_escape_string($this->db, $keyword);

    $query = "
        SELECT p.*, k.plat_nomor, k.jenis_kendaraan, a.nama_area, t.tarif_per_jam,
        TIMESTAMPDIFF(MINUTE, p.waktu_masuk, NOW()) as durasi
        FROM transaksi p
        JOIN kendaraan k ON p.id_kendaraan = k.id_kendaraan
        JOIN area_parkir a ON p.id_area = a.id_area
        JOIN tarif t ON p.id_tarif = t.id_tarif
        WHERE p.status = 'masuk'
        AND k.plat_nomor LIKE '%$keyword%'
    ";

    return $this->db->query($query);
}
}
?>