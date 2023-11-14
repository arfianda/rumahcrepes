<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['user_type'])){ // Jika tidak ada session username berarti dia belum login
	header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>

<!DOCTYPE html>
<html lang="en">

<style>
    #file-input {
        display: none;
    }

    #preview-container {
        width: 300px;
        height: 300px;
        background: linear-gradient(to bottom, blue, orange, black);
        border: 1px solid #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        border-radius: 10px;
        /* Mengatur pinggiran dengan radius 10px */
    }

    .butong {
        --color1: black;
        --color2: orange;
        --color3: blue;
        perspective: 1000px;
        padding: 1em 1em;
        background: linear-gradient(var(--color1), var(--color2), var(--color3));
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
        background-color: var(--color3);
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
        background-color: blue;
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
        background-color: blue;
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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda-admin">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDaftar"
                    aria-expanded="true" aria-controls="collapseDaftar">
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesanan"
                    aria-expanded="true" aria-controls="collapsePesanan">
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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePromo"
                    aria-expanded="true" aria-controls="collapsePromo">
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
                <a class="nav-link" href="komen-admin.php">
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
                    <h1 class="h3 mb-2 text-gray-800"><i style="color: #000;" class="fas fa-fw fa-percent"></i> Unggah Promo
                    </h1>
                    <?php
                        $tampilPeg    =mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_SESSION[username]'");
                        $peg    =mysqli_fetch_array($tampilPeg);
                    ?>
                    <p class="mb-4">Berikut ini adalah formulir yang dapat diisi untuk mengunggah promo.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Formulir Reservasi</h6>
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
                                        <form id="ajax-contact-form" class="form-horizontal clearfix" action="prosesunggah-promo.php" method="post" enctype="multipart/form-data">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputName2"><strong>Judul Promo <i
                                                                        class="bi bi-person-fill"></i></strong></label>
                                                            <input autocomplete="off" type="text" name="judul-promo" class="form-control"
                                                                required="required"
                                                                placeholder="Masukkan judul promo...">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputEmail"><strong>Isi Promo <i
                                                                        class="fas fa-fw fa-mail-bulk"></i></strong></label>
                                                            <textarea type="text" name="isi-promo" class="form-control"
                                                                required="required"
                                                                placeholder="Masukkan isi promo..."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputWebsite"><strong>Dari tanggal <i
                                                                        class="fas fa-fw fa-calendar"></i></strong></label>
                                                            <input type="date" name="dari-tanggal" class="form-control"
                                                                required="required" placeholder="Dari tanggal">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputWebsite"><strong>Hingga tanggal <i
                                                                        class="fas fa-fw fa-calendar"></i></strong></label>
                                                            <input type="date" name="hingga-tanggal" class="form-control"
                                                                required="required" placeholder="Hingga tanggal">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input name="foto-promo" type="file" id="file-input"
                                                                accept=".jpg, .jpeg, .png"
                                                                onchange="previewImage(event)">
                                                            <label name="foto-promo" for="file-input"><strong>Klik untuk pilih gambar (1 : 1) <i
                                                                        class="fas fa-fw fa-mail-bulk"></i></strong></label>
                                                            <div id="preview-container">
                                                                <img id="preview-image" src="#" alt="Preview"
                                                                    style="max-width: 100%; max-height: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <!-- Tombol "Kirim Pesan" -->
                                                <div class="col-xl-9 col-md-6 mb-4">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="butondon"><strong>Unggah Promo</strong></button>
                                                    </div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview-image');
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }

            // Menyesuaikan ukuran kontainer berdasarkan ukuran gambar yang dipilih
            preview.onload = function () {
                const width = preview.width;
                const height = preview.height;

                // Mengatur ukuran maksimum kontainer berdasarkan ukuran gambar
                const container = document.getElementById('preview-container');
                container.style.maxWidth = width + 'px';
                container.style.maxHeight = height + 'px';
            }
        }
    </script>

</body>

</html>