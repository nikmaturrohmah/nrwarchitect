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
          <li><a class="text-white nav-link scrollto" href="{{ url('/') }}#portfolio">Portfolio</a></li>
          <li><a class="text-white nav-link scrollto" href="{{ url('/') }}#contact">Contact</a></li>
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
          <div class="carousel-inner">
            @for($i = 0; $i < sizeof($portofolio->images); $i++)
              <div class="carousel-item {{ ($i == 0 ? 'active' : '' ) }}">
                  <img style="width: 100%; height: 500px; object-fit: cover" src="{{ asset('images/'.$portofolio->images[$i]->image) }}" class="rounded d-block" alt="Slide 1">
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
          <div class="card rounded p-4 mb-4 border-0 shadow">
              <h4><strong>{{ $portofolio->name }}</strong></h4>
              <p style="color: #9A9A9A; font-size: 14px">{{ $portofolio->description }}</p>
          </div>

          <div class="w-100 d-inline-flex justify-content-end">
            <div class="card rounded border-0 shadow">
              <div class="p-4">
                <h5 class="mb-4" style="color: #9A9A9A"><strong>Share this link via</strong></h5>
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
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Lebar lahan (m)</p>
                      <p>{{ $portofolio->specificationBuilding->land_width }}</p>
                  </div>
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Panjang lahan (m)</p>
                      <p>{{ $portofolio->specificationBuilding->land_length }}</p>
                  </div>
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Luas lahan (m2)</p>
                      <p>{{ ($portofolio->specificationBuilding->land_width*$portofolio->specificationBuilding->land_length) }}</p>
                  </div>
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Lebar bangunan (m)</p>
                      <p>{{ $portofolio->specificationBuilding->building_width }}</p>
                  </div>
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Panjang bangunan (m)</p>
                      <p>{{ $portofolio->specificationBuilding->building_length }}</p>
                  </div>
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Luas bangunan (m2)</p>
                      <p>{{ ($portofolio->specificationBuilding->building_width*$portofolio->specificationBuilding->building_length) }}</p>
                  </div>
                  @endif

                  @if($portofolio->specificationInterior != null)
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Style</p>
                      <p>{{ $portofolio->specificationInterior->style }}</p>
                  </div>
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Type</p>
                      <p>{{ $portofolio->specificationInterior->type }}</p>
                  </div>
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Kamar tidur</p>
                      <p>{{ $portofolio->specificationInterior->bedroom }}</p>
                  </div>
                  <div class="col-md-4 text-center">
                      <img src="{{ asset('logo/Logo-dimensi-lahan.png') }}" alt="">
                      <p style="font-size: 12px; margin-bottom: 0;">Kamar mandi</p>
                      <p>{{ $portofolio->specificationInterior->bathroom }}</p>
                  </div>
                  @endif
              </div>

              <hr>
              <h5 style="color: #9A9A9A"><strong>Tags</strong></h5>
              <div>
              @foreach($portofolio->tags as $key=>$value)
              <span class="badge rounded-pill bg-secondary">{{ $value->tag }}</span>
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
                    <div class="card rounded mb-3 border-0 shadow">
                        <img height="200px" style="object-fit: cover" src="{{ asset('images/'.$value->images[0]->image) }}" alt="">
                        <div class="p-2 px-4">
                          <a href="{{ route('detail', $value->id) }}">
                            <h4 class="mt-2"><strong>{{ $value->name }}</strong></h4>
                          </a>
                          <p>{{ $value->description }}</p>
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
  </script>
</body>

</html>