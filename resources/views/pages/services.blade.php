@extends('layouts.app')

@section('title', 'خدمات ما')


{{-- hedder --}}
@section('banner')
   <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>خدمات ما</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
            <li style="font-size: 20px;"><a href="{{ route('pages.home') }}">خانه </a></li>
            <li style="font-size: 20px; color:rgb(183, 183, 184);">/ خدمات ما</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
 
    @endsection
    {{-- end of hedder --}}
@section('main')
  <div id="services" class="section">
        <div class="top-icon-box position-relative">
          <div class="container position-relative">
              @include('partials.services')
              </div>
          </div>
        </div>
  </div>
@endsection
