<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
  header("Location: ../Log_System/login.php");
  exit;
}

require "../koneksi.php";
$id = $_GET["id"];

$j  = mysqli_query($koneksi,"SELECT * FROM tbl_jadwal WHERE id = $id");

if (isset($_POST["upengguna"])) {
    $jm = $_POST["jam_mulai"];
    $js = $_POST["jam_selesai"];
    $nj = $_POST["nama_jadwal"];
    $k = $_POST["keterangan"];

    $query= "UPDATE tbl_jadwal 
    SET
    jam_mulai = '$jm',
    jam_selesai = '$js',
    nama_jadwal= '$nj',
    keterangan= '$k'
    WHERE 	id = $id;
    ";
    mysqli_query($koneksi, "$query");

if (mysqli_affected_rows($koneksi) > 0) {
    echo "
            <script>
                alert('Data jadwal berhasil diubah!');
                document.location.href = 'djadwal.php';
            </script>
        ";
}else {
    echo mysqli_error($koneksi);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sepeda Air Danau Kelapa Gading Admin-UJDW_page.com</title>
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

  <!-- card -->
  <?php foreach ($j as $data ) : ?> 
<div class="container" style="margin-top: 120px;">
    <div class="card">
        <div class="card-header">Ubah Jadwal</div>
        <div class="card-body">
            <h5 class="card-title text-center">Form Ubah Jadwal</h5>
            <div class="row">
                <div class="col-md-12 mt-3">
                <form action="" method="post" class="row" >
                <div class="col-md-6 form-group">
                    <label class="form-label" for="jam_mulai">Jam Mulai</label>
                    <input class="form-control" type="time" name="jam_mulai" value="<?= $data["jam_mulai"]?>" >
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="jam_selesai">Jam Selesai</label>
                    <input class="form-control" type="time" name="jam_selesai" value="<?= $data["jam_selesai"]?>" >
                </div>
                <div class="col-md-6 mt-4 form-group">
                    <label class="form-label" for="nama_jadwal">Nama Jadwal</label>
                    <input class="form-control" type="text" name="nama_jadwal" value="<?= $data["nama_jadwal"]?>" >
                </div>
                <div class="col-md-6 mt-4 form-group">
                    <label class="form-label" for="keterangan">Keterangan</label>
                    <input class="form-control" type="text" name="keterangan" value="<?= $data["keterangan"]?>" >
                </div>
                <div class="mt-3 mb-2 text-center" >
                    <button type="submit" name="upengguna" id="ujdw" class="btn btn-warning w-50" >Ubah Jadwal</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
  <!-- card berakhir -->

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>