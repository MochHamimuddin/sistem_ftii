<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FTII UHAMKA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('landingpage/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('landingpage/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('landingpage/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <link href="{{asset('landingpage/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    @include('landingpage.header')
    <main id="main">
        @yield('content')
    </main>
  @include('landingpage.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('landingpage/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('landingpage/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('landingpage/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('landingpage/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('landingpage/assets/js/main.js')}}"></script>
  <script src="https://kit.fontawesome.com/4a4251cc63.js" crossorigin="anonymous"></script>
</body>

</html>
