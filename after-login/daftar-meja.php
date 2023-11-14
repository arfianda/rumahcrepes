<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../images/logongaldos.png">
    <?php include "../koneksi.php"; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rumah Crepes - Daftar Pemesan</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/admintul.css" rel="stylesheet">
    <link href="css/daptarmeja.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

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
                <a class="nav-link active" href="promo-menarique.php">
                    <i class="fas fa-fw fa-percent"></i>
                    <span>Promo </span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link active" href="daftar-meja.php">
                    <i class="fas fa-fw fa-object-group"></i>
                    <span>Daftar Catering</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="daftar-pemesan-terverifikasi-pengunjung.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Catering dipesan</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesan" aria-expanded="true" aria-controls="collapsePesan">
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKomen" aria-expanded="true" aria-controls="collapseKomen">
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
                    <h1 class="h3 mb-2 text-800" style="color: #000;"><i style="color: #000;" class="fas fa-fw fa-object-group"></i> <strong>Daftar Catering Kami</strong></h1>
                    <p class="mb-4">Berikut ini adalah daftar Catering yang dapat anda pesan di rumah crepes.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: #000">Daftar Catering di Rumah Crepes</h6>
                        </div>
                        <div class="card-body">
                            <!-- Portfolio Grid-->
                            <section class="page-section bg-light" id="portfolio">
                                <div class="container">
                                    <br>
                                    <div class="text-center">
                                        <h2 class="section-heading text" style="color: #000"><strong>Daftar Catering Kami <i class="fas fa-laugh-wink"></i></strong></h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 mb-4">
                                            <!-- Portfolio item 1-->
                                            <div class="portfolio-item">
                                                <a class="portfolio-link" data-toggle="modal" href="#" data-target="#Meja-In-Door">
                                                    <div class="portfolio-hover">
                                                        <div class="portfolio-hover-content"></div>
                                                    </div>
                                                    <img class="img-fluid" src="../assets/img/catering/cateringa.png" alt="..." />
                                                </a>
                                                <div class="portfolio-caption">
                                                    <div class="portfolio-caption-heading" style="color: #000;">Paket Crepes Klasik</div>
                                                    <div class="portfolio-caption-subheading text-muted"> Paket ini menghadirkan makanan penutup crepes klasik yang selalu disukai oleh banyak orang .</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 mb-4">
                                            <!-- Portfolio item 2-->
                                            <div class="portfolio-item">
                                                <a class="portfolio-link" data-toggle="modal" href="#Meja-Out-Door">
                                                    <div class="portfolio-hover">
                                                        <div class="portfolio-hover-content"></div>
                                                    </div>
                                                    <img class="img-fluid" src="../assets/img/catering/cateringb.png" alt="..." />
                                                </a>
                                                <div class="portfolio-caption">
                                                    <div class="portfolio-caption-heading" style="color: #000;">Paket Crepes Dessert Eksklusif</div>
                                                    <div class="portfolio-caption-subheading text-muted">Paket ini adalah pilihan yang sangat mewah untuk makanan penutup.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 mb-4">
                                            <!-- Portfolio item 3-->
                                            <div class="portfolio-item">
                                                <a class="portfolio-link" data-toggle="modal" href="#Meja-Private">
                                                    <div class="portfolio-hover">
                                                        <div class="portfolio-hover-content"></div>
                                                    </div>
                                                    <img class="img-fluid" src="../assets/img/catering/cateringc.jpg" alt="..." />
                                                </a>
                                                <div class="portfolio-caption">
                                                    <div class="portfolio-caption-heading" style="color: #000;">Paket Crepes Buah Tropis</div>
                                                    <div class="portfolio-caption-subheading text-muted">Paket ini menghadirkan rasa tropis yang segar ke dalam crepes.</div>
                                                </div>
                                            </div>
                                        </div>
                            </section>
                        </div>
                    </div>

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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="Meja-In-Door" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text" style="color: #000;">Crepes Klasik</h2>
                                    <p class="item-intro text-muted"><strong>450pcs Crepes</strong></p>
                                    <img class="img-fluid d-block mx-auto" src="../assets/img/catering/cateringa.png" alt="..." />
                                    <p style="text-align: justify;"> Crepes dengan lemon curd yang asam dan saus blueberry manis memberikan sentuhan citarasa yang seimbang. Crepes dengan lapisan cream cheese dan stroberi segar akan memuaskan selera pencinta stroberi. Crepes klasik dengan taburan gula dan kayu manis, disajikan dengan irisan pisang, menawarkan kelezatan sederhana yang selalu menjadi favorit. Minuman teh herbal atau kopi premium akan menyempurnakan pengalaman makanan penutup yang klasik ini.</p>

                                    <h3><strong>Tarif Booking</strong>: Rp1.000.000,00-</h3>

                                    <?php
                                    include '../koneksi.php';
                                    $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                                    $peg    = mysqli_fetch_array($tampilPeg);
                                    ?>

                                    <?php
                                    $data = mysqli_query($koneksi, "select *  from daftar_pemesan where nama='$peg[namalengkap]'");
                                    $d = mysqli_num_rows($data);
                                    ?>
                                    <?php if ($d == 0)
                                        include 'butonpesanow.php';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="Meja-Out-Door" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text" style="color: #000;">Crepes Dessert Eksklusif</h2>
                                    <p class="item-intro text-muted"><strong>700pcs Crepes</strong></p>
                                    <img class="img-fluid d-block mx-auto" src="../assets/img/catering/cateringb.png" alt="..." />
                                    <p style="text-align: justify;">　　Crepes lembut dengan cokelat Belgium yang meleleh akan menggoda selera Anda, dipadukan dengan potongan buah-buahan segar seperti stroberi, pisang, dan blueberry untuk memberikan sentuhan segar. Crepes lainnya memiliki isian keju ricotta yang lembut dan lemon curd yang menyegarkan. Puncak pengalaman ini adalah crepes dengan lapisan karamel klasik yang disajikan dengan bola es krim vanilla premium. Minuman wine muscat atau minuman mocktail buah segar akan melengkapi pengalaman makanan penutup yang tak terlupakan.</p>

                                    <h3><strong>Tarif Booking</strong>: Rp1.500.000,00-</h3>

                                    <?php
                                    include '../koneksi.php';
                                    $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                                    $peg    = mysqli_fetch_array($tampilPeg);
                                    ?>

                                    <?php
                                    $data = mysqli_query($koneksi, "select *  from daftar_pemesan where nama='$peg[namalengkap]'");
                                    $d = mysqli_num_rows($data);
                                    ?>
                                    <?php if ($d == 0)
                                        include 'butonpesanow.php';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="Meja-Private" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text" style="color: #000;">Crepes Buah Tropis</h2>
                                    <p class="item-intro text-muted"><strong>500pcs Crepes</strong></p>
                                    <img class="img-fluid d-block mx-auto" src="../assets/img/catering/cateringc.jpg" alt="..." />
                                    <p style="text-align: justify;">　　Crepes dengan potongan mangga segar dan kelapa parut, disajikan dengan saus mangga, akan membawa Anda ke pulau-pulau tropis. Crepes pisang cokelat yang lezat juga akan memikat selera Anda, serta crepes dengan isian campuran jeruk nipis segar dan saus berry yang manis. Minuman jeruk segar atau mocktail buah tropis akan menambah kesegaran pada pengalaman ini.</p>

                                    <h3><strong>Tarif Booking</strong>: Rp1.200.000,00-</h3>

                                    <?php
                                    include '../koneksi.php';
                                    $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                                    $peg    = mysqli_fetch_array($tampilPeg);
                                    ?>

                                    <?php
                                    $data = mysqli_query($koneksi, "select *  from daftar_pemesan where nama='$peg[namalengkap]'");
                                    $d = mysqli_num_rows($data);
                                    ?>
                                    <?php if ($d == 0)
                                        include 'butonpesanow.php';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="../images/meja/mejaprivat.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Lines
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Branding
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Southwest
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Website Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Window
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Photography
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

</body>

</html>