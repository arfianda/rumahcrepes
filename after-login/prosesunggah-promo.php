<?php
// Include file koneksi ke database
include "../koneksi.php";

// Menerima nilai dari kiriman form pendaftaran
$judul = $_POST["judul-promo"];
$isi = $_POST["isi-promo"];
$dari = $_POST["dari-tanggal"];
$hingga = $_POST["hingga-tanggal"];

// Mengambil informasi file gambar yang diunggah
$namaFile = $_FILES["foto-promo"]["name"];
$ukuranFile = $_FILES["foto-promo"]["size"];
$namaSementara = $_FILES["foto-promo"]["tmp_name"];

// Ekstensi yang diperbolehkan
$ekstensiGambar = array("jpg", "jpeg", "png");

// Mengecek ekstensi file
$ekstensi = pathinfo($namaFile, PATHINFO_EXTENSION);

if (in_array($ekstensi, $ekstensiGambar)) {
    // Mengecek ukuran file
    if ($ukuranFile < 9044070) { // Ukuran maksimum 9MB (sesuai dengan kode yang Anda berikan sebelumnya)
        // Mengganti nama file untuk menghindari konflik
        $namaFileBaru = uniqid() . '_' . $namaFile;

        // Menyimpan file ke folder fotopromo
        move_uploaded_file($namaSementara, "fotopromo/" . $namaFileBaru);

        // Memeriksa rasio aspek gambar (16:9)
        list($width, $height) = getimagesize("fotopromo/" . $namaFileBaru);
        $rasioAspek = $width / $height;

        if (abs($rasioAspek - (1 / 1)) < 0.01) {
            // Rasio aspek sesuai dengan 16:9
            // Query input untuk memasukkan data ke dalam tabel daftar_promo
            $sql = "INSERT INTO daftar_promo (judul_promo, isi_promo, dari_tanggal, hingga_tanggal, foto_promo)
                    VALUES ('$judul', '$isi', '$dari', '$hingga', '$namaFileBaru')";

            // Mengeksekusi query
            $hasil = mysqli_query($koneksi, $sql);

            if ($hasil) {
                echo "Berhasil simpan data anggota";
                header("location:unggah-promo.php?berhasil");
                exit;
            } else {
                echo "Gagal simpan data anggota: " . mysqli_error($koneksi);
                exit;
            }
        } else {
            // Rasio aspek tidak sesuai dengan 16:9
            echo "Rasio aspek gambar harus 1:1.";
        }
    } else {
        echo "Ukuran file terlalu besar. Maksimum 9MB.";
    }
} else {
    echo "Ekstensi file yang diunggah tidak diperbolehkan. Hanya ekstensi JPG, JPEG, dan PNG yang diperbolehkan.";
}
?>