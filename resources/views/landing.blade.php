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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

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

  <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.theme.default.min.css') }}">
  <style>
    body {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  </style>

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

      <div class="logo me-auto text-white d-inline-flex gap-3">
        <!-- <h1 class="text-white"><a href="index.html">{{ env('APP_NAME') }}</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ url('/') }}"><img src="{{ asset('images/'.$landing['logo'][0]->meta_value) }}" alt="" class="img-fluid"></a>
        <a href="{{ url('/') }}" class="mt-2"><logo class="text-white">{{ env('APP_NAME') }}</logo></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="text-white nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="text-white nav-link scrollto" href="#about">About</a></li>
          <li><a class="text-white nav-link" href="{{ route('portofolio') }}">Portfolio</a></li>
          <li><a class="text-white nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="text-white nav-link" href="{{ route('article') }}">Article</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          @foreach($slider as $key=>$value)
          <div class="carousel-item {{ ($key == 0 ? 'active' : '' ) }}" style="background-image: url('{{ asset('images/'.$value->image) }}');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">{{ $value->title }}</h2>
                <p class="animate__animated animate__fadeInUp">{{ $value->description }}</p>
              </div>
            </div>
          </div>
          @endforeach

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

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img style="width: 100%; height: 100%; object-fit: cover" src="{{ asset('images/'.$landing['aboutus'][1]->meta_value) }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2 style="text-align: left; color: #000000">About Us</h2>
              <p style="
                font-style: normal !important;
                ">{{ $landing['aboutus'][0]->meta_value }}</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon">
                <img src="{{ asset('logo/a1.svg') }}" alt="" style="color: white">
              </div>
              <h4 style="
                text-transform: capitalize" class="title">Pilihan Utama</h4>
              <p class="description">{{ $landing['aboutus'][2]->meta_value }}</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon">
                <img src="{{ asset('logo/a2.svg') }}" alt="">
              </div>
              <h4 style="
                text-transform: capitalize" class="title">Pelayanan Terbaik</h4>
              <p class="description">{{ $landing['aboutus'][3]->meta_value }}</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="margin-bottom: -70px !important">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2 style="
            color: #000">Portfolio</h2>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach($landing['category'] as $key=>$value)
              <li data-filter=".filter-{{ $value->name }}">{{ $value->name }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          @foreach($landing['portofolio'] as $key=>$value)
          <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $value->category->name }}">
            <div class="portfolio-wrap">
              <img style="height: 250px; width:100%; object-fit: cover" src="{{ asset('images/' . $value->images[0]->image) }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{ $value->name }}</h4>
                <!-- <p>Test</p> -->
                <div class="portfolio-links">
                  <a href="{{ route('portofolio.detail', $value->id) }}" title="More Details"><i class="bi bi-search"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        
        </div>
      </div>
    </section><!-- End Our Portfolio Section -->

    <section style="
      width: 100%;
      height: 900px;
    ">
      <div style="
        position: relative;
        width: 100%;
        overflow: hidden;
        padding-top: 100%;
      " data-aos="fade-up" data-aos-delay="100">
        <iframe style="
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          width: 100%;
          height: 100%;
          border: none;
        " src="{{ url('/video/2.mp4') }}" loop allow="autoplay; fullscreen; picture-in-picture; xr-spatial-tracking; clipboard-write"></iframe>
      </div>
    </section>

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="
            color: #000">Testimonials</h2>
        </div>

        <div class="owl-carousel owl-theme owl-loaded">
          <div class="owl-stage-outer">
            <div class="owl-stage">
            @foreach($landing['testimonial'] as $key=>$value)
              <div class="card h-100 p-4 mb-3 border-0 shadow text-center owl-item"
                style="
                  margin:auto
                ">
                  <img style="
                    width: 100px; 
                    height: 100px; 
                    object-fit: cover;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    margin-bottom: 20px;
                  " class="img-thumbnail rounded-circle" src="{{ asset('images/' . $value->image) }}" alt="">

                  <h4 class="mb-4"><strong>{{ $value->name }}</strong></h4>
                  @if(strlen($value->content) < 300)
                  <B style="
                    color: #878588">"{{ $value->content }}"</B>
                  @else
                  <B style="
                    color: #878588">"{{ Illuminate\Support\Str::limit($value->content, 300 ) }}"</B>
                  @endif
              </div>
            @endforeach
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Our Team Section -->

    <section>
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <div class="d-flex justify-content-between">
            <h2 style="color: #000">Article</h2>
            <a href="{{ route('article') }}">
              <button style="
                background-color: #000;
                color: #fff
              " class="btn">
                More
              </button>
            </a>
          </div>
        </div>
        <div class="row" data-aos="fade-up">
          @foreach($landing['article'] as $key=>$value)
          <div class="col-md-4">
            <div class="card shadow" style="
              border: none">
              <img class="card-img-top rounded" src="{{ asset('images/'.$value->cover_image) }}" alt="Card image cap">
              <div class="card-body">
                <p>{{ $value->created_at }}</p>
                <ar>{{ $value->title }}</ar></br>
                <pg>{!! substr(strip_tags($value->description), 0, 50) !!}</pg></br>
                <a href="{{ route('article.detail', $value->slug_title) }}">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="col-md-12 d-flex" data-aos="fade-up">
              <div class="info-box px-2 h-100" onmouseover="cardOver.call(this)" onmouseout="cardOut.call(this)">
                <a href="https://www.google.com/maps/search/{{ $landing['contactus'][0]->meta_value }}" class="stretched-link">
                  <i class="bx bx-time"></i>
                </a>
                <h3>Jam Buka</h3>
                <p>Senin - Jumat</p>
                <p>Pukul 08.00 - 16.00 WIB</p>
                <p>Untuk pemesanan layanan dapat menghungi kontak berikut atau datang langsung ke alamat studio NRW Architect</p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 d-flex" data-aos="fade-up">
                  <div class="info-box h-100" onmouseover="cardOver.call(this)" onmouseout="cardOut.call(this)">
                    <i class="bx bx-envelope"></i>
                    <h3>Email</h3>
                    <p>{{ $landing['contactus'][2]->meta_value }}</p>
                    <a href="mailto:{{ $landing['contactus'][2]->meta_value }}" class="stretched-link">Email us</a>
                  </div>
                </div>

                <div class="col-md-6 d-flex" data-aos="fade-up">
                  <div class="info-box h-100" onmouseover="cardOver.call(this)" onmouseout="cardOut.call(this)">
                    <i class="bx bx-phone"></i>
                    <h3>Phone Number</h3>
                    <p>{{ $landing['contactus'][1]->meta_value }}</p>
                    <a href="https://wa.me/{{ $landing['contactus'][1]->meta_value }}" class="stretched-link">Whatsapp Us</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="col-lg-12 d-flex" data-aos="fade-up">
              <div class="info-box h-100" onmouseover="cardOver.call(this)" onmouseout="cardOut.call(this)">
                <h3>Our Address</h3>
                <p>{{ $landing['contactus'][0]->meta_value }}</p>
              </div>
            </div>

            <div class="col-lg-12 d-flex" data-aos="fade-up">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15812.931708593733!2d110.366855!3d-7.7651054!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa4e1a3a99628573!2sPT.%20Baracipta%20Esa%20Engineering!5e0!3m2!1sid!2sid!4v1647921456655!5m2!1sid!2sid" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" onmouseover="cardOver.call(this)" onmouseout="cardOut.call(this)"></iframe>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

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

  <!-- Template Main JS File -->
  <script src="{{ asset('mamba/assets/js/main.js') }}"></script>
  <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('owlcarousel//dist/owl.carousel.min.js') }}"></script>

  <script>
    function cardOver() {
      this.classList.add("shadow-lg");
      this.style.cursor = "pointer";
    }

    function cardOut() {
      this.classList.remove("shadow-lg");
      this.style.cursor = "none";
    }
  </script>

  <script>
    $('.owl-carousel').owlCarousel({
      loop:false,
      margin:20,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          }
      }
    })
  </script>

</body>

</html>