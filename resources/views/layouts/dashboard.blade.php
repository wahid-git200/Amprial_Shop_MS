<!DOCTYPE html>
<html lang="en" dir="rtl">

  
<!-- Mirrored from bootstrapget.com/demos/adminday-bootstrap-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Aug 2025 21:23:08 GMT -->
<head >
    <meta charset="utf-8" />
    @yield('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title','داشبورد')</title>
 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery/">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="{{asset('dash_assets/images/favicon.svg')}}" />

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="{{asset('dash_assets/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('dash_assets/fonts/bootstrap/bootstrap-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('dash_assets/css/main.min.css')}}" />

    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{asset('dash_assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}" />
    @yield('style')
  </head>

   <body dir="rtl">
        <!-- Page wrapper start -->
        <div class="page-wrapper">
            <!-- Main container start -->
            <div class="main-container">
                <!-- saidbar -->
                @include('partials.saidbar')
                
                <div class="app-container">
                    @include('partials.dash_headder')
                    <div class="app-body">
                        @yield('content')
                    </div>
                </div>
                   
            </div>
        </div>




        <!-- *************
			************ JavaScript Files *************
		************* -->
        <!-- Required jQuery first, then Bootstrap Bundle JS -->
        <script src="{{asset('dash_assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('dash_assets/js/bootstrap.bundle.min.js')}}"></script>

        <!-- *************
                ************ Vendor Js Files *************
            ************* -->

        <!-- Overlay Scroll JS -->
        <script src="{{asset('dash_assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
        <script src="{{asset('dash_assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>

        <!-- Apex Charts -->
        <script src="{{asset('dash_assets/vendor/apex/apexcharts.min.js')}}"></script>
        <script src="{{asset('dash_assets/vendor/apex/custom/graphs/custom-sparkline.js')}}"></script>
        <script src="{{asset('dash_assets/vendor/apex/custom/analytics/delivery.js')}}"></script>
        <script src="{{asset('dash_assets/vendor/apex/custom/analytics/statistics.js')}}"></script>
        <script src="{{asset('dash_assets/vendor/apex/custom/analytics/sparkline.js')}}"></script>

        <!-- Newsticker JS -->
        <script src="{{asset('dash_assets/vendor/newsticker/newsTicker.min.js')}}"></script>
        <script src="{{asset('dash_assets/vendor/newsticker/custom-newsTicker.js')}}"></script>

        <!-- Custom JS files -->
        <script src="{{asset('dash_assets/js/custom.js')}}"></script>
        @yield('script')
  </body>


<!-- Mirrored from bootstrapget.com/demos/adminday-bootstrap-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Aug 2025 21:27:22 GMT -->
</html>