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
                        $belum = mysqli_query($koneksi,"select *  from daftar_komentar where nama_pemesan='$peg[namalengkap]'");
                        $dsudah = mysqli_num_rows($belum);
                    ?>
<?php if ($dsudah > 0)
                        header("location: beranda-pengunjung?jangan-nakal-ya");                  
                    ?>
<!DOCTYPE html>
<html lang="en">
<style>
    .rating {
        display: inline-block;
        unicode-bidi: bidi-override;
        direction: rtl;
    }

    .rating>input {
        display: none;
    }

    .rating>label:before {
    content: "\2605";
    font-size: 45px; /* Ubah ukuran bintang sesuai keinginan Anda */
    margin: 5px;
    cursor: pointer;
}


    .rating>label {
        color: #ccc;
        float: right;
    }

    .rating>input:checked~label:before,
.rating:not(:checked)>label:hover~label:before {
    content: "\2605";
    color: #ffcc00;
    text-shadow: 0 0 5px rgba(255, 204, 0, 0.5); /* Efek bayangan 3D */
    transition: text-shadow 0.3s;
}


    .rating>input:checked~label:hover~label:before {
        content: "\2605";
        color: #ffcc00;
    }


    .butong {
        --color1: #f7b901;
        --color2: #000;
        perspective: 1000px;
        padding: 1em 1em;
        background: linear-gradient(var(--color1), var(--color2));
        border: none;
        outline: none;
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 4px;
        color: #fff;
        text-shadow: 0 10px 10px #000;
        cursor: pointer;
        transform: rotateX(70deg) rotateZ(30deg);
        transform-style: preserve-3d;
        transition: transform 0.5s;
    }

    .butong::before {
        content: "";
        width: 100%;
        height: 15px;
        background-color: var(--color2);
        position: absolute;
        bottom: 0;
        right: 0;
        transform: rotateX(90deg);
        transform-origin: bottom;
    }

    .butong::after {
        content: "";
        width: 15px;
        height: 100%;
        background-color: var(--color1);
        position: absolute;
        top: 0;
        right: 0;
        transform: rotateY(-90deg);
        transform-origin: right;
    }

    .butong:hover {
        transform: rotateX(30deg) rotateZ(0);
    }

    .butondon {
        font-size: 17px;
        background: transparent;
        border: none;
        padding: 1em 1.5em;
        color: #ffedd3;
        text-transform: uppercase;
        position: relative;
        transition: .2s ease;
    }

    .butondon::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 2px;
        width: 0;
        background-color: #ffc506;
        transition: .2s ease;
    }

    .butondon:hover {
        color: #1e1e2b;
        transition-delay: .2s;
    }

    .butondon:hover::before {
        width: 100%;
    }

    .butondon::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 0;
        width: 100%;
        background-color: #ffc506;
        transition: .2s ease;
        z-index: -1;
    }

    .butondon:hover::after {
        height: 100%;
        transition-delay: 0.4s;
        color: aliceblue;
    }
</style>

<head>
    <link rel="icon" href="../images/logongaldos.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rumah Crepes - Beranda Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../buatmenu/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../buatmenu/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../buatmenu/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../buatmenu/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../buatmenu/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../buatmenu/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/admintul.css" rel="stylesheet">

</head>
<?php include "../koneksi.php"; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda-pengunjung.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pengunjung</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="beranda-pengunjung.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                List Menu
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link active" href="promo-menarique">
                    <i class="fas fa-fw fa-percent"></i>
                    <span>Promo </span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link active" href="daftar-meja">
                    <i class="fas fa-fw fa-object-group"></i>
                    <span>Daftar Meja</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="daftar-pemesan-terverifikasi-pengunjung.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Meja dipesan</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesan"
                    aria-expanded="true" aria-controls="collapsePesan">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Reservasi</span>
                </a>
                <div id="collapsePesan" class="collapse" aria-labelledby="headingPesan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php include "butonreservasi.php"; ?>
                        <a class="collapse-item" href="pesananmu.php"><i class="fas fa-fw fa-list"></i> Cek Pesanan Anda</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ulasan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKomen"
                    aria-expanded="true" aria-controls="collapseKomen">
                    <i class="fas fa-fw fa-star"></i>
                    <span>Komentar</span>
                </a>
                <div id="collapseKomen" class="collapse" aria-labelledby="headingKomen" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php include "butonkomen.php"; ?>
                        <a class="collapse-item" href="komen-pengunjung.php"><i class="fas fa-fw fa-history"></i> Semua Ulasan</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar-pengunjung.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-800" style="color: #000;"><i style="color: #000;"
                            class="fas fa-fw fa-star"></i> <strong>Berikan Rating</strong></h1>
                    <p class="mb-4">Berikut ini adalah formulir yang dapat di-isi untuk memberikan rating.
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Formulir Komentar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Mulai reservasi -->
                                <div id="contact-us" class="page-section">
                                    <div class="container">
                                        <?php
        $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
        $peg    = mysqli_fetch_array($tampilPeg);
        ?>
                                        <div id="note"></div>
                                        <div id="fields">
                                            <form id="ajax-contact-form" class="form-horizontal clearfix" action="proses-komentar"
                                                method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputName2"><strong>Nama <i
                                                                        class="bi bi-person-fill"></i></strong></label>
                                                            <input type="text" readonly name="nama-pemesan"
                                                                class="form-control" required="required"
                                                                placeholder="Masukkan nama anda..."
                                                                value="<?php echo $peg['namalengkap']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputEmail"><strong>Email <i
                                                                        class="fas fa-fw fa-mail-bulk"></i></strong></label>
                                                            <input type="text" readonly name="email-pemesan"
                                                                class="form-control" required="required"
                                                                placeholder="Masukkan email anda..."
                                                                value="<?php echo $peg['email']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputName2"><strong>Alasan <i
                                                                        class="bi bi-chat-fill"></i></strong></label>
                                                            <textarea type="text" name="alasan"
                                                                class="form-control" required="required"
                                                                placeholder="Masukkan alasan anda..."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-3 col-md-6 mb-4">
                                                        <div class="form-group">
                                                            <label for="inputRating"><strong>Rating <i
                                                                        class="fas fa-fw fa-star"></i></strong></label>
                                                            <br>
                                                            <div class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5">
                                                                <label for="star5"></label>
                                                                <input type="radio" id="star4" name="rating" value="4">
                                                                <label for="star4"></label>
                                                                <input type="radio" id="star3" name="rating" value="3">
                                                                <label for="star3"></label>
                                                                <input type="radio" id="star2" name="rating" value="2">
                                                                <label for="star2"></label>
                                                                <input type="radio" id="star1" name="rating" value="1">
                                                                <label for="star1"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="hidden" name="statuz" class="form-control"
                                                                required="" placeholder="Status"
                                                                value="Belum Diperiksa">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="hidden" name="poto" class="form-control"
                                                                required="" placeholder="Photo"
                                                                value="<?php echo $peg['poto']; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tombol "Kirim Pesan" -->
                                                <div class="col-xl-3 col-md-6 mb-4">
                                                    <button type="submit"
                                                        class="butong"><strong>　Kirim　</strong></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Reservasi -->

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <strong>AKA</strong>.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda benar ingin Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah untuk kembali ke beranda utama.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a class="btn btn-primary" href="../index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>