<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .countdown {
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
        font-size: 24px;
    }

    .countdown-box {
        display: flex;
        justify-content: space-around;
        width: 300px;
        background-color: #333;
        padding: 10px;
        border-radius: 5px;
        color: #fff;
    }

    .countdown-item {
        text-align: center;
    }

    .countdown-number {
        font-size: 36px;
        font-weight: bold;
    }

    .countdown-label {
        font-size: 16px;
        margin-top: 5px;
    }
</style>

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
    <link href="css/kaka.css" rel="stylesheet">

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
            <li class="nav-item active">
                <a class="nav-link active" href="promo-menarique.php">
                    <i class="fas fa-fw fa-percent"></i>
                    <span>Promo </span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link active" href="daftar-meja.php">
                    <i class="fas fa-fw fa-object-group"></i>
                    <span>Daftar Catering</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="daftar-pemesan-terverifikasi-pengunjung.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Meja dipesan</span></a>
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
                    <h1 class="h3 mb-2 text-800" style="color: #000;"><i style="color: #000;" class="fas fa-fw fa-percent"></i> <strong>Daftar Promo Menarik</strong></h1>
                    <p class="mb-4">Catatan Promo Hanya berlaku untuk Pembelian <strong>Secara langsung (non catering) </strong> di Lapak Rumah Crepes.
                    </p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: #000">Promo Menarik di Rumah Crepes</h6>
                        </div>
                        <div class="card-body">
                            <!-- Portfolio Grid-->
                            <section class="page-section bg-light" id="portfolio">
                                <div class="container">
                                    <br>
                                    <div class="text-center">
                                        <h2 class="section-heading text" style="color: #000"><strong>Promo  <i class="fas fa-laugh-wink"></i></strong></h2>
                                    </div>
                                    <div class="row">
                                        <!-- Portfolio item 1-->
                                        <?php
                                        include '../koneksi.php';
                                        $tanggalHariIni = date('Y-m-d');
                                        $data = mysqli_query($koneksi, "SELECT * FROM daftar_promo WHERE dari_tanggal <= '$tanggalHariIni'");
                                        while ($d = mysqli_fetch_array($data)) {
                                            // Konversi tanggal promosi ke format yang sesuai
                                            $tanggalMulai = date('d M Y', strtotime($d['dari_tanggal']));
                                            $tanggalBerakhir = date('d M Y', strtotime($d['hingga_tanggal']));
                                        ?>
                                            <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="portfolio-item">
                                                    <a class="portfolio-link" data-toggle="modal" href="#promodal<?php echo $d['id']; ?>">
                                                        <div class="portfolio-hover">
                                                            <div class="portfolio-hover-content"></div>
                                                        </div>
                                                        <img class="img-fluid" src="fotopromo/<?php echo $d['foto_promo']; ?>" alt="..." />
                                                    </a>
                                                    <div class="portfolio-caption">
                                                        <div class="portfolio-caption-heading text-uppercase" style="color: #000;">
                                                            <?php echo $d['judul_promo']; ?></div>
                                                        <div class="portfolio-caption-subheading text-muted">
                                                            Berlaku <?php echo $tanggalMulai; ?> - <?php echo $tanggalBerakhir; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

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
                        <a class="btn btn-primary" href="../beranda">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->

        <?php
        include '../koneksi.php';
        $data = mysqli_query($koneksi, "SELECT * FROM daftar_promo WHERE dari_tanggal <= '$tanggalHariIni'");
        while ($d = mysqli_fetch_array($data)) {
            // Konversi tanggal promosi ke format yang sesuai

            setlocale(LC_TIME, 'id_ID.utf8');
            // Set tanggal dalam format yang sesuai
            $tanggalMulai = strftime('%d %B %Y', strtotime($d['dari_tanggal']));
            $tanggalBerakhir = strftime('%d %B %Y', strtotime($d['hingga_tanggal']));

        ?>
            <div class="portfolio-modal modal fade" id="promodal<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="portfolio-caption-heading text-uppercase" style="color: #000;"><strong><?php echo $d['judul_promo']; ?></strong></h2>
                                        <br>
                                        <img class="img-fluid d-block mx-auto" src="fotopromo/<?php echo $d['foto_promo']; ?>" alt="..." />
                                        <h4 style="text-align: justify; color: #000;">　　<?php echo $d['isi_promo']; ?></h4>
                                        <br>
                                        <center>
                                            <h5 style="text-align: justify-center; color: grey;" class="text" style="color: #000;">Promo ini berlaku dari <?php echo $tanggalMulai; ?> hingga <?php echo $tanggalBerakhir; ?>.</h5>
                                        </center>
                                        <br>
                                        <div class="countdown" data-end-time="<?php echo $d['hingga_tanggal']; ?>">
                                            <div class="countdown-box">
                                                <div class="countdown-item">
                                                    <span class="countdown-number hari">00</span>
                                                    <span class="countdown-label">Hari</span>
                                                </div>
                                                <div class="countdown-item">
                                                    <span class="countdown-number jam">00</span>
                                                    <span class="countdown-label">Jam</span>
                                                </div>
                                                <div class="countdown-item">
                                                    <span class="countdown-number menit">00</span>
                                                    <span class="countdown-label">Menit</span>
                                                </div>
                                                <div class="countdown-item">
                                                    <span class="countdown-number detik">00</span>
                                                    <span class="countdown-label">Detik</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

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

        <!-- Countdown Timer Script -->
        <script>
            // Pilih semua elemen countdown
            var countdownElements = document.querySelectorAll(".countdown");

            // Loop melalui semua elemen countdown
            countdownElements.forEach(function(countdownElement) {
                var endTime = new Date(countdownElement.getAttribute("data-end-time")).getTime();

                // Fungsi untuk menambahkan nol di depan angka jika kurang dari 10
                function addZero(number) {
                    return number < 10 ? "0" + number : number;
                }

                // Update countdown setiap 1 detik
                var x = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = endTime - now;

                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Menggunakan fungsi addZero untuk memastikan dua digit
                    days = addZero(days);
                    hours = addZero(hours);
                    minutes = addZero(minutes);
                    seconds = addZero(seconds);

                    // Menampilkan hasil countdown pada elemen HTML yang bersangkutan
                    countdownElement.querySelector(".hari").innerHTML = days;
                    countdownElement.querySelector(".jam").innerHTML = hours;
                    countdownElement.querySelector(".menit").innerHTML = minutes;
                    countdownElement.querySelector(".detik").innerHTML = seconds;

                    // Jika waktu countdown habis
                    if (distance < 0) {
                        clearInterval(x);
                        // Tindakan yang diambil saat countdown selesai
                        countdownElement.innerHTML = "<strong style='color: #000'>Sudah Tidak Berlaku</strong>";
                    }
                }, 1000);
            });
        </script>

</body>

</html>