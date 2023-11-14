<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rumah Crepes Catering</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/form.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
  <section id="events" class="events">
    <div class="container-fluid" data-aos="fade-up">
      <div class="section-header">
        <h2>Booking Catering</h2>
        <p>Rumah Crepes <span>Catering</span> Siap Melayani Anda</p>
      </div>
  </section>

  <section class="container">
    <header>Form Pemesanan</header>
    <form action="reservasi.php" class="form" method="POST">
      <div class="input-box">
        <label>Nama Pemesan</label>
        <input type="text" name="nama" placeholder="Nama" required>
      </div>
      <div class="input-box">
        <label>Email</label>
        <input type="email" name="email"  placeholder="Masukkan Email" required>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Nomor HP</label>
          <input type="text" name="nomer" placeholder="No HP" required>
        </div>
        <div class="input-box">
          <label>Pilih Tanggal</label>
          <input required="" name="tanggal" placeholder="Masukan Tanggal Pemesanan" type="date">
        </div>
      </div>
      <div class="input-box address">
        <label>Alamat Lengkap</label>
        <input required="" name="alamat"  placeholder="Masukkan Alamat Lengkap" type="text">
        <div class="column">
          <div class="select-box">
            <select name="kabko">
              <option hidden="">Pilih Paket Catering</option>
              <option value="Paket A">Paket A</option>
              <option value="Paket B">Paket B</option>
              <option value="Paket C">Paket C</option>
            </select>
          </div>
          <input required="" name="pos"  placeholder="Kode Pos" type="text">
        </div>
      </div>
      <button type="submit">Submit</button>
    </form>
  </section>
  <br>
  <br>
  <br>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

