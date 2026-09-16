<?php require __DIR__ . "/includes/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Galerie | MilloCafe</title>
  <meta content="MilloCafe din Chișinău - băuturi, deserturi, evenimente și o atmosferă instagramabilă pentru toată familia." name="description">
  <meta content="MilloCafe, cafenea Chișinău, milkshake, cafea, ceai, deserturi, evenimente, Millomania" name="keywords">
  <meta name="theme-color" content="#f17f96">

  <!-- Favicons -->
  <link href="assets/img/milloicon.png" rel="icon">
  <link href="assets/img/milloicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="scroll-progress" id="scroll-progress"></div>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+37360319252</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Luni-Vineri: 13:00 - 20:00</span></i>
      <span class="status-badge ms-4" id="open-status">Verificăm programul...</span>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.php">#MilloCafe</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php#hero">Acasă</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">Despre</a></li>
          <li><a class="nav-link" href="menu.php">Meniu</a></li>
          <li><a class="nav-link scrollto" href="index.php#events">Evenimente</a></li>
          <li><a class="nav-link active" href="gallery.php">Galerie</a></li>
          <li><a class="nav-link scrollto" href="index.php#book-a-table">Fă o comandă</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contacte</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#book-a-table" class="book-a-table-btn scrollto">Fă o comandă</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Cafeneaua</span> #MilloCafe</h2>
                <p class="animate__animated animate__fadeInUp">MilloCafe este zona de relaxare din universul Millomania. Aici poți savura băuturi, deserturi și delicii japoneze într-o atmosferă prietenoasă, alături de prieteni și familie. Este una dintre cele mai instagramabile locații din Chișinău pentru iubitorii de K-pop și vibe-uri colorate.</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Meniul Nostru</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Fă o comandă</a>
                </div>
                <div class="hero-mini-stats animate__animated animate__fadeInUp">
                  <div class="hero-stat"><strong>100%</strong><span>vibe instagramabil</span></div>
                  <div class="hero-stat"><strong>Top</strong><span>gustări & băuturi</span></div>
                  <div class="hero-stat"><strong>Live</strong><span>evenimente speciale</span></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Cafeneaua #MilloCafe</h2>
                <p class="animate__animated animate__fadeInUp">MilloCafe este zona de relaxare din universul Millomania. Aici poți savura băuturi, deserturi și delicii japoneze într-o atmosferă prietenoasă, alături de prieteni și familie. Este una dintre cele mai instagramabile locații din Chișinău pentru iubitorii de K-pop și vibe-uri colorate.</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Meniul Nostru</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Fă o comandă</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide3.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Cafeneaua #MilloCafe</h2>
                <p class="animate__animated animate__fadeInUp">MilloCafe este zona de relaxare din universul Millomania. Aici poți savura băuturi, deserturi și delicii japoneze într-o atmosferă prietenoasă, alături de prieteni și familie. Este una dintre cele mai instagramabile locații din Chișinău pentru iubitorii de K-pop și vibe-uri colorate.</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Meniul Nostru</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Fă o comandă</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section class="page-hero">
      <div class="container">
        <h1>Galerie MilloCafe</h1>
        <p>Poze din cafenea, atmosferă și evenimente.</p>
      </div>
    </section>

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Câteva poze din <span>Cafeneaua noastră</span></h2>
          
        </div>

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/1.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/2.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/3.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/4.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/5.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/6.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/7.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/8.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>#MilloCafe</h3>
      <p>Nr.1 friendly cafenea din Chișinău.</p>
      <div class="social-links">
        <a href="tel:+37360319252" class="twitter" aria-label="Sună acum"><i class="bx bx-phone-call"></i></a>
        <a href="mailto:millocafe@gmail.com" class="facebook" aria-label="Trimite email"><i class="bx bx-envelope"></i></a>
        <a href="https://www.instagram.com/millocafe.md/" target="_blank" rel="noopener" class="instagram" aria-label="Instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://maps.google.com/?q=Millomania%20Chisinau" target="_blank" rel="noopener" class="google-plus" aria-label="Vezi locația"><i class="bx bx-map"></i></a>
        <a href="#book-a-table" class="linkedin scrollto" aria-label="Rezervă"><i class="bx bx-calendar"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>MilloCafe</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>