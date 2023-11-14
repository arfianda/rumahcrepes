<?php
include '../koneksi.php';

// Ambil bulan dan tahun yang dipilih dari permintaan POST
$selectedMonth = $_POST['month'];
$selectedYear = $_POST['year'];

// Buat query berdasarkan filter bulan dan tahun
$query = "SELECT rating, COUNT(*) AS count FROM daftar_komentar WHERE MONTH(tanggal) = $selectedMonth AND YEAR(tanggal) = $selectedYear GROUP BY rating";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Error dalam query: " . mysqli_error($koneksi));
}

// Membuat array untuk menyimpan data rating dan jumlahnya
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'rating' => $row['rating'],
        'count' => $row['count']
    );
}

// Tutup koneksi ke database
mysqli_close($koneksi);

// Mengembalikan data dalam format JSON
echo json_encode($data);
?>
