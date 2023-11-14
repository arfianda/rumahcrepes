<?php
// Include file koneksi ke database
include "../koneksi.php";

// Mengambil nilai ID dari form
$id = isset($_POST["id"]) ? $_POST["id"] : null;

// Mengambil informasi file gambar yang diunggah
$bukti = isset($_FILES["bukti"]["name"]) ? $_FILES["bukti"]["name"] : null;
$ukuranFile = isset($_FILES["bukti"]["size"]) ? $_FILES["bukti"]["size"] : 0;
$namaSementara = isset($_FILES["bukti"]["tmp_name"]) ? $_FILES["bukti"]["tmp_name"] : null;

if ($id !== null && $bukti !== null) {
    // Ekstensi yang diperbolehkan
    $ekstensiGambar = array("jpg", "jpeg", "png");

    // Mengecek ekstensi file
    $ekstensi = pathinfo($bukti, PATHINFO_EXTENSION);

    if (in_array($ekstensi, $ekstensiGambar)) {
        // Mengecek ukuran file
        if ($ukuranFile < 9044070) { // Ukuran maksimum 9MB (sesuai dengan kode yang Anda berikan sebelumnya)
            // Mengganti nama file untuk menghindari konflik
            $namaFileBaru = uniqid() . '_' . $bukti;

            // Menyimpan file ke folder fotobukti
            move_uploaded_file($namaSementara, "fotobukti/" . $namaFileBaru);

            // Query input untuk memasukkan data ke dalam tabel daftar_pemesan
            $sql = "UPDATE daftar_pemesan SET bukti='$namaFileBaru', bayar='Sudah Bayar' WHERE id='$id'";

            // Mengeksekusi query
            $hasil = mysqli_query($koneksi, $sql);

            if ($hasil) {
                echo "Berhasil simpan data anggota";
                // Redirect ke halaman yang sesuai
                header("location:pesananmu.php?berhasil");
                exit;
            } else {
                echo "Gagal simpan data anggota: " . mysqli_error($koneksi);
                exit;
            }
        } else {
            echo "Ukuran file terlalu besar. Maksimum 9MB.";
        }
    } else {
        echo "Ekstensi file yang diunggah tidak diperbolehkan. Hanya ekstensi JPG, JPEG, dan PNG yang diperbolehkan.";
    }
} else {
    echo "ID atau bukti tidak tersedia.";
}
?>
