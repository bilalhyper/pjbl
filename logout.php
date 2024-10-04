<?php
// Mulai session
session_start();

// Hapus semua session
session_destroy();

// Arahkan ke halaman login
header("Location: index.php");
exit();
?>
