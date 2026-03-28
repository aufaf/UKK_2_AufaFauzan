<?php
include_once "../models/m_transaksi.php";

$model = new m_parkir();

$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : null;

$data = $model->laporan($tanggal);

?>