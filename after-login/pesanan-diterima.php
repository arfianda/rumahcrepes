<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if (!isset($_SESSION['user_type'])) { // Jika tidak ada session username berarti dia belum login
    header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda-admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="beranda-admin.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDaftar" aria-expanded="true" aria-controls="collapseDaftar">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Daftar Pemesan</span>
                </a>
                <div id="collapseDaftar" class="collapse" aria-labelledby="headingDaftar" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="daftar-pemesan.php"><i class="fas fa-fw fa-exclamation-triangle"></i> Belum Diverifikasi</a>
                        <a class="collapse-item" href="daftar-pemesan-terverifikasi.php"><i class="fas fa-fw fa-check"></i> Sudah Diverifikasi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesanan" aria-expanded="true" aria-controls="collapsePesanan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pesanan</span>
                </a>
                <div id="collapsePesanan" class="collapse" aria-labelledby="headingDaftar" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="pesanan-diterima.php"><i class="fas fa-fw fa-flag"></i> Pesanan Diterima</a>
                        <a class="collapse-item" href="pesanan-ditolak.php"><i class="fas fa-fw fa-exclamation-triangle"></i> Pesanan Ditolak</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePromo" aria-expanded="true" aria-controls="collapsePromo">
                    <i class="fas fa-fw fa-percent"></i>
                    <span>Promo</span>
                </a>
                <div id="collapsePromo" class="collapse" aria-labelledby="headingDaftar" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="unggah-promo.php"><i class="fas fa-fw fa-plus"></i> Unggah Promo</a>
                        <a class="collapse-item" href="hapus-promo.php"><i class="fas fa-fw fa-trash"></i> Hapus Promo</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="komen-admin">
                    <i class="fas fa-fw fa-star"></i>
                    <span>Komentar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                <?php include "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><i style="color: #000;" class="fas fa-fw fa-flag"></i> Pesanan Selesai
                    </h1>
                    <p class="mb-4">Berikut ini adalah data yang berisi daftar pesanan yang sudah diterima atau sudah kadaluarsa.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Pemesan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemesan</th>
                                            <th>Email Pemesan</th>
                                            <th>No. Meja yang dipesan</th>
                                            <th>Pada Tanggal</th>
                                            <th>Nomer Hp</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Pemesan</th>
                                            <th>Email Pemesan</th>
                                            <th>No. Meja yang dipesan</th>
                                            <th>Pada Tanggal</th>
                                            <th>Nomer Hp</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include '../koneksi.php';
                                        $data = mysqli_query($koneksi, "select * from daftar_pemesan where statuz='Sudah Kadaluarsa'");
                                        while ($d = mysqli_fetch_array($data)) {

                                            $tanggalmantap = strftime('%d %B %Y', strtotime($d['tanggal']));
                                        ?>
                                            <tr>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['email']; ?></td>
                                                <td><?php echo $d['meja']; ?></td>
                                                <td><?php echo $tanggalmantap; ?></td>
                                                <td>Nomor Hp: <?php echo $d['dari']; ?> Nomor Kedua: <?php echo $d['hingga']; ?></td>
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
                    <a class="btn btn-primary" href="../beranda">Logout</a>
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
    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'copy',
                ]
            });
        });
        $(document).ready(function() {
            $('#mauexport2').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'copy',
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>