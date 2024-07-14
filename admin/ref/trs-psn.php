
<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
  header("Location: ../Log_System/login.php");
  exit;
}
require "../koneksi.php";

$id =$_GET["id"];

$p = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan WHERE id = $id");

if (isset($_POST["cek"])) {
  $t = $_POST["tsh"];
  $b = $_POST["byr"];
  $k = $b - $t;
}

if (isset($_POST["proses"])) {
  $kembalian = $_POST["k"];
  if ($kembalian >= 0) {
    echo "
            <script>
                alert('Pembayaran pesanan berhasil di lakukan!');
                document.location.href = 'trans.php';
            </script>
        ";
  }elseif (empty($kembalian)) {
    echo "
            <script>
                alert('Masukan Nominal Pembayaran!');
            </script>
        ";
  }else {
    echo "
            <script>
                alert('Pembayaran gagal di lakukan!');
            </script>
        ";
  }
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sepeda Air Danau Kelapa Gading Admin-TPSN_page.com</title>
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

<!-- trans -->
<section id="pemesanan" class="appointment section-bg" style="margin-top: 100px;" >
      <div class="container">
        <div class="section-title">
          <h2>Transaksi Pemesanan</h2>
          <p></p>
        </div>
        <?php foreach ($p as $data ) : ?> 
          <?php 
                  $hp = $data["harga"];
                  $qt = $data["jumlah"];
                  $tllb = $hp * $qt ;  
            ?>
        <form action="" method="post" role="form">
        <div class="row">
          <div class="row">

          <div class="col-md-6 mt-2 mb-2">
                  <label for="kp">Kode Pemesanan</label>
                <input type="text" disabled name="kp" class="form-control datepicker" id="kp" placeholder="Kode Pemesanan" value="<?= $data["kp"]?>" required>
            </div>

            <div class="col-md-6 mt-2 mb-2">
                  <label for="pemesan">Pemesan</label>
                <input type="text" disabled name="pemesan" class="form-control datepicker" id="pemesan" placeholder="Pemesan" value="<?= $data["pemesan"]?>" required>
            </div>

            <div class="col-md-6 form-group">
              <div class="row">
                <div class="col-md-12 mt-2 mb-2">
                <label for="tiket">Tiket</label>
                <input type="text" disabled name="tiket" class="form-control datepicker" id="tiket" placeholder="Tiket" value="<?= $data["tiket"]?>" required>
                </div>
                <div class="col-md-12 mt-2 mb-2">
                <label for="harga">Harga</label>
              <input type="number" class="form-control datepicker" disabled name="harga" value="<?= $data["harga"]?>" >
                </div>
                <div class="col-md-12 mt-2 mb-2">
                <label for="jumlah">Jumlah</label><br>
              <input type="number" class="form-control datepicker" disabled name="jumlah" value="<?= $data["jumlah"]?>" >
                </div>
              </div>
            </div>

            <div class="col-md-6 form-group">
              <div class="row">
              <div class="col-md-12 mt-2 mb-2" >
                <label for="tb">Total Bayar</label>
                <input type="number" name="tb" class="form-control datepicker" id="tb" disabled  value="<?= $tllb;?>">
            </div>
              <div class="col-md-12 mt-2 mb-2" >
                <div class="row">
                  <form action="" method="post">
                    <input type="number" hidden name="tsh" value="<?= $tllb;?>" >
                  <div class="col-md-6">
                  <label for="b">Bayar</label>
                <input type="number" name="byr" class="form-control datepicker" id="byr">
                  </div>
                  <div class="col-md-6">
                  <label for="k">Kembalian</label>
                <input type="number" name="k" class="form-control datepicker" id="k" value="<?= $k;?>" >
                  </div>
                  <div class="col-md-12 mt-3" >
                <button type="submit" class="btn btn-warning form-control datepicker text-light" name="cek">Kembalian</button>
                </div>
                  </form>
                </div>
            </div>
            </div>
            </div>
            <div class="col-md-12 mt-2 mb-2 form-group">
              <button type="submit" name="proses" class="btn btn-primary form-control datepicker">Proses</button>
            </div>
          </div>
        </form>
        <?php endforeach; ?>
      </div>
    </section>
<!-- trasn end -->
</body>
</html>