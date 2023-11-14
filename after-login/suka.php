<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
	header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>


                                <?php
                                    include '../koneksi.php';
                                    $tampilPeg    =mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                                    $peg    =mysqli_fetch_array($tampilPeg);
                                ?>

                                <?php
                                    $data = mysqli_query($koneksi,"select *  from daftar_pemesan where nama='$peg[namalengkap]' and statuz='Sudah Diverifikasi'");
                                    $d = mysqli_num_rows($data);
                                ?>
                                <?php if ($d==0)
                                    echo "ahaha";                                
                                ?>