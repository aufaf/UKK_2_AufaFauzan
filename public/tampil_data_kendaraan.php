 <?php

include "../controllers/koneksi.php";

$db= $koneksi -> query ("SELECT * FROM kendaraan" );
$data = $db -> fetch_all(MYSQLI_ASSOC);

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kendaraan</title>
 </head>
 <body>
    
 
 <a href="tambah_data_user.php" class="button add-button">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Plat Nomor</th>
            <th>Jenis</th>
            <th>Warna</th>
            <th>Pemilik</th>
            <th>id_user</th>
        </tr>

        <?php foreach ($data as $kendaraan): ?>

        <tr>

        <td><?= $kendaraan ['id_kendaraan']?> </td> 
        <td><?= $kendaraan ['plat_nomor']?> </td>
        <td><?= $kendaraan ['jenis_kendaraan']?> </td> 
        <td><?= $kendaraan ['warna']?> </td> 
        <td><?= $kendaraan ['pemilik']?> </td>
        <td><?= $kendaraan ['id_user']?> </td>
        <td>
            <a href="edit.php?id=<?=$user['id_kendaraan']?>" class="button edit-button">Edit</a>
            <a href="../controllers/delete_user.php?id=<?=$kendaraan['id_kendaraan']?>" class="button delete-button" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </td>
        
        </tr>

        <?php endforeach ?>

    </table>

    </body>
 </html>