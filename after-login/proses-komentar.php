<?php
// Pastikan Anda memiliki koneksi ke database seperti yang Anda lakukan sebelumnya.
include "../koneksi.php"; // Ganti dengan nama file koneksi Anda.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $namaPemesan = $_POST["nama-pemesan"];
    $emailPemesan = $_POST["email-pemesan"];
    $alasan = $_POST["alasan"];
    $rating = $_POST["rating"];
    $statuz = $_POST["statuz"];
    $poto = $_POST["poto"];

    // Menyimpan data ke tabel "daftar_komentar"
    $sql = "INSERT INTO daftar_komentar (nama_pemesan, email_pemesan, alasan, rating, statuz, poto)
            VALUES ('$namaPemesan', '$emailPemesan', '$alasan', '$rating', '$statuz', '$poto')";

    if ($koneksi->query($sql) === TRUE) {
        // Jika komentar berhasil dikirim, Anda dapat melakukan tindakan selanjutnya,
        // seperti menampilkan pesan sukses atau mengarahkan pengguna ke halaman tertentu.
        echo "Komentar berhasil dikirim.";
        header("location:komen-pengunjung?berhasil");
    } else {
        header("location:komen?gagal");
    }

    // Menutup koneksi database
    $koneksi->close();
}
?>
