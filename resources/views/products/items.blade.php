

@extends('layouts.app')

@section('title', "خدمات-".$category_products->name)

@section('style')

<style>
.rowse{
  padding: 8px
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
            <h2>{{$category_products->name}}</h2>
          </div>
        </div>
      </div>
    </div>
    <nav style="padding: 1px 20px 1px 1px">
        <div class="app-content-actions">
          <input class="search-bar" placeholder="Search..." type="text">

        </div>
    </nav>
  </div><!-- End Breadcrumbs -->
 
    @endsection
    {{-- end of hedder --}}


  @section('main')

    <main id="main">
      <section>
        <div class="box">
        @forelse($category_products->products as $product)
          <div class="product-card">
            {{-- بخش بالا --}}
            <div class="card-top">
              @if($product->images)
                @php $images = json_decode($product->images, true); @endphp
                @if(!empty($images))
                  <img src="{{ asset($images[0]) }}" alt="{{ $product->name }}">
                @endif
              @endif
              
              <div class="stats-container" >

                <div  class="rowse">
                    <span class="product_price" style="font-size: 1.1rem">نام:</span>
                    <span class="product_name">{{ $product->name }}</span>
                </div>
                <hr style="margin: 5px">
                <div class="rowse">
                    <span class="product_price" style="font-size: 1.1rem">قیمت:</span>
                    <span class="product_name">{{ number_format($product->price) }} افغانی</span>
                </div>
                <hr style="margin: 5px">
                <div class="rowse">
                    <span class="product_price" style="font-size: 1.1rem">تعداد:</span>
                    <span class="product_name">{{ $product->stock }}</span>
                </div>
                <hr style="margin: 5px">
              </div>

              <div class="card-overlay">
                <h4>مشخصات</h4>
                <ul>
                  @forelse($product->attributes as $attr)
                    <li>{{ $attr->name }} : {{ $attr->value }}</li>
                  @empty
                    <li>ویژگی‌ای ثبت نشده</li>
                  @endforelse
                </ul>
              </div>
            </div>


            {{-- بخش پایین: دکمه‌ها --}}
            <div class="card-bottom">
              <a class="btn_detail btn btn-primary"
                href="{{ route('product.detail', $product->id) }}"
                style="width: 100%; height: 100%">
                جزعیات بیشتر
              </a>
            </div>
          </div>



        @empty
          <p  style="margin: auto auto; font-size: 20px; font-weight: bold; color: #d46565;">محصولی در این کتگوری وجود ندارد.</p>
        @endforelse
      </div>
      </section>
      </main>
      
  @endsection




    