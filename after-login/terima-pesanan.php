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

$nama_admin = 'RumahCrepes';
$email_admin = 'rumahcrepes85@gmail.com';
$email_admin2 = 'arfiandafirsta@gmail.com';
$imel=$_GET["email"];

$dada = mysqli_query($koneksi, "SELECT * FROM daftar_pemesan WHERE email='$imel' AND statuz='Belum Diverifikasi'");
$dadang = mysqli_fetch_array($dada);
$nama_pemesan = $dadang['nama'];
$nomor_meja = $dadang['meja'];
$email_pemesan = $dadang['email'];
$tanggal = $dadang['tanggal'];
$dari = $dadang['dari'];
$hingga = $dadang['hingga'];
$tanggalmantap = strftime('%d %B %Y', strtotime($dadang['tanggal']));

if (($mysqli)) 
    $imel=$_GET["email"];
    $nama=$_GET["nama"];
    $subjek ='Status Pemesanan Catering Rumah Crepes';
    $pesan = 'Pesanan Catering <strong>Rumah Crepes</strong> oleh <strong>anda</strong> dengan nama <strong>'.$nama_pemesan.'</strong> dan menggunakan email <strong>' . $email_pemesan . '</strong> telah <strong>diverifikasi</strong>.
    <br>
    <br>
    <strong><u>Detail Pesanan Anda</u> :</strong>
    <br>
    Paket Catering : <strong>'.$nomor_meja.'</strong>
    <br>
    Untuk tanggal : <strong>'.$tanggalmantap. '</strong>
    <br>
    Kontak : Nomor Hp: <strong>'.$dari. '</strong> Nomor Kedua: <strong>'.$hingga.'</strong>
    <br>
    <br>
    Kami akan segera datang ke acara anda 🚘🛣..

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
    $mail->addAddress($imel);
    $mail->isHTML(true);
    $mail->Subject = $subjek;
    $mail->Body = $pesan;

    $send = $mail->send();


    if ($send) {
        $data = mysqli_query($koneksi, "SELECT id FROM daftar_pemesan WHERE email='$imel' AND statuz='Belum Diverifikasi'");
        if ($data) {
            $d = mysqli_fetch_array($data);
            $aidi = $d['id'];
            $sql = "UPDATE daftar_pemesan SET statuz='Sudah Diverifikasi', bayar='Sudah Gila' WHERE id='$aidi'";
            mysqli_query($koneksi, $sql);
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=daftar-pemesan.php?berhasil">';
        }else{
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=daftar-pemesan.php?gagal">';
        }
    }
?>
