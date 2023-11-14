<?php
session_start(); // Start session nya
session_destroy(); // Hapus semua session

header("location: ../beranda"); // Redirect ke halaman index.php
?>
