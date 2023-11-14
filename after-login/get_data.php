<?php
// Sambungkan ke database Anda di sini

// Query untuk mengambil data komentar
$query = "SELECT rating, COUNT(*) AS count FROM daftar_komentar GROUP BY rating ORDER BY rating ASC";
$result = mysqli_query($koneksi, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['rating']] = $row['count'];
}

// Keluarkan data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
