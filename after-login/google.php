<?php
// Include file gpconfig
include_once 'gpconfig.php';

if(isset($_GET['code'])){
	$gclient->authenticate($_GET['code']);
	$_SESSION['token'] = $gclient->getAccessToken();
	header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gclient->setAccessToken($_SESSION['token']);
}

if ($gclient->getAccessToken()) {
	include '../koneksi.php';

	// Get user profile data from google
	$gpuserprofile = $google_oauthv2->userinfo->get();

	$nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name']; // Ambil nama dari Akun Google
	$email = $gpuserprofile['email']; // Ambil email Akun Google nya
	$poto = $gpuserprofile['picture']; // Ambil poto Akun Google nya

	// Buat query untuk mengecek apakah data user dengan email tersebut sudah ada atau belum
	// Jika ada, ambil id, username, dan nama dari user tersebut
	$sql = mysqli_query($koneksi, "SELECT id, username, namalengkap, poto FROM akun WHERE email='".$email."'");
	$user = mysqli_fetch_array($sql); // Ambil datanya dari hasil query tadi

	if(empty($user)){ // Jika User dengan email tersebut belum ada
		// Ambil username dari kata sebelum simbol @ pada email
		$ex = explode('@', $email); // Pisahkan berdasarkan "@"
		$username = $ex[0]; // Ambil kata pertama

		// Lakukan insert data user baru tanpa password
		mysqli_query($koneksi, "INSERT INTO akun(username, namalengkap, poto, email) VALUES('".$username."', '".$nama."', '".$poto."', '".$email."')");

		$id = mysqli_insert_id($connect); // Ambil id user yang baru saja di insert
	}else{
		$id = $user['id']; // Ambil id pada tabel user
		$username = $user['username']; // Ambil username pada tabel user
		$nama = $user['namalengkap']; // Ambil username pada tabel user
		$login = mysqli_query($koneksi,"select * from akun where username='$username' and email='$email'");
		$data = mysqli_fetch_assoc($login);
	}


	if($data['user_type']== ""){
		// buat session login dan username
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;
		$_SESSION['namalengkap'] = $nama;
		$_SESSION['email'] = $email;
		$_SESSION['poto'] = $poto;
		// alihkan ke halaman dashboard admin
		header("location:beranda-pengunjung.php");

	}else if($data['user_type']== "admin"){
			// buat session login dan username
			$_SESSION['id'] = $id;
			$_SESSION['username'] = $username;
			$_SESSION['namalengkap'] = $nama;
			$_SESSION['email'] = $email;
			$_SESSION['poto'] = $poto;
			$_SESSION['user_type'] = $poto;
			// alihkan ke halaman dashboard admin
			header("location:beranda-admin.php");}

} else {
	$authUrl = $gclient->createAuthUrl();
	header("location: ".$authUrl);
}
?>
