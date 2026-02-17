<?php
require_once "../models/m_test.php";

$m = new ModelParkir();
$log = $m->koneksi->query(
    "SELECT * FROM log_aktivitas 
     ORDER BY id_log DESC"
);
?>

<h2>Log Activity</h2>

<table border="1">
<tr>
<th>Waktu</th>
<th>Aktivitas</th>
</tr>

<?php while($l=$log->fetch_assoc()){ ?>
<tr>
<td><?= $l['waktu'] ?></td>
<td><?= $l['aktivitas'] ?></td>
</tr>
<?php } ?>

</table>
