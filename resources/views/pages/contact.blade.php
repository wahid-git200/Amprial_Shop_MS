@extends('layouts.app')

@section('title', 'ارتباط با ما')

{{-- hedder --}}
@section('banner')
   <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>ارتباط با ما</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li style="font-size: 20px;"><a href="{{ route('pages.home') }}">خانه </a></li>
          <li style="font-size: 20px; color:rgb(183, 183, 184);">/ ارتباط با ما</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
 
    @endsection
    {{-- end of hedder --}}
@section('main')
       <div id="contact" class="contact-section section">

        <div class="container">
          <section class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="title">
                        <h2>راه های ارتباط</h2>
                        <p style="font-size: 20px">همین هالا با ما تماس بگیرید</p>
                    </div>
                    <div class="content">
                        <!-- Info-1 -->
                        <div class="info">
                            <i class="bi bi-telephone-inbound-fill mr-15"></i>
                            <h4 class="d-inline-block" style="font-size: 20px">نمبر تماس:
                                <br>
                                <span style="font-size: 15px">0773454544 , 0783456363</span></h4>
                        </div>
                        <!-- Info-2 -->
                        <div class="info">
                            <i class="bi bi-envelope-fill mr-15"></i>
                            <h4 class="d-inline-block" style="font-size: 20px">ایمیل:
                                <br>
                                <span style="font-size: 15px">amperial@gmail.com</span></h4>
                        </div>
                        <!-- Info-3 -->
                        <div class="info">
                            <i class="bi bi-geo-alt-fill mr-15"></i>
                            <h4 class="d-inline-block" style="font-size: 20px">آدرس:<br>
                                <span style="font-size: 15px">برچی - تانگ تیل - مارکیت احمدیان - منزل 2 - دوکان نمبر 35</span></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    @include('partials.contact')
                </div>
            </div>
        </div>
    </section>
        </div>
      </div>
@endsection
