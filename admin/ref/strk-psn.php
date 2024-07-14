<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
  header("Location: ../Log_System/login.php");
  exit;
}

require "../koneksi.php";
$id = $_GET["id"];

$p  = mysqli_query($koneksi,"SELECT * FROM tbl_pesanan WHERE id = $id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sepeda Air Danau Kelapa Gading Admin-PSPSN_page.com</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
<div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto" style="border: 1px solid #000;">
          <h4 class="text-center mt-2"><span class="mt-3">Sepeda Air Danau Kelapa Gading</span></h4>
          <hr>
          <?php foreach ($p as $data) :?>
            <?php 
                $hp = $data["harga"];
                $qt = $data["jumlah"];
                $tllb = $hp * $qt ;
                $ket = "Belum Di Bayar";
            ?>
          <div class="row mt-3">
            <div class="col-md-6">
              TANGGAL : <?= $data['create_at'] ?><br>
              KODE PEMESANAN  : <?= $data['kp'] ?><br>
              KET : <?= $ket; ?><br>
            </div>
            <div class="col-md-6">
              Member : <?= $data['nama'] ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-4">
                Tiket Pemesanan  : 
            </div>
            <div class="col-md-8">
            <?= $data['tiket'] ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                Harga  : 
            </div>
            <div class="col-md-8">
            Rp.<?= $data['harga'] ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                Jumlah  : 
            </div>
            <div class="col-md-8">
             <?= $data['jumlah'] ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-4 text-left">Total Pembayaran</div>
            <div class="col-md-8 text-left">Rp. <?= $tllb; ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col text-center">
              <p>
                Terima Kasih <br> Atas Kunjungan Anda
              </p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <script>
      window.print();
    </script>
</body>
</html>