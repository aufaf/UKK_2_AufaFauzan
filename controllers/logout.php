<?php
session_start(); // Wajib dimulai agar bisa menghapus session yang ada

// Hapus semua data session
$_SESSION = [];

// Hancurkan session
session_unset();
session_destroy();

// Arahkan kembali ke halaman login
header("Location: ../views/v_login.php");
exit;
?>