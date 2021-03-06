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
  <link rel="stylesheet" href="{{ asset('lightgallery/css/lightgallery.css') }}">

  <style>
    /* .imagePortofolio:hover {
      opacity: 0.8;
      transition: all .1s ease-in-out;
    } */
    .canvasPortofolio {
      position: relative;
      width: 100%;
    }

    .imagePortofolio {
      opacity: 1;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .canvasPortofolio:hover .imagePortofolio {
      opacity: 0.8;
    }

    .canvasPortofolio:hover .middle {
      opacity: 0.5;
    }

    .text {
      background-color: #04AA6D;
      color: white;
      font-size: 16px;
      padding: 16px 32px;
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
        <a href="{{ url('/') }}" class="mt-2"><h4 class="text-white"><strong>{{ env('APP_NAME') }}</strong></h4></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="text-white nav-link scrollto active" href="{{ url('/') }}#hero">Home</a></li>
          <li><a class="text-white nav-link scrollto" href="{{ url('/') }}#about">About</a></li>
          <li><a class="text-white nav-link scrollto" href="{{ route('portofolio') }}">Portfolio</a></li>
          <li><a class="text-white nav-link scrollto" href="{{ url('/') }}#contact">Contact</a></li>
          <li><a class="text-white nav-link scrollto" href="{{ route('article') }}">Article</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <div class="container" style="margin-top: 110px" data-aos="fade-up">

      <div class="mt-3 mb-3">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <!-- Carousel indicators -->
          <!-- <ol class="carousel-indicators">
              <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
              <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
          </ol> -->
          
          <!-- Wrapper for carousel items -->
          <div id="lightgallery" class="carousel-inner">
            @for($i = 0; $i < sizeof($portofolio->images); $i++)
              <div  class="canvasPortofolio carousel-item {{ ($i == 0 ? 'active' : '' ) }}" data-src="{{ asset('images/'.$portofolio->images[$i]->image) }}" onclick="openGallery()">
                  <img style="width: 100%; height: 500px; object-fit: cover" src="{{ asset('images/'.$portofolio->images[$i]->image) }}" class="rounded d-block imagePortofolio" alt="Slide 1">
                  <div class="middle">
                    <p>click for detail</p>
                  </div>
              </div>
            @endfor
          </div>

          <!-- Carousel controls -->
          <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="card rounded p-4 mb-4 border-0 shadow" style="color: #9A9A9A; font-size: 14px">
              <s>{{ $portofolio->name }}</s>
              {!! $portofolio->description !!}
          </div>

          <div class="w-100 d-inline-flex justify-content-end">
            <div class="card rounded border-0 shadow">
              <div class="p-4">
                <h5 class="mb-4" style="#000000;"><strong>Share this link via</strong></h5>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" data-toggle="tooltip" title="Bagikan ke Facebook">
                  <img src="{{ asset('logo/share/fb.png') }}" alt="copy">
                </a>
                <a href="https://twitter.com/share?url={{ url()->current() }}" data-toggle="tooltip" title="Bagikan ke Twitter">
                  <img src="{{ asset('logo/share/twitter.png') }}" alt="copy">
                </a>
                <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" data-toggle="tooltip" title="Bagikan ke Whatsapp">
                  <img src="{{ asset('logo/share/wa.png') }}" alt="copy">
                </a>
                <button style="all: unset; cursor: pointer;" onclick="copyText()" data-toggle="popover" title="Url disalin">
                  <img src="{{ asset('logo/share/copy.png') }}" alt="copy">
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card rounded px-4 pt-4 pb-2 mb-3 border-0 shadow">
              <h5 style="color: #9A9A9A"><strong>Specification</strong></h5>
              <div class="mt-3 row">
                  @if($portofolio->specificationBuilding != null)

                    @if($portofolio->specificationBuilding->land_width != 0 && $portofolio->specificationBuilding->land_length != 0)
                    <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Dimensi lahan (m2)</p>
                      <m>{{ $portofolio->specificationBuilding->land_width }} m x {{ $portofolio->specificationBuilding->land_length }} m</m>
                    </div>
                    @endif
                    
                    @if($portofolio->specificationBuilding->page_area != 0)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Luas lahan (m2)</p>
                        <m >{{ ($portofolio->specificationBuilding->page_area) }}</m>
                    </div>
                    @endif

                    @if($portofolio->specificationBuilding->building_area != 0)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Luas bangunan (m2)</p>
                        <m>{{ ($portofolio->specificationBuilding->building_area) }}</m>
                    </div>
                    @endif

                    @if($portofolio->specificationBuilding->floor != 0)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-lantai.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Type</p>
                        <m>{{ $portofolio->specificationBuilding->floor }}</m>
                    </div>
                    @endif

                    @if($portofolio->specificationBuilding->bedroom != 0)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-kamar-tidur.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Kamar tidur</p>
                        <m>{{ $portofolio->specificationBuilding->bedroom }}</m>
                    </div>
                    @endif

                    @if($portofolio->specificationBuilding->bathroom != 0)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-kamar-mandi.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Kamar mandi</p>
                        <m>{{ $portofolio->specificationBuilding->bathroom }}</m>
                    </div>
                    @endif
                  @endif

                  @if($portofolio->specificationInterior != null)
                    @if($portofolio->specificationInterior->type != "")
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-jenis-interior.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Jenis Ruang</p>
                        <m>{{ $portofolio->specificationInterior->type }}</m>
                    </div>
                    @endif
                    @if($portofolio->specificationInterior->style != "")
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Style Interior</p>
                        <m>{{ $portofolio->specificationInterior->style }}</m>
                    </div>
                    @endif
                    @if($portofolio->specificationInterior->room_area != 0)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('logo/Logo-luas-lahan.png') }}" alt="">
                        <p style="font-size: 12px; margin-bottom: 0;">Luas Ruangan</p>
                        <m>{{ $portofolio->specificationInterior->room_area }}</m>
                    </div>
                    @endif
                  @endif
              </div>

              <hr>
              <h5 style="color: #9A9A9A"><strong>Tags</strong></h5>
              <div class="mb-3">
                @foreach($portofolio->tags as $key=>$value)
                <span class="badge rounded-pill text-white bg-dark">{{ $value->tag }}</span>
                @endforeach
              </div>
          </div>
        </div>
      </div>

    </div>

    <section>
        <div class="container" data-aos="fade-up">
            <div class="row">
              @foreach($last as $key=>$value)
                <div class="col-md-3">
                    <div class="card rounded mb-3 border-0 shadow h-100">
                        <img height="200px" style="object-fit: cover" src="{{ asset('images/'.$value->images[0]->image) }}" alt="">
                        <div class="p-2 px-4">
                          <a href="{{ route('portofolio.detail', $value->id) }}">
                            <h4 class="mt-2" style="color: #000000"><strong>{{ $value->name }}</strong></h4>
                          </a>
                          <!-- <p>{{ $value->description }}</p> -->
                        </div>
                    </div>
                </div>
              @endforeach
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
  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="https://unpkg.com/@popperjs/core@2') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('mamba/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('mamba/assets/js/main.js') }}"></script>
  <script src="{{ asset('lightgallery/js/lightgallery.min.js') }}"></script>

  <!-- lightgallery plugins -->
  <script src="{{ asset('lightgallery/js/lg-thumbnail.min.js') }}"></script>
  <script src="{{ asset('lightgallery/js/lg-fullscreen.min.js') }}"></script>
  <script src="{{ asset('lightgallery/js/lg-share.min.js') }}"></script>
  <script src="{{ asset('lightgallery/js/lg-zoom.min.js') }}"></script>
  <script src="{{ asset('lightgallery/js/lg-video.min.js') }}"></script>
  <script src="{{ asset('lightgallery/js/lg-utils.min.js') }}"></script>
  <script src="{{ asset('lightgallery/js/lg-autoplay.min.js') }}"></script>

  <script>
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
    });
  </script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
  <script>
    function copyText() {
      navigator.clipboard.writeText
          ("{{ url()->current() }}");
    }

    function openGallery(params) {
      console.log("anjay gurinjay");
    }
  </script>
  <script>
    lightGallery(document.getElementById('lightgallery'), {
      //plugins: [lgAutoplay]
    });
  </script>
</body>

</html>