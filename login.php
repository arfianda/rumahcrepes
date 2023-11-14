<?php
session_start(); // Start session nya
session_destroy(); // Hapus semua session

header("location: after-login/google.php"); // Redirect ke halaman index.php
