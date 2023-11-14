<?php
session_start(); // Mulai sesi

// Sertakan file konfigurasi database
require_once("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cari pengguna dalam tabel login berdasarkan username
    $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        // Pengguna ditemukan, periksa password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login sukses, simpan informasi pengguna ke sesi
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            // Redirect ke halaman selamat datang atau halaman lain yang sesuai
            header('Location: after-login');
            exit;
        } else {
            echo "Login gagal. Password salah.";
        }
    } else {
        echo "Login gagal. Pengguna tidak ditemukan.";
    }
}

$koneksi->close();
