 <?php

include "../models/m_koneksi.php";

$conn = new m_koneksi();        // buat object
$koneksi = $conn->koneksi;     // ambil koneksi

$db= $koneksi -> query ("SELECT * FROM tarif" );
$data = $db -> fetch_all(MYSQLI_ASSOC);

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarif Parkir</title>
 </head>
 <body>
    
 
 <a href="tambah_data_tarif.php" class="button add-button">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Jenis Kendaraan</th>
            <th>Tarif Per Jam</th>
        </tr>

        <?php foreach ($data as $tarif): ?>

        <tr>

        <td><?= $tarif ['id_tarif']?> </td> 
        <td><?= $tarif ['jenis_kendaraan']?> </td> 
        <td><?= $tarif ['tarif_per_jam']?> </td> 
        <td>
            <a href="edit_tarif.php?id=<?=$tarif['id_tarif']?>" class="button edit-button">Edit</a>
            <a href="../controllers/delete_tarif.php?id=<?=$tarif['id_tarif']?>" class="button delete-button" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </td>
        
        </tr>

        <?php endforeach ?>

    </table>

    </body>
 </html>