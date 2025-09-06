



@php
    $images = json_decode($product->images)
@endphp

@extends('layouts.app')

@section('title', $product->name)

@section('style')
        <link rel="stylesheet" href="{{asset('assets/stylesheets/item_detail.css')}}">

<style>
.product-card img {
    max-height: 400px;
    object-fit: contain;
}

/* افکت روی کارت ویژگی‌ها */
.property-item {
    transition: 0.3s;
}
.property-item:hover {
    background-color: #e8f0fe;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* ریسپانسیو */
@media (max-width: 768px) {
    .product-card img {
        max-height: 250px;
    }
}

@media (min-width: 768px) {
    .col-md-8 {
        flex: 0 0 auto;
        /* width: 66.66666667%; */
        width: 100%;
    }
}
</style>

@endsection

{{-- hedder --}}
@section('banner')
   <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>{{$product->name}}</h2>
          </div>
        </div>
      </div>
    </div>
    <nav style="padding: 20px ">
    </nav>
  </div><!-- End Breadcrumbs -->
 
@endsection
    {{-- end of hedder --}}
@section('main')

<section style="padding-top: 10px">
   <div class="container my-5">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <!-- کارت محصول -->
            <div class="product-card shadow rounded overflow-hidden bg-white">

                <!-- اسلایدر تصاویر بالای کارت -->
                <div id="productCarousel" style="background: #dedede94" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if($product->images)
                            @php $images = json_decode($product->images, true); @endphp
                            @foreach($images as $key => $img)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($img) }}" class="d-block w-100" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/images/no-image.png') }}" class="d-block w-100" alt="No Image">
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">قبلی</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">بعدی</span>
                    </button>
                </div>

                <!-- جزئیات پایین کارت -->
                <div class="p-4">
                    <h2 class="mb-2" style="text-align: center">{{ $product->name }}</h2>
                    <h4 class="text-success mb-3">قیمت: {{ number_format($product->price) }} افغانی</h4>
                    <p class="mb-2"><strong>موجودی:</strong> {{ $product->stock }}</p>

                    <!-- ویژگی‌ها -->
                    <div class="mt-3">
                        <h5 class="mb-2">ویژگی‌ها:</h5>
                        @if($product->attributes && $product->attributes->count() > 0)
                            <div class="row row-cols-1 row-cols-md-2 g-2">
                                @foreach($product->attributes as $prop)
                                    <div class="col">
                                        <div class="property-item p-2 rounded d-flex justify-content-between align-items-center bg-light hover-effect">
                                            <span>{{ $prop->name }}</span>
                                            <span class="badge bg-primary">{{ $prop->value }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">هیچ ویژگی‌ای ثبت نشده است.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>

@endsection



@section('script')
    <script src="{{asset('assets/javascripts/item_detail.js')}}"></script>
@endsection


    