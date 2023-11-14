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
            <li class="nav-item">
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
            <li class="nav-item active">
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
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-800" style="color: #000;"><i style="color: #000;" class="fas fa-fw fa-list"></i> <strong>Daftar Pesananmu</strong></h1>
                    <?php
                    include '../koneksi.php';
                    $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                    $peg    = mysqli_fetch_array($tampilPeg);
                    ?>

                    <?php
                    $data = mysqli_query($koneksi, "select *  from daftar_pemesan where nama='$peg[namalengkap]'");
                    $d = mysqli_num_rows($data);
                    ?>
                    <?php if ($d == 0) {
                        echo '<p class="mb-4">Wahhh, kamu belum mesen catering. Silahkan <a href="reservasi.php">klik disini</a> untuk memesan catering.</p>';
                    } else {
                        echo '<p class="mb-4">Berikut ini adalah data yang berisi daftar pesananmu.</p>';
                    }
                    ?>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: #000;">Daftar Pesananmu</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <th>Nama pemesan</th>
                                        <th>Email pemesan</th>
                                        <th>Paket Catering yang dipesan</th>
                                        <th>Pada tanggal</th>
                                        <th>Nomer HP</th>
                                        <th>Status</th>
                                        <th>Status Bayar</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama pemesan</th>
                                            <th>Email pemesan</th>
                                            <th>Paket Catering yang dipesan</th>
                                            <th>Pada tanggal</th>
                                            <th>Nomer HP</th>
                                            <th>Status</th>
                                            <th>Status Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                                        $peg    = mysqli_fetch_array($tampilPeg);
                                        ?>

                                        <?php
                                        include '../koneksi.php';
                                        $data = mysqli_query($koneksi, "select * from daftar_pemesan where nama='$peg[namalengkap]'");
                                        $bulan = array(
                                            1 => 'Januari',
                                            2 => 'Februari',
                                            3 => 'Maret',
                                            4 => 'April',
                                            5 => 'Mei',
                                            6 => 'Juni',
                                            7 => 'Juli',
                                            8 => 'Agustus',
                                            9 => 'September',
                                            10 => 'Oktober',
                                            11 => 'November',
                                            12 => 'Desember'
                                        );
                                        while ($d = mysqli_fetch_array($data)) {
                                            $tanggalmantap = strftime('%d %B %Y', strtotime($d['tanggal']));
                                        ?>

                                            <tr>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['email']; ?></td>
                                                <td><?php echo $d['meja']; ?></td>
                                                <td><?php
                                                    // Konversi format tanggal YYYY-MM-DD menjadi format bahasa Indonesia
                                                    $timestamp = strtotime($d['tanggal']);
                                                    $day = date('j', $timestamp);
                                                    $month = date('n', $timestamp);
                                                    $year = date('Y', $timestamp);

                                                    echo $day . ' ' . $bulan[$month] . ' ' . $year;
                                                    ?></td>
                                                <td>Nomor Hp: <?php echo $d['dari']; ?>
                                                Nomor Kedua: <?php echo $d['hingga']; ?></td>
                                                <td align="center">
                                                    <a class="
                                            <?php

                                            if ($d['statuz'] == "Belum Diverifikasi")
                                                echo "btn btn-secondary btn-icon-split";

                                            elseif ($d['statuz'] == "Sudah Diverifikasi")
                                                echo "btn btn-success btn-icon-split";

                                            elseif ($d['statuz'] == "Sudah Kadaluarsa")
                                                echo "btn btn-light btn-icon-split";

                                            elseif ($d['statuz'] == "Ditolak")
                                                echo "btn btn-danger btn-icon-split";
                                            ?>">
                                                        <span class="icon text-white-50">
                                                            <i class="
                                            <?php

                                            if ($d['statuz'] == "Belum Diverifikasi")
                                                echo "fas fa-info-circle";

                                            elseif ($d['statuz'] == "Sudah Diverifikasi")
                                                echo "fas fa-check";

                                            elseif ($d['statuz'] == "Sudah Kadaluarsa")
                                                echo "fas fa-flag";

                                            elseif ($d['statuz'] == "Ditolak")
                                                echo "fas fa-exclamation-triangle";
                                            ?>">
                                                            </i>
                                                        </span>
                                                        <span class="text"><?php echo $d['statuz']; ?></span>
                                                    </a>
                                                </td>
                                                <td><?php echo $d['bayar']; ?></td>
                                                <td align="center">
                                                    <?php
                                                    if ($d['bayar'] == "Belum Bayar") {
                                                        include 'butonbayar.php';
                                                        echo '<br><br>'; // Tambahkan line break di sini
                                                        include 'butonhapus.php';
                                                    } elseif ($d['bayar'] == "Sudah Bayar") {
                                                        include 'butonmeratapi.php';
                                                    } elseif ($d['statuz'] == "Sudah Diverifikasi" || $d['statuz'] == "Sudah Kadaluarsa" || $d['statuz'] == "Ditolak") {
                                                        include 'butonmeratapi.php';
                                                    }
                                                    ?>


                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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