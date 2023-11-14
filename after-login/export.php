<?php
// Include file koneksi.php
include "../koneksi.php";

// Nama file CSV yang akan dihasilkan
$filename = "data.csv";

// Header untuk menghasilkan file CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Menggunakan file output untuk menulis data CSV
$output = fopen("php://output", "w");

// Menuliskan header kolom
fputcsv($output, array('Kolom1', 'Kolom2', 'Kolom3', 'Kolom4'));

// Mengambil data dari tabel
$data = mysqli_query($koneksi, "SELECT * FROM daftar_komentar");

// Menuliskan data ke dalam file CSV
while ($row = mysqli_fetch_assoc($data)) {
    fputcsv($output, $row);
}

// Tutup file output
fclose($output);
?>
