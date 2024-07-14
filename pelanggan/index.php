<?php
session_start();
if (empty($_SESSION['telah_login']) ) {
  header("Location: ../Log_System/login.php");
  exit;
}
include "./koneksi.php";

if (isset($_POST["buy"])) {
  $kp = "WAKP".uniqid();
  $pemesan = $_SESSION["nama_lengkap"];
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $tiket = $_POST["tiket"];
  if ($_POST["tiket"] == 'Ticket Wahana Malam') {
    $isi = 25000;
  }else {
    $isi = 20000;
  }
  $harga = $isi;
  $jumlah = $_POST["jumlah"];
  $create_at="current_timestamp()";
  $update_at="current_timestamp()";
  
  $query = "INSERT INTO tbl_pesanan VALUES ('', '$kp' ,'$pemesan','$nama', '$email','$tiket','$harga','$jumlah',$create_at,$update_at) ";
  mysqli_query($koneksi, $query);

  if (mysqli_affected_rows($koneksi) > 0) {
      echo "<script>
              alert('Pesan tiket wahana berhasil !');
              document.location.href = 'ref/pesan.php';
          </script>";
  } else {
      echo "<script>
              alert('Pesan tiket wahana gagal !');
          </script>";
  }
}

if (isset($_POST["kpsn"])) {
  $pemilik = $_SESSION["nama_lengkap"];
  $nama = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  $create_at="current_timestamp()";
  $update_at="current_timestamp()";
  
  $query = "INSERT INTO tbl_costumers VALUES ('','$pemilik','$nama', '$email','$subject','$message',$create_at,$update_at) ";
  mysqli_query($koneksi, $query);

  if (mysqli_affected_rows($koneksi) > 0) {
      echo "<script>
              alert('Aduan anda berhasil dikirim !');
          </script>";
  } else {
      echo "<script>
              alert('Aduan anda gagal dikirim !');
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sepeda Air Danau Kelapa GadingCostumer_page.com</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="index.html">The<span>Event</span></a></h1>-->
        <a href="index.html" class="scrollto"><img src="assets/img/LOGO3.png" alt="" title=""></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="ref/pesan.php">Pemesanan</a></li>
          <li><a class="nav-link scrollto" href="ref/costumerS.php">Costumer Service</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="buy-tickets scrollto" href="../Log_System/logout.php">Logout</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Sepeda Air<br><span>Danau</span> Kelapa Gading</h1>
      <p class="mb-4 pb-0">Bermain dan bersantai bersama keluarga dan teman - temam</p>
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
      <a href="#buy-tickets" class="about-btn scrollto">Orders Now!!</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container position-relative" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <h2>About The Event</h2>
            <p>Danau Kelapa Gading merupakan sebuah danau buatan yang sengaja dibentuk oleh Pemerintah Kabupaten Asahan
              menjadi sebuah destinasi wisata kota. Sejak diadakan proses pemugaran pada tahun 2009, danau ini disulap
              menjadi sebuah tempat wisata yang indah yang saat ini ramai dikunjungi oleh masyarakat Kota Kisaran..</p>
          </div>
          <div class="col-lg-3">
            <h3>Lokasi</h3>
            <p>Jl. Lintas Sumatera, Kisaran Naga, Kec. Kota Kisaran Timur, Kabupaten Asahan, Sumatera Utara 21211</p>
          </div>
          <div class="col-lg-3">
            <h3>Waktu Wahana Bermain</h3>
            <p>Setiap Hari<br>Pukul 09.00 s/d 22.00 wib</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Jadwal Permainan Sepeda Air</h2>
          <p>Berikut jadwal wahana kami</p>
        </div>

        <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <?php
          $sql1 = mysqli_query($koneksi, "SELECT * FROM tbl_jadwal");
          while ($data = mysqli_fetch_assoc($sql1)) :
          ?>
            <div class="row schedule-item">
              <div class="col-md-2"><time><?= $data['jam_mulai']; ?> - <?= $data['jam_selesai']; ?></time></div>
              <div class="col-md-10">
                <h4><?= $data['nama_jadwal']; ?></h4>
                <p><?= $data['keterangan']; ?></p>
                <!-- <p>1 sepeda air max 2 orang.</p> -->
              </div>
            </div>
          <?php
          endwhile;
          ?>

          <!-- ======= Venue Section ======= -->
          <section id="venue">
            <!-- 
      <div class="container-fluid" data-aos="fade-up"> -->

            <div class="section-header">
              <h2>Maps Location</h2>
              <!-- <p>Event venue location info and gallery</p> -->
            </div>

            <div class="row g-0">
              <div class="col-lg-6 venue-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3984.458304440139!2d99.6113071!3d2.9702482!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3032495e79f8e34f%3A0xfaae2707c102174!2sTaman%20Wisata%20Danau%20Kelapa%20Gading!5e0!3m2!1sid!2sid!4v1710918311811!5m2!1sid!2sid" width="800" height="5000" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>

            <!-- <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8 position-relative">
                <h3>Downtown Conference Center, New York</h3>
                <p>Iste nobis eum sapiente sunt enim dolores labore accusantium autem. Cumque beatae ipsam. Est quae sit qui voluptatem corporis velit. Qui maxime accusamus possimus. Consequatur sequi et ea suscipit enim nesciunt quia velit.</p>
              </div>
            </div>
          </div> -->


            <!-- </div> -->

            <!-- <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/1.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/2.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/3.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/4.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/5.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/6.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/7.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/8.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>
      </div> -->

          </section><!-- End Venue Section -->

          <!-- ======= Hotels Section ======= -->
          <section id="hotels" class="section-with-bg">

            <div class="container" data-aos="fade-up">
              <div class="section-header">
                <h2>Resto and Caffe</h2>
                <p>Tersedia juga tempat makan keluarga & caffe</p>
              </div>

              <div class="row" data-aos="fade-up" data-aos-delay="100">

                <?php
                $sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_konten");
                while ($data = mysqli_fetch_assoc($sql2)) :
                ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="hotel">
                      <div class="hotel-img">
                        <img src="../assets/img/<?= $data['foto']; ?>" alt="Hotel 1" class="img-fluid">
                      </div>
                      <h3><a href="#"><?= $data['judul']; ?></a></h3>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <p><?= $data['deskripsi']; ?></p>
                    </div>
                  </div>
                <?php endwhile; ?>

                <!-- <div class="col-lg-4 col-md-6">
                  <div class="hotel">
                    <div class="hotel-img">
                      <img src="assets/img/dn2.jpeg" alt="Hotel 2" class="img-fluid">
                    </div>
                    <h3><a href="#">Caffe</a></h3>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill-half-full"></i>
                    </div>
                    <p>Penilaian pengunjung</p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="hotel">
                    <div class="hotel-img">
                      <img src="assets/img/dn3.jpeg" alt="Hotel 3" class="img-fluid">
                    </div>
                    <h3><a href="#">Resto</a></h3>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                    <p>Penilaian pengunjung</p>
                  </div>
                </div> -->
              </div>
            </div>

          </section>
          <!-- End Hotels Section -->

          <!-- Buy Ticket Section -->
          <section id="buy-tickets" class="section-with-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2>Buy Tickets</h2>
                <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
              </div>

              <div class="row">
                <?php
                $sql3 = mysqli_query($koneksi, "SELECT * FROM tbl_tiket");
                while ($data = mysqli_fetch_assoc($sql3)) :
                ?>
                  <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card mb-5 mb-lg-0">
                      <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center"><?= $data['nama_tiket']; ?></h5>
                        <h6 class="card-price text-center">Rp <?= number_format($data['harga']); ?></h6>
                        <hr>
                        <ul class="fa-ul">
                          <li><span class="fa-li"><i class="fa fa-check"></i></span>2 Orang</li>
                          <li><span class="fa-li"><i class="fa fa-check"></i></span><?= $data['durasi']; ?> Jam Permainan</li>
                          <li><span class="fa-li"><i class="fa fa-check"></i></span><?= $data['bonus']; ?></li>
                          <li><span class="fa-li"><i class="fa fa-check"></i></span><?= $data['peraturan']; ?></li>
                          <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span><?= $data['lainnya']; ?></li>
                        </ul>
                        <hr>
                        <div class="text-center">
                          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy Now</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>

            <!-- Modal Order Form -->
            <div id="buy-ticket-modal" class="modal fade">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Buy Tickets</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="">
                      <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Your Name">
                      </div>
                      <div class="form-group mt-3">
                        <input type="text" class="form-control" name="email" placeholder="Your Email">
                      </div>
                      <div class="form-group mt-3">
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah">
                      </div>
                      <div class="form-group mt-3">
                        <select id="tiket" name="tiket" class="form-select">
                          <option selected disabled value="">-- Pilihan Waktu Bermain --</option>
                          <option value="Ticket Wahana Pagi">Ticket Wahana Pagi</option>
                          <option value="Ticket Wahana Siang">Ticket Wahana Siang</option>
                          <option value="Ticket Wahana Malam">Ticket Wahana Malam</option>
                        </select>
                      </div>
                      <div class="text-center mt-3">
                        <button type="submit" name="buy" class="btn">Buy Now</button>
                      </div>
                    </form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

          </section><!-- End Buy Ticket Section -->

          <!-- ======= Contact Section ======= -->
          <section id="contact" class="section-bg">

            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2>Contact Us</h2>
                <p>Layanan Customer service.</p>
              </div>

              <div class="row contact-info">
                <?php
                $sql4 = mysqli_query($koneksi, "SELECT * FROM tbl_informasi LIMIT 1");
                $datainf = mysqli_fetch_assoc($sql4);
                ?>
                <div class="col-md-4">
                  <div class="contact-address">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Alamat</h3>
                    <address><?= $datainf['alamat']; ?></address>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="contact-phone">
                    <i class="bi bi-phone"></i>
                    <h3>Phone Number</h3>
                    <p><a href="tel:<?= $datainf['no_hp']; ?>"><?= $datainf['no_hp']; ?></a></p>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="contact-email">
                    <i class="bi bi-envelope"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:<?= $datainf['email']; ?>"><?= $datainf['email']; ?></a></p>
                  </div>
                </div>

              </div>

              <div class="form">
                <form action="" method="post" role="form">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-md-6 mt-3 mt-md-0">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="text-center"><button type="submit" name="kpsn"  class="btn btn-danger mt-3 w-50" >Send Message</button></div>
                </form>
              </div>

            </div>
          </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>