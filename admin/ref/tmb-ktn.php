<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
  header("Location: ../Log_System/login.php");
  exit;
}

require "../koneksi.php";

if (isset($_POST["tktn"])) {
    $j = $_POST["judul"];
    $d = $_POST["deskripsi"];
    
        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        if ($error === 4) {
            echo"<script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        $extensiGambarValid = ['jpg', 'jpeg', 'png'];
        $extensiGambar = explode('.', $namafile);
        $extensiGambar =  strtolower(end($extensiGambar));

        if (!in_array($extensiGambar,$extensiGambarValid)) {
            echo"<script>
                    alert('yang anda upload bukan gambar!');
                </script>";
            return false;
        }

        if ($ukuranfile > 1000000) {
            echo"<script>
            alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
        }

        $namafilebaru = uniqid();
        $namafilebaru .= '.'; 
        $namafilebaru .= $extensiGambar; 

        move_uploaded_file($tmpname,'../../assets/img/' . $namafilebaru);

        $ft = $namafilebaru;

        if (!$ft) {
            return false;
        }

    $query = "INSERT INTO tbl_konten VALUES ('', '$j' ,'$d','$ft') ";
    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
                alert('Konten baru berhasil di tambahkan!');
                document.location.href = 'dkonten.php'
            </script>";
    } else {
        echo "<script>
                alert('Konten baru gagal di tambahkan!');
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sepeda Air Danau Kelapa Gading Admin-DTK_page.com</title>
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

<div class="container" style="margin-top: 120px;">
    <div class="card">
        <div class="card-header">Tambah Konten Baru</div>
        <div class="card-body">
            <h5 class="card-title text-center">Form Tambah Konten</h5>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mt-3">
                <form action="" method="post" class="row" enctype="multipart/form-data">
                <div class="col-md-12 mt-2 form-group">
                    <label class="form-label" for="judul">Judul</label>
                    <input class="form-control" type="text" name="judul" >
                </div>
                <div class="col-md-12 mt-2 form-group">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" type="text"name="deskripsi"></textarea>
                </div>
                <div class="col-md-12 mt-2 form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>
                </div>
                <div class="mt-3 mb-2 text-center" >
                    <button type="submit" name="tktn" class="btn btn-primary w-50" >Tambahkan Konten</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
 <!-- Vendor JS Files -->
 <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</html>
