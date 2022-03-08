<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ env('APP_NAME') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('mamba/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('mamba/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('mamba/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('mamba/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('mamba/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('mamba/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('mamba/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('mamba/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('mamba/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('mamba/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba - v4.7.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" style="background-color: #141414" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto text-white">
        <!-- <h1 class="text-white"><a href="index.html">{{ env('APP_NAME') }}</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="{{ asset('images/'.$landing['logo'][0]->meta_value) }}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="text-white nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="text-white nav-link scrollto" href="#about">About</a></li>
          <li><a class="text-white nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="text-white nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Detail Section ======= -->
    <section id="" class="">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-8">
            <div class="hero-container">
                <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                    <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item rounded active" style="background-image: url('{{ asset('mamba/assets/img/slide/slide-1.jpg') }}'); object-fit: contain">
                        <div class="carousel-container" style="height: 550px">
                            <div class="carousel-content container">
                                
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item rounded" style="background-image: url('{{ asset('mamba/assets/img/slide/slide-2.jpg') }}'); object-fit: contain">
                        <div class="carousel-container" style="height: 550px">
                            <div class="carousel-content container">

                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item rounded" style="background-image: url('{{ asset('mamba/assets/img/slide/slide-3.jpg') }}'); object-fit: contain">
                        <div class="carousel-container" style="height: 550px">
                            <div class="carousel-content container">
                                
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
          </div>

          <div class="col-md-4 d-flex flex-column justify-content-between">

            <div class="card rounded p-4 mb-4 border-0 shadow">
                <h4><strong>Modern Private House</strong></h4>
                <p style="color: #9A9A9A; font-size: 14px">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores modi ea dolorum, temporibus molestias consequuntur ut, dolor rem iste voluptates, laudantium eligendi! Fugiat aliquid distinctio harum impedit, aspernatur necessitatibus accusantium.</p>
            </div>

            <div class="card rounded px-4 pt-4 pb-2 mb-3 border-0 shadow">
                <h5 style="color: #9A9A9A"><strong>Specification</strong></h5>
                <div class="mt-3 row">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Dimensi Lahan</p>
                        <p>100</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Luas Lahan</p>
                        <p>100</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-luas-banguan.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Luas Bangunan</p>
                        <p>100</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-lantai.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Jumlah Lantai</p>
                        <p>100</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-kamar tidur.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Kamar Tidur</p>
                        <p>100</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-kamar-mandi.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Kamar Mandi</p>
                        <p>100</p>
                    </div>
                </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <section>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-3">
                    <div class="card rounded p-2 mb-3 border-0 shadow">
                        <img height="200px" style="object-fit: cover" src="{{ asset('mamba/assets/img/slide/slide-1.jpg') }}" alt="">
                        <h4 class="mt-2"><strong>Modern Private House 2</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card rounded p-2 mb-3 border-0 shadow">
                        <img height="200px" style="object-fit: cover" src="{{ asset('mamba/assets/img/slide/slide-1.jpg') }}" alt="">
                        <h4 class="mt-2"><strong>Modern Private House 2</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card rounded p-2 mb-3 border-0 shadow">
                        <img height="200px" style="object-fit: cover" src="{{ asset('mamba/assets/img/slide/slide-1.jpg') }}" alt="">
                        <h4 class="mt-2"><strong>Modern Private House 2</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card rounded p-2 mb-3 border-0 shadow">
                        <img height="200px" style="object-fit: cover" src="{{ asset('mamba/assets/img/slide/slide-1.jpg') }}" alt="">
                        <h4 class="mt-2"><strong>Modern Private House 2</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer style="background-color: #2C2B2B" class="d-flex align-items-center" id="footer">

    <div class="container mt-5 d-flex flex-sm-row flex-column justify-content-between align-items-center">
      <div class="">
        <h5 class="text-white font-weight"><strong>NRW Architecture</strong></h5>
        <p>Copyright NRW Architecture. <br>All Rights Reserved</p>
      </div>

      <div>
        <p class="text-right">Connect With US</p>
        <div>
          <a class="mx-2" href="{{ $landing['socialmedia'][1]->meta_value }}"><img src="{{ asset('logo/Logo-facebook.png') }}" alt=""></a>
          <a class="mx-2" href="{{ $landing['socialmedia'][2]->meta_value }}"><img src="{{ asset('logo/Logo-twitter.png') }}" alt=""></a>
          <a class="ml-2" href="{{ $landing['socialmedia'][0]->meta_value }}"><img src="{{ asset('logo/Logo-instagram.png') }}" alt=""></a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('mamba/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('mamba/assets/js/main.js') }}"></script>

</body>

</html>