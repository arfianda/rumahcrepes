<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
	header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>

<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$nama = $_GET['nama'];
// menghapus data dari database
mysqli_query($koneksi,"select * from wangsaf where nama='$nama'");
?>
<link href="css/ucus.css" rel="stylesheet">
<!-- Profil Modal-->

<div class="modal fade" id="ngobrolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php
        // koneksi database
        include '../koneksi.php';

        // menangkap data id yang di kirim dari url
        $nama = $_GET['nama'];
        $data = mysqli_query($koneksi,"select * from wangsaf where nama='$nama'");
        while($d = mysqli_fetch_array($data)){
    ?>
    <br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="profile-menun">
                <div class="profile-header">
                    <div class="profile-image">
                        <img src="<?=$_SESSION['poto']?>" alt="Profile Image">
                    </div>
                    <div class="profile-details">
                        <h5><strong><?php echo $_SESSION['namalengkap']; ?></strong></h5>
                        <span><?php echo $_SESSION['email']; ?></span>
                    </div>
                </div>
                <div class="profile-content">
                    <center>
                        <h5>Kirim pesan ke <?php echo $d['nama']; ?></h5>
                    </center>
                    Pesan dari <?php echo $d['nama']; ?> :
                    <br>
                    <?php echo $d['pesan']; ?>
                    <form action="#" method="post" class="user" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputMessage2"><strong>Pesan</strong></label>
                            <textarea class="form-control" name="pesan" rows="5"
                                placeholder="Masukkan apa saja yang ingin anda ketikkan...">
                            </textarea>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success btn-user btn-block" value="Ganti">
                    </form>
                </div>
            </div>
            <?php
        }
        ?>