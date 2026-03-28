<?php
include_once "../controllers/c_rekap.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="../asset/css/cetak_laporan.css">

</head>

<body>

    <h2>LAPORAN PARKIR</h2>

    <p>
        Tanggal:
        <?= isset($_GET['tanggal']) && $_GET['tanggal'] != ''
            ? $_GET['tanggal']
            : 'Semua Tanggal'; ?>
    </p>

    <table>

        <tr>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Plat</th>
            <th>Durasi</th>
            <th>Biaya</th>
        </tr>

        <?php
        $total = 0;

        while ($row = $data->fetch_assoc()) {

            $menit = max(0, $row['durasi']);

            $jam = floor($menit / 60);
            $sisaMenit = $menit % 60;

            if ($jam > 0) {
                $durasi = $jam . " Jam " . $sisaMenit . " Menit";
            } else {
                $durasi = $sisaMenit . " Menit";
            }

            $biaya = max(0, $row['biaya_total']);
            $total += $biaya;
            ?>

            <tr>
                <td><?= $row['waktu_masuk'] ?></td>
                <td><?= $row['waktu_keluar'] ?></td>
                <td><?= $row['plat_nomor'] ?></td>
                <td><?= $durasi ?></td>
                <td>Rp <?= number_format($biaya) ?></td>
            </tr>

        <?php } ?>

        <tr>
            <td colspan="4"><b>Total</b></td>
            <td><b>Rp <?= number_format($total) ?></b></td>
        </tr>

    </table>

    <script>
        window.print();
    </script>

</body>

</html>