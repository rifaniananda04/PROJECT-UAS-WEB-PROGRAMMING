<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
  header("Location: ../Log_System/login.php");
  exit;
}

require "../koneksi.php";
$id = $_GET["id"];

$p  = mysqli_query($koneksi,"SELECT * FROM tbl_pesanan WHERE id = $id");

if (isset($_POST["upsn"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $tiket = $_POST["tiket"];
    $jumlah = $_POST["jumlah"];
    if ($_POST["tiket"] == 'Ticket Wahana Malam') {
      $isi = 25000;
    }else {
      $isi = 20000;
    }
    $harga = $isi;
    $query= "UPDATE tbl_pesanan 
    SET
    nama = '$nama',
    email = '$email',
    tiket= '$tiket',
    harga = $harga,
    jumlah= '$jumlah'
    WHERE 	id = $id;
    ";
    mysqli_query($koneksi, "$query");

if (mysqli_affected_rows($koneksi) > 0) {
    echo "
            <script>
                alert('Data pesanan anda berhasil diubah!');
                document.location.href = 'pesan.php';
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

  <title>Sepeda Air Danau Kelapa Gading Admin-UPSN_page.com</title>
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
  <?php foreach ($p as $data ) : ?> 
<div class="container d-flex justify-content-center" style="margin-top: 120px;">
    <div class="card w-50">
        <div class="card-header">Ubah Pesanan</div>
        <div class="card-body">
            <h5 class="card-title text-center">Form Ubah Pesanan</h5>
            <div class="row">
                <div class="col-md-12 mt-3">
                <form action="" method="post" class="row" >
                <div class="form-group">
                        <input type="text" class="form-control" name="nama" value="<?= $data["nama"]?>" placeholder="Your Name">
                </div>   

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" value="<?= $data["email"]?>" placeholder="Your Email">
                </div>

                <div class="form-group mt-3">
                    <input type="number" class="form-control" value="<?= $data["jumlah"]?>" name="jumlah" placeholder="Jumlah">
                </div>
                <div class="form-group mt-3">
                    <select id="tiket" name="tiket" class="form-select">
                        <option selected disabled value="<?= $data["tiket"]?>">-- <?= $data["tiket"]?> --</option>
                        <option value="Ticket Wahana Pagi">Ticket Wahana Pagi</option>
                        <option value="Ticket Wahana Siang">Ticket Wahana Siang</option>
                        <option value="Ticket Wahana Malam">Ticket Wahana Malam</option>
                    </select>
                </div>
                      <div class="text-center mt-3">
                        <button type="submit" name="upsn" class="btn btn-primary w-50">Ubah Pemesanan</button>
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