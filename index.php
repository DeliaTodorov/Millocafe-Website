<?php require __DIR__ . "/includes/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MilloCafe | Cafenea în Chișinău</title>
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
          <li><a class="nav-link scrollto active" href="index.php#hero">Acasă</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">Despre</a></li>
          <li><a class="nav-link" href="menu.php">Meniu</a></li>
          <li><a class="nav-link scrollto" href="index.php#events">Evenimente</a></li>
          <li><a class="nav-link" href="gallery.php">Galerie</a></li>
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
<?php $orderSuccess = flash_get('order_success'); $orderError = flash_get('order_error'); $contactSuccess = flash_get('contact_success'); $contactError = flash_get('contact_error'); ?>


    <!-- ======= Sectia Despre ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/despre.jpg");'>
            <a href="https://www.instagram.com/reel/C3iuNpdtnwl/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>#MilloCafe - <strong>gust, culoare și atmosferă în inima Millomania</strong></h3>
              <p>
                Cafeneaua este gândită pentru copii, adolescenți și adulți care vor o pauză plăcută, o băutură bună și un spațiu fotogenic.
              </p>
              <p class="fst-italic">
                Am amenajat spațiul într-un stil cald și prietenos. La noi găsești:
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i> Spațiu amenajat pentru copii unde să poată face teme sau proiecte.</li>
                <li><i class="bx bx-check-double"></i> Evenimente deosebite unde sunt jocuri și puteți câștiga premii.</li>
                <li><i class="bx bx-check-double"></i> Uneori poți prinde și momente speciale dedicate comunității K-pop și fanilor Millomania.</li>
              </ul>
              <p>
                După cumpărături în Millomania, te poți opri la o cafea, un milkshake sau un desert și te poți bucura de o atmosferă relaxată, cu muzică și energie bună.
              </p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- Sfarsit sectia Despre -->

    <!-- ======= Sectia Meniu ======= -->
    <section id="menu" class="menu page-link-section">
      <div class="container">
        <div class="section-title">
          <h2>Vezi al nostru <span>Meniu</span></h2>
          <p>Meniul complet este disponibil pe o pagină separată.</p>
        </div>
        <div class="text-center">
          <a class="book-a-table-btn" href="menu.php">Deschide meniul</a>
        </div>
      </div>
    </section>

    <!-- ======= Evenimente Sectia ======= -->
    <section id="events" class="events">
      <div class="container">

        <div class="section-title">
          <h2>Participă la <span>Evenimentele</span> Noastre</h2>
        </div>

        <div class="events-slider swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/Hbdayidol.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Ziua Idolilor favoriți</h3>
                  <div class="price">
                    <p><span>Gratuit</span></p>
                  </div>
                  <p class="fst-italic">
                    In această zi petrecem timp împreună alături de prietenii și sărbătorim zilele de naștere a idolilor favoriți.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circle"></i> Ziua lu Suga, Somi, Soojin</li>
                    <li><i class="bi bi-check-circle"></i> Concursuri cu premii</li>
                    <li><i class="bi bi-check-circle"></i> Performance-uri de la iubiții voștri Purple Sky.</li>
                  </ul>
                  <p>
                    → pentru fiecare achiziție de peste 40 de lei, vei primi cadou un PHOTOCARD!🤩
                    🍹 Băuturi și gustări delicioase 
                  <p>
                    Vino și creează-ți amintiri cu prietenii tăi! 🤍
                  </p>
                </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/Giveaway.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Surprize cu ocazii speciale</h3>
                  <div class="price">
                    <p><span>20+ lei</span></p>
                  </div>
                  <p class="fst-italic">
                    Da, da! Da, da! Întâmpină primăvara aceasta cu cadouri pe @millocafe.md 🥳💐
                  </p>
                  <p>
                    Doar pe 2 și 3 martie, ne vom încânta toți oaspeții cu bomboane delicioase cu jeleu.
                  </p>
                  <p> Suma de verificare sa fie de la 20 lei 😊</p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/kpopparty.heic" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>K-Pop Party</h3>
                  <div class="price">
                    <p><span>100-120 lei</span></p>
                  </div>
                  <p class="fst-italic">
                    🎉Alătură-te nouă pentru o seară plină de dansuri, jocuri și premii de la @millomania.md! 💫
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circle"></i> Când: 17 martie (duminică). Ora: început 14:00 ✨ <br>
                                                           Unde: Centru, Dance Studio The Space Project, etajul 5.</li>
                    <li><i class="bi bi-check-circle"></i>  Ce vă m-ai așteaptă la evenimentul nostru? Dance Battle și Random Dance, pentru toți doritorii de a 
                                                            arăta energia! 🕺💃 </li>
                    <li><i class="bi bi-check-circle"></i> 🎟️ Bilete:<br>
                                                           • Cumpărare din timp ❗înainte de ziua evenimentului ❗<br>
                                                           Oaspeți: 100 lei <br>
                                                           • În ziua evenimentului: <br>
                                                           Oaspeți: 120 lei</li>
                  </ul>
                  <p>
                    🎫 Cum se achiziționează biletele:<br>
                    ❥ Biletele sunt deja disponibile în magazinele Millomania: <br>
                    • În centru (Str. Pușkin 22) <br>
                    • La Botanica (Dacia 23) <br>
                    • La Ciocana (bd. Mircea cel Bătrân 24/5), atât în magazin cât și în cafeneaua @millocafe.md <br>
                    ❥ Sau puteți achiziționa biletele direct la studio-ul @thespaceprojectofficial, situat în centrul orașului (Vlaicu Pârcălab 45)!
                    Profită de reducerea la bilete chiar astăzi! 💯<br>
                    Vom dansa împreună pe piesele preferate k-pop, ne vom bucura de un furșet și ne vom distra mult! 🤩
                    Nu ratați această oportunitate!
                    Alăturați-vă, dansați și creați momente de neuitat împreună cu prietenii!
                    Vă așteptăm! 💜✨
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- Sfarsit sectia Evenimente -->

    <!-- ======= Sectia fa o comanda ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Fă o <span>Comandă</span></h2>
          
        </div>

        <?php if ($orderSuccess): ?>
        <div class="server-alert server-alert-success"><?= e($orderSuccess) ?></div>
        <?php endif; ?>
        <?php if ($orderError): ?>
        <div class="server-alert server-alert-error"><?= e($orderError) ?></div>
        <?php endif; ?>

        <form action="process/process-order.php" method="post" role="form" class="php-email-form php-server-form" id="order-form">
          <input type="hidden" name="form_type" value="order">
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="order-name" placeholder="Numele tău" value="<?= e(old('name')) ?>" required data-rule="minlen:4" data-msg="Cel puțin 4 caractere">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="order-email" placeholder="Emailul tău" value="<?= e(old('email')) ?>" required data-rule="email" data-msg="Verificați emailul să fie valid">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="phone" id="order-phone" placeholder="Nr. telefon" value="<?= e(old('phone')) ?>" required data-rule="minlen:4" data-msg="Cel puțin 4 caractere">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="date" name="date" class="form-control" id="booking-date" aria-label="Data rezervării" value="<?= e(old('date')) ?>" data-rule="minlen:4" data-msg="Cel puțin 4 caractere">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="time" class="form-control" name="time" id="booking-time" aria-label="Ora rezervării" value="<?= e(old('time')) ?>" data-rule="minlen:4" data-msg="Cel puțin 4 caractere">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" min="1" max="20" placeholder="# de oameni" value="<?= e(old('people')) ?>" required data-rule="minlen:1" data-msg="Cel puțin 1 caracter">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Detaliile comenzii" required><?= e(old('message')) ?></textarea>
          <div class="form-helper">Spune-ne ce vrei să comanzi sau dacă pregătim ceva special pentru evenimentul tău.</div>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Comanda a fost trimisă cu succes.</div>
          </div>
          <div class="text-center"><button type="submit">Trimite mesaj</button></div>
        </form>

      </div>
    </section><!-- End Fă o comanda Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery page-link-section">
      <div class="container">
        <div class="section-title">
          <h2>Câteva poze din <span>Cafeneaua noastră</span></h2>
          <p>Galeria completă este disponibilă pe o pagină separată.</p>
        </div>
        <div class="text-center">
          <a class="book-a-table-btn" href="gallery.php">Deschide galeria</a>
        </div>
      </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contactează-ne</span></h2>
          
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2718.532981490071!2d28.889245854344267!3d47.04939427014946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97d96da0a638f%3A0xad52c7586afe9772!2sMillomania!5e0!3m2!1sen!2s!4v1713942986333!5m2!1sen!2s"  frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Locația:</h4>
              <p>Bulevardul Mircea cel Bătrîn 24/5 <br>Chișinău, Moldova</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Ore de lucru:</h4>
              <p>Luni-Vineri:<br>13:00 - 20:00</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>millocafe@gmail.com</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Sună:</h4>
              <p>+37360319252<br>068531078</p>
            </div>
          </div>
        </div>

        <?php if ($contactSuccess): ?>
        <div class="server-alert server-alert-success"><?= e($contactSuccess) ?></div>
        <?php endif; ?>
        <?php if ($contactError): ?>
        <div class="server-alert server-alert-error"><?= e($contactError) ?></div>
        <?php endif; ?>

        <form action="process/process-contact.php" method="post" role="form" class="php-email-form php-server-form" id="contact-form">
          <input type="hidden" name="form_type" value="contact">
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="contact-name" placeholder="Numele tău" value="<?= e(old('contact_name')) ?>" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="contact-email" placeholder="Email-ul tău" value="<?= e(old('contact_email')) ?>" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subiectul" value="<?= e(old('subject')) ?>" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Mesajul" required><?= e(old('contact_message')) ?></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Mesajul a fost trimis cu succes.</div>
          </div>
          <div class="text-center"><button type="submit">Trimite</button></div>
        </form>

      </div>
    </section><!-- End Contact Section -->

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