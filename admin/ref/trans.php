<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
  header("Location: ../Log_System/login.php");
  exit;
}

require "../koneksi.php";

$psn  = mysqli_query($koneksi,"SELECT * FROM tbl_pesanan");


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sepeda Air Danau Kelapa Gading Admin-TRS_page.com</title>
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
   <!-- ======= Header ======= -->
   <header id="header" class="d-flex align-items-center bg-dark ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="index.html">The<span>Event</span></a></h1>-->
        <a href="../index.html" class="scrollto"><img src="../../assets/img/LOGO3.png" alt="" title=""></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>
          <li class="dropdown"><a href="#kategori"><span>Data</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="dpengguna.php">Pengguna</a></li>
                  <li><a href="dinfo.php">Informasi</a></li>
                  <li><a href="djadwal.php">Jadwal</a></li>
                  <li><a href="dkonten.php">Konten</a></li>
                  </ul>
              </li>
          <li><a class="nav-link scrollto" href="pesan.php">Pemesanan</a></li>
          <li><a class="nav-link scrollto" href="trans.php">Transaksi</a></li>
          <li><a class="nav-link scrollto" href="costumerS.php">Costumer Service</a></li>
          <li><a class="nav-link scrollto" href="laporan.php">Laporan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="buy-tickets scrollto" href="../../Log_System/logout.php">Logout</a>

    </div>
  </header><!-- End Header -->

  <!-- tabel -->
<div class="container border border-2 rounded-3 p-2" style="margin-top: 120px;">
    <div class="row m-2">
      <div class="col-md-12 mb-3">
        <!-- <button class="btn btn-primary mt-2 mb-2" ><a href="tmb-pengguna.php" class="text-light" >Tambah Pengguna Baru</a></button> -->
      <h3 class="text-center">Data Seluruh Pemesanan</h3>
    </div>
        <div class="col-md-12">
        <table  class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Tiket</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total Bayar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($psn as $data ) : ?> 
            <?php 
                $hp = $data["harga"];
                $qt = $data["jumlah"];
                $tllb = $hp * $qt ;
            ?>
            <tr>
                <td scope="row"><?= $i ?></td>
                <td><?= $data["nama"]?></td>
                <td><?= $data["email"]?></td>
                <td><?= $data["tiket"]?></td>
                <td>Rp.<?= $data["harga"]?></td>
                <td><?= $data["jumlah"]?></td>
                <td>Rp.<?= $tllb;?></td>
                <td class="text-center" >
                    <button class="btn btn-sm btn-warning"><a href="trs-psn.php?id=<?= $data["id"]?>" class="text-light" >Proses</a></button>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
        </div>
    </div>
</div>
  <!-- tabel berakhir -->
</body>
</html>