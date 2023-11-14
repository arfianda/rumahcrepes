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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../koneksi.php');
include('../phpmailer/src/Exception.php');
include('../phpmailer/src/PHPMailer.php');
include('../phpmailer/src/SMTP.php');

$kapan = date("l, F j, Y, g:i a");
$nama_pemesan = $_POST['nama-pemesan'];
$nomor_meja = $_POST['nomor-meja'];
$email_pemesan = $_POST['email-pemesan'];
$nama_admin = 'RumahCrepes';
$email_admin = 'rumahcrepes85@gmail.com';
$email_admin2 = 'arfiandafirsta@gmail.com';
$mesej = $_POST['pesan'];
$tanggal = $_POST['tanggal'];
$dari = $_POST['dari'];
$hingga = $_POST['hingga'];
$statuz = $_POST['statuz'];
$poto = $_POST['poto'];

if (($mysqli))

    $email_pemesan = $_POST['email-pemesan'];
$nama_pemesan = $_POST['nama-pemesan'];
$subjek = 'Reservasi Catering Rumah Crepes';
$pesan = '<strong>' . $nama_pemesan . '</strong> dengan menggunakan email <stong>' . $email_pemesan . '</stong> telah memesan Catering <strong>Rumah Crepes</strong>.
    <br>
    <br>
    <strong><u>Detail Pemesanan</u></strong>
    <br>
    Paket Catering : <strong>' . $nomor_meja . '</strong>
    <br>
    Untuk tanggal : <strong>' . $tanggal . '</strong>
    <br>
    Kontak : Nomor Hp <strong>' . $dari . '</strong> Nomor Kedua: <strong>' . $hingga . '</strong>
    <br>
    <br>
    Silahkan cek melalui menu <strong><a href="localhost/rumahcrepes/login.php">Daftar Pemesan</a></strong> pada user admin.

    ';

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = 'rumahcrepes85@gmail.com';
$mail->Password = 'wsbsnqgjypeojwru';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->SMTPDebug = 2;

$mail->setFrom($email_admin);
$mail->addAddress($email_admin2);
$mail->isHTML(true);
$mail->Subject = $subjek;
$mail->Body = $pesan;

$send = $mail->send();


if ($send) {
    $sql = "insert into daftar_pemesan (nama,email,meja,tanggal,dari,hingga,pesan,statuz,poto) values
            ('$nama_pemesan','$email_pemesan','$nomor_meja','$tanggal','$dari','$hingga','$mesej','$statuz','$poto')";

    $hasil = mysqli_query($koneksi, $sql);
}
?>