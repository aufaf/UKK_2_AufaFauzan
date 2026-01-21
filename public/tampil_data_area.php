 <?php

include "../controllers/koneksi.php";

$db= $koneksi -> query ("SELECT * FROM area_parkir" );
$data = $db -> fetch_all(MYSQLI_ASSOC);

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Parkir</title>
 </head>
 <body>
    
 
 <a href="tambah_data_user.php" class="button add-button">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>username</th>
            <th>password</th>
            <th>role</th>
            <th>status</th>
        </tr>

        <?php foreach ($data as $area_parkir): ?>

        <tr>

        <td><?= $area_parkir ['id_area']?> </td> 
        <td><?= $area_parkir ['nama_area']?> </td> 
        <td><?= $area_parkir ['kapasitas']?> </td> 
        <td><?= $area_parkir ['terisi']?> </td> 
        <td>
            <a href="edit.php?id=<?=$user['id_user']?>" class="button edit-button">Edit</a>
            <a href="../controllers/delete_user.php?id=<?=$area_parkir['id_area']?>" class="button delete-button" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </td>
        
        </tr>

        <?php endforeach ?>

    </table>

    </body>
 </html>