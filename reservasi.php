<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$nama = $_POST["nama"];
$email = $_POST["email"];
$nomer = $_POST["nomer"];
$tanggal = $_POST["tanggal"];
$alamat = $_POST["alamat"];
$kabko = $_POST["kabko"];
$pos = $_POST["pos"];

    $sql="insert into catering (nama,email,nomer,tanggal,alamat,kabko,pos) values('$nama','$email','$nomer','$tanggal','$alamat','$kabko','$pos')";
    $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
if ($hasil) {
  echo "Berhasil simpan data anggota";
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bervasi.php">';
  exit;
} else {
  echo "Gagal simpan data anggota";
  exit;
}  


?>