<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$nama=$_POST["nama"];
$nomer=$_POST["nomer"];
$email=$_POST["email"];
$pesan=$_POST["pesan"];

//Query input menginput data kedalam tabel anggota
  $sql="insert into kontak (nama,nomer,email,pesan) values
		('$nama','$nomer','$email','$pesan')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "Berhasil simpan data anggota";
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=berhasil.php">';
	exit;
  }
else {
	echo "Gagal simpan data anggota";
	exit;
}  

?>