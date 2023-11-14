<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../images/logongaldos.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rumah Crepes - Pengunjung</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/admintul.css" rel="stylesheet">

</head>
<?php include "../koneksi.php";
error_reporting(0);
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

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
            <li class="nav-item active">
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
                <a class="nav-link" href="daftar-meja.php">
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
                <!-- End Of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-800" style="color: #000;"><i style="color: #000;" class="fas fa-fw fa-home"></i> <strong>Beranda</strong></h1>
                    <p class="mb-4">Berikut ini adalah menu pada beranda pengunjung.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-success border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Pesanan Diterima</div>
                                            <?php
                                            include '../koneksi.php';

                                            if (!$koneksi) {
                                                die("Koneksi gagal: " . mysqli_connect_error());
                                            }

                                            $query = "SELECT COUNT(*) as total FROM daftar_pemesan WHERE statuz = 'Sudah Kadaluarsa'";
                                            $result = mysqli_query($koneksi, $query);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $totalKadaluarsa = $row['total'];

                                                echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $totalKadaluarsa . '</div>';
                                            } else {
                                                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                                            }

                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-danger border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pesanan Ditolak</div>
                                            <?php
                                            $data = mysqli_query($koneksi, "select *  from daftar_pemesan where statuz='Ditolak'");
                                            $d = mysqli_num_rows($data);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $d; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="promo-menarique.php">
                                <div class="card border-bottom-info border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Promo Crepes
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <?php
                                                        $data = mysqli_query($koneksi, "select *  from daftar_promo");
                                                        $d = mysqli_num_rows($data);
                                                        ?>
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            <?php echo $d; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-percent fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="daftar-meja.php">
                                <div class="card border-bottom-warning border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Daftar Jenis Catering Kami</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-object-group fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>

                    <!-- Table Row -->
                    <div class="row">

                        <?php include '../koneksi.php';
                        ?>

                        <!-- DataTales Example -->
                        <div class="col-md-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color: #000;">Catering kami yang pernah dipesan <i class="fas fa-fw fa-object-group"></i></h6>
                                </div>
                                <div class="card-body">
                                    <form method="GET" action="">
                                        <!-- Form untuk memilih bulan dan tahun -->
                                        <div class="form-row">
                                            <!-- Opsi Tahun -->
                                            <div class="form-group col-md-6">
                                                <label for="tahun">Tahun</label>
                                                <select class="form-control" id="tahun" name="tahun">
                                                    <option hidden="" value="">Pilih Tahun</option>
                                                    <?php
                                                    // Ambil data unik untuk tahun dari kolom 'tanggal'
                                                    $query = "SELECT DISTINCT YEAR(tanggal) AS tahun FROM daftar_pemesan";
                                                    $result = mysqli_query($koneksi, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $selected = ($_GET['tahun'] == $row['tahun']) ? 'selected' : '';
                                                        echo "<option value='{$row['tahun']}' $selected>{$row['tahun']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- Opsi Bulan -->
                                            <div class="form-group col-md-6">
                                                <label for="bulan">Bulan</label>
                                                <select class="form-control" id="bulan" name="bulan">
                                                    <option hidden="" value="">Pilih Bulan</option>
                                                    <?php
                                                    // Daftar nama bulan dalam bahasa Indonesia
                                                    $nama_bulan = array(
                                                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                                        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                                        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                                    );

                                                    // Ambil data unik untuk bulan dari kolom 'tanggal'
                                                    $query = "SELECT DISTINCT MONTH(tanggal) AS bulan FROM daftar_pemesan";
                                                    $result = mysqli_query($koneksi, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $bulan_angka = $row['bulan'];
                                                        $nama_bulan_str = $nama_bulan[$bulan_angka];
                                                        $selected = ($_GET['bulan'] == $bulan_angka) ? 'selected' : '';
                                                        echo "<option value='{$bulan_angka}' $selected>{$nama_bulan_str}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Pesan Kesalahan -->
                                        <div id="error-message" style="color: red; display: none;">
                                            Harap pilih tahun atau bulan sebelum menekan tombol Filter.
                                            <br>
                                            <br>
                                        </div>
                                        <button type="button" onclick="filterData()" class="btn btn-primary">Filter</button>
                                        <a href="beranda-admin.php" class="btn btn-secondary ml-2">Bersihkan Filter</a>
                                    </form>
                                    <br>

                                    <!-- Informasi Status Filter -->
                                    <?php
                                    $filter_status = "";
                                    $whereClause = "";

                                    if (!empty($_GET['tahun']) && !empty($_GET['bulan'])) {
                                        $tahun = $_GET['tahun'];
                                        $bulan = $_GET['bulan'];
                                        $whereClause = "WHERE YEAR(tanggal) = '$tahun' AND MONTH(tanggal) = '$bulan' AND statuz = 'Sudah Kadaluarsa'";
                                        $nama_bulan_str = $nama_bulan[$bulan];
                                        $filter_status = "Berikut adalah data Catering pada bulan <strong>$nama_bulan_str</strong> tahun <strong>$tahun</strong>";
                                    } elseif (!empty($_GET['tahun'])) {
                                        $tahun = $_GET['tahun'];
                                        $whereClause = "WHERE YEAR(tanggal) = '$tahun' AND statuz = 'Sudah Kadaluarsa'";
                                        $filter_status = "Berikut adalah data Catering pada tahun <strong>$tahun</strong>";
                                    } elseif (!empty($_GET['bulan'])) {
                                        $bulan = $_GET['bulan'];
                                        $whereClause = "WHERE MONTH(tanggal) = '$bulan' AND statuz = 'Sudah Kadaluarsa'";
                                        $nama_bulan_str = $nama_bulan[$bulan];
                                        $filter_status = "Berikut adalah data Catering pada bulan <strong>$nama_bulan_str</strong>";
                                    } else {
                                        $whereClause = "WHERE statuz = 'Sudah Kadaluarsa'";
                                        $filter_status = "Menampilkan data Catering secara keseluruhan dari semua bulan dan tahun";
                                    }

                                    $query = "SELECT * FROM daftar_pemesan $whereClause";
                                    $data = mysqli_query($koneksi, $query);

                                    // Informasi jika tidak ada data tersedia
                                    if (mysqli_num_rows($data) == 0) {
                                        $filter_status .= " tidak tersedia.";
                                    }
                                    ?>

                                    <!-- Tampilkan informasi status filter -->
                                    <p><?php echo $filter_status; ?>:</p>

                                    <!-- Tabel dengan data -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nama Paket</th>
                                                    <th>Total Dipesan</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nama Paket</th>
                                                    <th>Total Dipesan</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $mejaindoor = 0;
                                                $mejaoutdoor = 0;
                                                $mejapripat = 0;

                                                while ($row = mysqli_fetch_array($data)) {
                                                    if (strpos($row['meja'], 'Paket Crepes Klasik') !== false) {
                                                        $mejaindoor++;
                                                    } elseif (strpos($row['meja'], 'Paket Crepes Dessert Eksklusif') !== false) {
                                                        $mejaoutdoor++;
                                                    } elseif (strpos($row['meja'], 'Paket Crepes Buah Tropis') !== false) {
                                                        $mejapripat++;
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td>Paket Crepes Klasik</td>
                                                    <td><?php echo $mejaindoor ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Paket Crepes Dessert Eksklusif</td>
                                                    <td><?php echo $mejaoutdoor ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Paket Crepes Buah Tropis</td>
                                                    <td><?php echo $mejapripat ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JavaScript untuk memeriksa validasi -->
                        <script>
                            function filterData() {
                                var tahun = document.getElementById("tahun").value;
                                var bulan = document.getElementById("bulan").value;

                                if (tahun === "" && bulan === "") {
                                    document.getElementById("error-message").style.display = "block";
                                } else {
                                    document.getElementById("error-message").style.display = "none";
                                    // Lanjutkan dengan pengiriman form atau AJAX request sesuai kebutuhan.
                                    document.forms[0].submit();
                                }
                            }
                        </script>

                        <!-- DataTales Example -->
                        <div class="col-md-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color: #000;">Rating Kami <i style="color: #f4b619;" class="fas fa-fw fa-star"></i></h6>
                                </div>
                                <div class="card-body">
                                    <form method="GET" action="">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="year">Tahun</label>
                                                <select class="form-control" name="year" id="year">
                                                    <option value="" hidden="">Pilih Tahun</option>
                                                    <?php
                                                    // Query untuk mendapatkan nilai unik tahun dari kolom "tanggal"
                                                    $yearQuery = "SELECT DISTINCT YEAR(tanggal) AS tahun FROM daftar_komentar";
                                                    $yearResult = mysqli_query($koneksi, $yearQuery);
                                                    while ($yearRow = mysqli_fetch_assoc($yearResult)) {
                                                        $tahun = $yearRow['tahun'];
                                                        $selected = (isset($_GET['year']) && $_GET['year'] == $tahun) ? 'selected' : '';
                                                        echo "<option value='$tahun' $selected>$tahun</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="month">Bulan</label>
                                                <select class="form-control" name="month" id="month">
                                                    <option value="" hidden="">Pilih Bulan</option>
                                                    <?php
                                                    // Daftar nama bulan dalam bahasa Indonesia
                                                    $nama_bulan = array(
                                                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                                        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                                        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                                    );

                                                    // Query untuk mendapatkan nilai unik bulan dari kolom "tanggal"
                                                    $monthQuery = "SELECT DISTINCT MONTH(tanggal) AS bulan FROM daftar_komentar";
                                                    $monthResult = mysqli_query($koneksi, $monthQuery);
                                                    while ($monthRow = mysqli_fetch_assoc($monthResult)) {
                                                        $bulan = $monthRow['bulan'];
                                                        $selected = (isset($_GET['month']) && $_GET['month'] == $bulan) ? 'selected' : '';

                                                        // Menggunakan daftar nama bulan dalam bahasa Indonesia
                                                        $monthName = $nama_bulan[$bulan];

                                                        echo "<option value='$bulan' $selected>$monthName</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Filter</button>
                                        <a href="beranda-pengunjung.php" class="btn btn-secondary ml-2">Bersihkan Filter</a>
                                        <br>
                                        <br>
                                        <?php
                                        // Validasi jika tombol "Filter" diklik tanpa memilih tahun atau bulan
                                        if (isset($_GET['year']) || isset($_GET['month'])) {
                                            if (empty($_GET['year']) && empty($_GET['month'])) {
                                                echo '<p class="text-danger">Silakan pilih tahun atau bulan terlebih dahulu sebelum menekan tombol "Filter" atau "Bersihkan Filter".</p>';
                                            } else {
                                                echo '<p>Menampilkan data rating';

                                                if (!empty($_GET['year']) && $_GET['year'] !== "semua tahun") {
                                                    echo ' di tahun <strong>' . $_GET['year'] . '</strong>';
                                                }

                                                if (!empty($_GET['month']) && $_GET['month'] !== "semua bulan") {
                                                    $selectedMonthName = $nama_bulan[$_GET['month']];
                                                    echo ' di bulan <strong>' . $selectedMonthName . '</strong>';
                                                }

                                                echo ':</p>';
                                            }
                                        } else {
                                            echo '<p>Menampilkan data rating secara keseluruhan dari semua bulan dan tahun:</p>';
                                        }
                                        ?>
                                    </form>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <?php
                                                // Initialize $totalVotes outside the filter condition
                                                $totalVotes = 0;

                                                // Construct the SQL query with the filter
                                                $query = "SELECT COUNT(*) AS count FROM daftar_komentar WHERE 1";

                                                if (!empty($_GET['year']) && $_GET['year'] !== "semua tahun") {
                                                    $selectedYear = $_GET['year'];
                                                    $query .= " AND YEAR(tanggal) = $selectedYear";
                                                }

                                                if (!empty($_GET['month']) && $_GET['month'] !== "semua bulan") {
                                                    $selectedMonth = $_GET['month'];
                                                    $query .= " AND MONTH(tanggal) = $selectedMonth";
                                                }

                                                $result = mysqli_query($koneksi, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $totalVotes = $row['count'];
                                                ?>
                                                <tr>
                                                    <th>Rating</th>
                                                    <th>Dari <?php echo $totalVotes ?> Suara</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <?php
                                                // Initialize $totalVotes outside the filter condition
                                                $totalVotes = 0;

                                                // Construct the SQL query with the filter
                                                $query = "SELECT COUNT(*) AS count FROM daftar_komentar WHERE 1";

                                                if (!empty($_GET['year']) && $_GET['year'] !== "semua tahun") {
                                                    $selectedYear = $_GET['year'];
                                                    $query .= " AND YEAR(tanggal) = $selectedYear";
                                                }

                                                if (!empty($_GET['month']) && $_GET['month'] !== "semua bulan") {
                                                    $selectedMonth = $_GET['month'];
                                                    $query .= " AND MONTH(tanggal) = $selectedMonth";
                                                }

                                                $result = mysqli_query($koneksi, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $totalVotes = $row['count'];
                                                ?>
                                                <tr>
                                                    <th>Rating</th>
                                                    <th>Dari <?php echo $totalVotes ?> Suara</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $ratings = array_reverse(range(1, 5)); // Membuat array rating dari 1 hingga 5 dan mengurutkannya terbalik

                                                // Menampilkan rating dan progress bar sesuai dengan jumlah suara
                                                foreach ($ratings as $rating) {
                                                    // Query to get count based on rating and filter
                                                    $query = "SELECT COUNT(*) AS count FROM daftar_komentar WHERE rating='$rating'";

                                                    if (!empty($_GET['year']) && $_GET['year'] !== "semua tahun") {
                                                        $selectedYear = $_GET['year'];
                                                        $query .= " AND YEAR(tanggal) = $selectedYear";
                                                    }

                                                    if (!empty($_GET['month']) && $_GET['month'] !== "semua bulan") {
                                                        $selectedMonth = $_GET['month'];
                                                        $query .= " AND MONTH(tanggal) = $selectedMonth";
                                                    }

                                                    $result = mysqli_query($koneksi, $query);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $count = $row['count'];

                                                    echo '<tr>';
                                                    echo '<td><i style="color: #f4b619;" class="fas fa-fw fa-star"></i> ' . $rating . '</td>';
                                                    echo '<td>';
                                                    echo '<div class="progress progress-sm mr-2">';
                                                    echo '<div class="progress-bar bg-info" role="progressbar" style="width: 0%;" aria-valuenow="' . ($totalVotes > 0 ? ($count / $totalVotes) * 100 : 0) . '%" data-width="' . ($totalVotes > 0 ? ($count / $totalVotes) * 100 : 0) . '"></div>';
                                                    echo '</div>';
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CSS untuk animasi progress bar -->
                        <style>
                            .progress-bar {
                                transition: width 1s ease-in-out;
                                /* Mengatur durasi dan efek animasi */
                            }
                        </style>

                        <!-- jQuery untuk mengatur animasi saat halaman dimuat -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Fungsi ini akan dijalankan saat halaman dimuat
                                animateProgressBar();
                            });

                            // Fungsi untuk menganimasikan progress bar
                            function animateProgressBar() {
                                $('.progress-bar').each(function() {
                                    var width = $(this).attr('data-width'); // Mendapatkan lebar yang ditentukan
                                    $(this).css('width', width + '%'); // Mengatur lebar awal (biasanya 0%)
                                    $(this).animate({
                                        width: $(this).attr('aria-valuenow') + '%'
                                    }, 1000); // Animasi hingga lebar yang benar dalam 1 detik
                                });
                            }

                            // Validasi form sebelum submit
                            function validateForm() {
                                var year = document.getElementById("year").value;
                                var month = document.getElementById("month").value;

                                if (year === "" || month === "") {
                                    alert("Silakan pilih tahun dan bulan terlebih dahulu sebelum menekan tombol 'Filter'.");
                                    return false; // Menghentikan pengiriman form jika validasi tidak lolos
                                }
                                return true; // Lanjutkan pengiriman form jika validasi lolos
                            }
                        </script>

                        <!-- Area Chart -->
                        <div class="col-md-6 mb-4">
                            <div class="card shadow md-6">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color: #000;">Grafik Rating of All Time <i style="color: #f4b619;" class="fas fa-fw fa-star"></i></h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChartoot"></canvas>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>


                        <!-- Pie Chart -->
                        <div class="col-md-6 mb-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color: #000;">Grafik Pie Catering of All Time <i class="fas fa-fw fa-object-group"></i></h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChartut"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #4e73df ;"></i> Paket Crepes Klasik
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #DD6D01 ;"></i> Paket Crepes Dessert Eksklusif
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #0c0b09 ;"></i> Paket Crepes Buah Tropis
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Makan Nih -->

                    <!-- Kenyang Nih -->
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChartoot");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["5", "4", "3", "2", "1"],
                datasets: [{
                    label: "Earnings",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "#f4b619",
                    pointRadius: 3,
                    pointBackgroundColor: "#f4b619",
                    pointBorderColor: "#f4b619",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#f4b619",
                    pointHoverBorderColor: "#f4b619",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                        <?php
                        $jumlah_pertanian = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM daftar_komentar WHERE rating='5'");
                        $row = mysqli_fetch_assoc($jumlah_pertanian);
                        echo $row['count'];
                        ?>,
                        <?php
                        $jumlah_pertanian = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM daftar_komentar WHERE rating='4'");
                        $row = mysqli_fetch_assoc($jumlah_pertanian);
                        echo $row['count'];
                        ?>,
                        <?php
                        $jumlah_pertanian = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM daftar_komentar WHERE rating='3'");
                        $row = mysqli_fetch_assoc($jumlah_pertanian);
                        echo $row['count'];
                        ?>,
                        <?php
                        $jumlah_pertanian = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM daftar_komentar WHERE rating='2'");
                        $row = mysqli_fetch_assoc($jumlah_pertanian);
                        echo $row['count'];
                        ?>,
                        <?php
                        $jumlah_pertanian = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM daftar_komentar WHERE rating='1'");
                        $row = mysqli_fetch_assoc($jumlah_pertanian);
                        echo $row['count'];
                        ?>
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value) + ' Suara';
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return 'Jumlah Suara' + ': ' + number_format(tooltipItem.yLabel) + ' Suara';
                        }
                    }
                }
            }
        });
    </script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChartut");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Paket Crepes Klasik", "Paket Crepes Dessert Eksklusif", "Paket Crepes Buah Tropis"],
                datasets: [{
                    data: [<?php
                            $jumlah_pertanian = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM daftar_pemesan WHERE meja LIKE '%Paket Crepes Klasik%' AND statuz='Sudah Kadaluarsa'");
                            $row = mysqli_fetch_assoc($jumlah_pertanian);
                            echo $row['count'];
                            ?>, <?php
                                $jumlah_pertanian = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM daftar_pemesan WHERE meja LIKE '%Paket Crepes Dessert Eksklusif%' AND statuz='Sudah Kadaluarsa'");
                                $row = mysqli_fetch_assoc($jumlah_pertanian);
                                echo $row['count'];
                                ?>, <?php
                                    $jumlah_pertanian = mysqli_query($koneksi, "SELECT COUNT(*) AS count FROM daftar_pemesan WHERE meja LIKE '%Paket Crepes Buah Tropis%' AND statuz='Sudah Kadaluarsa'");
                                    $row = mysqli_fetch_assoc($jumlah_pertanian);
                                    echo $row['count'];
                                    ?>],
                    backgroundColor: ['#4e73df', '#DD6D01', '#0c0b09'],
                    hoverBackgroundColor: ['#4e73df', '#DD6D01', '#0c0b09'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>

</body>

</html>