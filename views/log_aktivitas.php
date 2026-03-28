<?php
include_once "../controllers/c_log.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Log Aktivitas</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../asset/css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <div class="logo">ParkirApp</div>

  <a href="dashboard_admin.php">Dashboard</a>
  <a href="tampil_data_user.php">Kelola User</a>
  <a href="tampil_data_tarif.php">Tarif Parkir</a>
  <a href="tampil_data_area.php">Area Parkir</a>
  <a href="tampil_data_kendaraan.php">Kendaraan</a>
  <a href="log_aktivitas.php" class="active">Log Aktivitas</a>
  <a href="../controllers/c_logout.php">Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<div class="navbar">
<h1>Log Aktivitas Sistem</h1>
</div>

<div class="content">

<div class="card">

<h3>Riwayat Aktivitas Pengguna</h3>

<table>

<thead>
<tr>
<th>No</th>
<th>User</th>
<th>Aktivitas</th>
<th>Waktu</th>
</tr>
</thead>

<tbody>

<?php 
$no=1;

while($log=$dataLog->fetch_assoc()){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $log['username'] ?></td>

<td><?= $log['aktivitas'] ?></td>

<td><?= $log['waktu_aktivitas'] ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

  <script src="../asset/js/main.js"></script>


</body>
</html>