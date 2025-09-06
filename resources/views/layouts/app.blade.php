<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>@yield('title', 'صفحه اصلی')</title>
    <meta content="" name="Technoit - IT Solutions & Business Services Multipurpose Responsive Website Template">
    <meta name="description" content="Technoit - IT Solutions & Business Services Multipurpose Responsive Website Template">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="" name="ZRTHEMES">

    <!-- Favicons -->
    {{-- {{ asset('') }} --}}
    <link href="{{ asset('assets/images/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/images/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&amp;family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&amp;display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->

    <!-- Font Awesome CDN (latest version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-y6qcm5cQ6b2C2oSp1f9QnI5U+2Zw3og0MbZ+eLGEVa2pD0qxHquGV+Lw0R+RlB6LB+WgWBHDLZ5HRwzYszs5Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/stylesheets/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('assets/stylesheets/styles.css') }}" id="theme-style" rel="stylesheet">
    @yield('style')

   <style>
    body{
        background-image: url("{{ asset('assets/images/banner.jpg') }}");
        background-position:center;
        background-repeat: no-repeat;
        background-size: cover   ;
        background-attachment: fixed;     
    }
   </style>


</head>
<body>

    <!--headder -->
    <header id="header" class="header d-flex align-items-center sticked stikcy-menu">
        @include('partials.headder')
    </header>   
    <!--end of headder -->

    
    {{-- <div class="container"> --}}
        @yield('banner')
    {{-- </div> --}}

    @yield('main')



    <!--  Footer  -->
    <footer id="footer" class="footer-section">
        @include('partials.footer')
    </footer>
        
    <!-- End of  Footer  -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center active">
        <i class="bi bi-arrow-up-short"></i>
    </a>

  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  @yield('script')
  <script src="{{ asset('assets/javascripts/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/javascripts/plugins.js') }}"></script>
  <script src="{{ asset('assets/javascripts/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/javascripts/validator.min.js') }}"></script>
  <script src="{{ asset('assets/javascripts/contactform.js') }}"></script>
  <script src="{{ asset('assets/javascripts/particles.min.js') }}"></script>
  <script src="{{ asset('assets/javascripts/script.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/javascripts/main.js') }}"></script>

</body>
</html>
