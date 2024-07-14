<?php 
session_start();
if (empty($_SESSION['telah_login']) ) {
  header("Location: ../Log_System/login.php");
  exit;
}

require "../koneksi.php";
$id = $_GET["id"];

$p  = mysqli_query($koneksi,"SELECT users.id,users.id_akses,users.nama_lengkap,users.no_hp,users.email,users.username,users.password,tb_lvl.akses FROM users
INNER JOIN tb_lvl  ON users.id_akses = tb_lvl.id WHERE users.id = $id");

if (isset($_POST["upengguna"])) {
    $id_akses = $_POST["id_akses"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $nohp = $_POST["no_hp"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query= "UPDATE users
    SET
    username = '$username',
    password = '$password',
    nama_lengkap = '$nama_lengkap',
    no_hp = '$nohp',
    email = '$email',
    id_akses  = $id_akses
    WHERE 	id = $id;
    ";
    mysqli_query($koneksi, "$query");

if (mysqli_affected_rows($koneksi) > 0) {
    echo "
            <script>
                alert('Data pengguna berhasil diubah!');
                document.location.href = 'dpengguna.php';
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

  <title>Sepeda Air Danau Kelapa Gading Admin-UP_page.com</title>
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
<div class="container" style="margin-top: 120px;">
    <div class="card">
        <div class="card-header">Tambah Pengguna Baru</div>
        <div class="card-body">
            <h5 class="card-title text-center">Form Tambah Pengguna</h5>
            <div class="row">
                <div class="col-md-12 mt-3">
                <form action="" method="post" class="row" >
                <div class="col-md-4 form-group">
                    <label class="form-label" for="">Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama_lengkap" value="<?= $data["nama_lengkap"]?>" >
                </div>
                <div class="col-md-4 form-group">
                    <label class="form-label" for="no_hp">Nomor Hp</label>
                    <input class="form-control" type="text" name="no_hp" value="<?= $data["no_hp"]?>" >
                </div>
                <div class="col-md-4 form-group">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="<?= $data["email"]?>" >
                </div>
                <div class="col-md-4 mt-4 form-group">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username" value="<?= $data["username"]?>" >
                </div>
                <div class="col-md-4 mt-4 form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="text" class="form-control" name="password" value="<?= $data["password"]?>" >
                </div>
                <div class="col-md-4 mt-4">
                    <label for="id_akses">Akses Sebagai</label>
                    <select name="id_akses" id="id_akses" class="form-select mt-2">
                        <option selected disabled value="<?= $data["id_akses"]?>"><?= $data["akses"]?></option>
                        <option value="1">Admin</option>
                        <option value="2">Pelanggan</option>
                    </select>
                </div>
                <div class="mt-3 mb-2 text-center" >
                    <button type="submit" name="upengguna" id="upengguna" class="btn btn-warning w-50" >Ubah Pengguna</button>
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