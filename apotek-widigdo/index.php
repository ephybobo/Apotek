<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Apotek Widigdo</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Bootslander - v2.1.0
    * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>Apotek Widigdo</span></a></h1>
      </div>
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Main Section ======= -->
  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Sistem Informasi Farmasi Apotek Widigdo Klaten</h1>
            <div class="text-center text-lg-left">
              <a href="#contact" class="btn-get-started scrollto">Harap Login</a>
            </div>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 main-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="assets/img/apotek.png" class="img-fluid animated" alt="ikon">
        </div>
      </div>
    </div>

    <!-- Ikon Apotek -->
    <svg class="main-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>
  </section>
  <!-- End main Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <!-- Judul Kontak -->
        <div class="section-title" data-aos="fade-up">
          <h2>Detail</h2>
          <p>Info Kontak</p>
        </div>

        <!-- Lokasi -->
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Lokasi:</h4>
                <p>Sayangan, Brangkal, Kec. Wedi, Kabupaten Klaten, Jawa Tengah 57461 </p>
              </div>
              <!-- email -->
              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>apotek-widigdo@example.com</p>
              </div>
              <!-- Phone  -->
              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>No. Telepon:</h4>
                <p>+62 823-2487-7222</p>
              </div>
            </div>
        </div>
        
          <!-- ===== Login ===== -->
          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                <!-- Form Login -->
                <form action="./php/login.php" method="POST">
                    <h3 class="text-center title-login" style="color:#078721;margin-bottom:35px;margin-top:-10px"><i class="icofont-user" style="font-size:30px;color:#078721;margin-right:10px"></i><b>USER LOGIN</b></h3>
                    <!-- Username -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <!-- Button Login -->
                    <input type="submit" name ="login" class="btn btn-block" value="LOGIN" />
                    <!-- Button Lupa Password -->
                    <input type="submit" name ="lupa_password" class="btn btn-block" value="LUPA PASSWORD" onClick="alert('Hubungi Admin di email : admin@gmail.com')" />
                </form>
            </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

    <!-- Kursor ke atas -->
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <div id="preloader"></div>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>