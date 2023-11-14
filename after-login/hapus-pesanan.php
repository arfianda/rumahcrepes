<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
// menghapus data dari database
mysqli_query($koneksi,"UPDATE daftar_pemesan SET statuz='Sudah Kadaluarsa' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=daftar-pemesan-terverifikasi.php">';
 
?>