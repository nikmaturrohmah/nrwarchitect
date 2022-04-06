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
          <li><a class="text-white nav-link scrollto" href="{{ route('portofolio') }}">Portfolio</a></li>
          <li><a class="text-white nav-link scrollto" href="{{ url('/') }}#contact">Contact</a></li>
          <li><a class="text-white nav-link" href="{{ route('article') }}">Article</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
  <div class="container text-center pt-5">
    <B>Published {{\Carbon\Carbon::parse($article->created_at)->format('l');}}, {{\Carbon\Carbon::parse($article->created_at)->format('d F Y');}}</br></B>
    <j><strong>{{$article->title}}</strong></j>
    </br>
    <sj>{{$article->sub_title}}</sj>
</br>
    <div class="d-flex flex-wrap gap-1 justify-content-center mb-3">
      @foreach($article->tags as $key=>$value)
        <div style="width: fit-content"><span class="badge bg-secondary">#{{$value->tag}}</ta></span></div>
      @endforeach
    </div>
    <div class="mb-3">
      <img src="{{ asset('images/'.$article->cover_image) }}" class="rounded" style="width: 100%; height: 250px: object-fit: contain">
    </div>
  </div>

  <div class="container mb-3">
    <div class="row px-5">
    <div class="col-md-08S">{!! $article->paragraph !!}</div>
      <div class="col-md-10" style="color: #9A9A9A">{!! $article->description !!}</div>
      <div class="col-md-2">
        <div class="d-flex align-items-end flex-column gap-1">
          <sl class="mb-2" style="color: #000000"><strong>Share this link via</strong></sl>
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