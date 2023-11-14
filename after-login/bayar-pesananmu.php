<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <style>
        body {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            max-width: 700px;
            background-color: #000;
            padding: 30px;
            border-left: 5px solid #f7b901;
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 20px), calc(100% - 20px) 100%, 0 100%);
        }

        .heading {
            color: white;
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container .form .input {
            color: #87a4b6;
            width: 100%;
            background-color: #001925;
            border: none;
            outline: none;
            padding: 10px;
            font-weight: bold;
            transition: all 0.2s ease-in-out;
            border-left: 1px solid transparent;
        }

        .form-container .form .input:focus {
            border-left: 5px solid #f7b901;
        }

        .form-container .form .textarea {
            width: 100%;
            padding: 10px;
            border: none;
            outline: none;
            background-color: #001925;
            color: #f7b901;
            font-weight: bold;
            resize: none;
            max-height: 150px;
            margin-bottom: 20px;
            border-left: 1px solid transparent;
            transition: all 0.2s ease-in-out;
        }

        .form-container .form .textarea:focus {
            border-left: 5px solid #f7b901;
        }

        .form-container .form .button-container {
            display: flex;
            gap: 10px;
        }

        .form-container .form .button-container .send-button {
            flex-basis: 70%;
            background: #f7b901;
            padding: 10px;
            color: #001925;
            text-align: center;
            font-weight: bold;
            border: 1px solid transparent;
            transition: all 0.2s ease-in-out;
        }

        .form-container .form .button-container .send-button:hover {
            background: transparent;
            border: 1px solid #f7b901;
            color: #f7b901;
        }

        .form-container .form .button-container .reset-button-container {
            filter: drop-shadow(1px 1px 0px #f7b901);
            flex-basis: 30%;
        }

        .form-container .form .button-container .reset-button-container .reset-button {
            position: relative;
            text-align: center;
            padding: 10px;
            color: #f7b901;
            font-weight: bold;
            background: #001925;
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%);
            transition: all 0.2s ease-in-out;
        }

        .form-container .form .button-container .reset-button-container .reset-button:hover {
            background: #f7b901;
            color: #001925;
        }

        .input-container {
            display: flex;
            align-items: center;
        }

        .input-label {
            flex: 1;
            color: #fff;
            margin-right: 10px;
        }

        .input {
            flex: 2;
            width: 100%;
            padding: 5px;
        }

        .input-container img {
            max-width: auto;
            height: 100px;
            margin-right: 10px;
        }

        /* Tambahkan aturan untuk mengatur input dan gambar menjadi flex container */
        .input-container .input,
        .input-container img {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php
    include '../koneksi.php';
    $id = $_GET["id"];

    // Mengubah query untuk hanya mengambil bagian tanggal dari kolom 'kapan'
    $dada = mysqli_query($koneksi, "SELECT * FROM daftar_pemesan WHERE id='$id' AND bayar='Belum Bayar'");
    $dadang = mysqli_fetch_array($dada);

    // Mengambil nilai tanggal dari hasil query
    $kapan = $dadang['tanggal'];
    $kapin = $dadang['kapan'];
    $nama_pemesan = $dadang['nama'];
    $nomor_meja = $dadang['meja'];
    $email_pemesan = $dadang['email'];
    $tanggal = $dadang['tanggal'];
    $dari = $dadang['dari'];
    $hingga = $dadang['hingga'];

    // Mendefinisikan daftar nama bulan dalam bahasa Indonesia
    $nama_bulan = array(
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    );

    // Memecah tanggal menjadi tahun, bulan, dan hari
    list($tahun, $bulan, $hari) = explode('-', $kapin);

    // Menambahkan 1 hari ke dalam tanggal
    $tanggalSelanjutnya = date('Y-m-d', strtotime($kapin . ' +1 day'));

    // Memecah tanggal selanjutnya menjadi tahun, bulan, dan hari
    list($tahunSelanjutnya, $bulanSelanjutnya, $hariSelanjutnya) = explode('-', $tanggalSelanjutnya);

    // Menggunakan format tanggal dalam bahasa Indonesia
    $kapannih = $hariSelanjutnya . ' ' . $nama_bulan[(int)$bulanSelanjutnya] . ' ' . $tahunSelanjutnya;
    ?>
    <div class="form-container">
        <div class="form">
            <center>
                <span class="heading" style="font-size: 50px;"><strong>Check Out</strong></span>
                <br>
                <h4 style="color: #fff;"><strong>sebelum <?php echo $kapannih; ?></strong></h4>
                <h4 style="color: #fff;"><strong>Minimal DP 50% dari harga</strong></h4>
            </center>

            <br>
            <div class="input-container">
                <img src="fotobang/mandiri.png">
                <input readonly placeholder="Name" type="text" class="input" value="No. Rek : 192-168-123-1">
            </div>
            <div class="input-container">
                <img src="fotobang/bca.png">
                <input readonly placeholder="Name" type="text" class="input" value="No. Rek : 172-141-14-1">
            </div>
            <label style="color: #f7b901;">Bukti Pembayaran Anda:</label>
            <br>
            <br>
            <!-- Form untuk mengunggah bukti pembayaran -->
            <form action="proses-bayar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $dadang['id']; ?>">
                <div class="input-container">
                    <input name="bukti" type="file" class="input">
                </div>
                <br>
                <div class="button-container">
                    <button class="send-button" type="submit">Send</button>
                    <div class="reset-button-container">
                        <a href="pesananmu.php" style="text-decoration: none;">
                            <div class="reset-button">Kembali</div>
                        </a>
                    </div>
                </div>
            </form>


        </div>
    </div>
</body>

</html>