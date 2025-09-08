@extends('layouts.dashboard')
@section('title','داشبورد')
@php
use Morilog\Jalali\Jalalian;
$x=1;
$y=1;
$z=1;
$sells_money=0;
$buys_money=0;
$given_money=$total_withdrawal;

@endphp
@foreach ($sells as $sell)                          
  @php 
    $sells_money+=$sell->total_price
  @endphp
@endforeach

@foreach ($buys as $buy)                          
  @php 
    $buys_money+=$buy->total_price
  @endphp
@endforeach
@section('content')

        
           @if ($errors->any())
  <ul>
    <li style="font-weight: bold; text-align: center; font-size: 20px; color: #fff; background-color: #dc413e94; padding: 10px; margin-top: 8px; border-radius: 6px;">
    @foreach ($errors->all() as $error)
    {{ $error }} <hr>
    @endforeach
    </li>
  </ul>
  @endif
  @if(session('success'))
      <div style="font-weight: bold; text-align: center; font-size: 20px; color: #fff; background-color: #3edc3e94; padding: 10px; margin-top: 8px; border-radius: 6px;">
          {{ session('success') }}

      </div>
  @endif

   <div style="padding: 8px; background: #007ad7; margin: 0 auto 15px; border-radius: 10px;">
          <h5 style="text-align: center; color:#fff">موجودی ها</h5>
         </div>
     
            <div class="row" style="justify-content: center">
              @foreach ($categories as $category)    
                <div class="col-xl-2 col-sm-4">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="text-center">
                        <div class="icon-box md bg-purple rounded-2 mt-n4 mb-4">
                          <i class="bi bi-bag-check fs-4 text-white"></i>
                        </div>
                        <h2 class="m-0">{{$category->products_count}}</h2>
                        <p class="m-0 text-uppercase small" style="font-size: 15px"><b>{{$category->name}}</b></p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            <!-- Row end -->

            <!-- Row end -->
                     <div style="padding: 8px; background: #007ad7; margin: 20px auto 15px; border-radius: 10px;">
                      <h5 style="text-align: center; color:#fff"> درآمد و مصارف</h5>
                    </div>
                        <div class="row">
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">فروشات</h5>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h3 class="lh-1 d-flex align-items-center justify-content-center" style=" direction: ltr;">
                        {{$sells_money}}<sub><span>af</span></sub>
                        <i class="bi bi-arrow-up-right-circle text-success fs-3 ms-2"></i>
                      </h3>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">خرید</h5>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h3 class="lh-1 d-flex align-items-center justify-content-center" style=" direction: ltr;">
                        {{$buys_money}}<sub><span>af</span></sub>
                        <i class="bi bi-arrow-up-right-circle text-success fs-3 ms-2"></i>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">برداشتی</h5>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h3 class="lh-1 d-flex align-items-center justify-content-center" style=" direction: ltr;">
                        {{$given_money}}<sub><span>af</span></sub>
                        <i class="bi bi-arrow-up-right-circle text-success fs-3 ms-2"></i>
                      </h3>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">درآمد خالص</h5>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h3 class="lh-1 d-flex align-items-center justify-content-center" style=" direction: ltr;">
                        {{  $sells_money - ($buys_money + $given_money)}}<sub><span>af</span></sub>
                        <i class="bi bi-arrow-down-right-circle text-danger fs-3 ms-2"></i>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div> 

            {{-- end row --}}
            <div class="row" style="justify-content: center; direction: ltr;">
              <div class="col-xl-4 col-sm-12 col-12" >
                <div class="card mb-4 bg-light-blue">
                  <div class="card-body d-flex align-items-center text-white">
                    <div class="icon-box lg p-4 rounded-3 me-3 shadow-solid-rb border border-white">
                      <i class="bi bi-pie-chart fs-3 lh-1"></i>
                    </div>
                    <div class="m-0">
                      <h5 class="fw-light mb-1"> فروخته شده در این ماه</h5>
                      <h2 class="m-0">{{$number_of_sells_in_this_month}}</h2>
                    </div>
                    <div class="ms-auto text-body" id="spark1"></div>
                  </div>
                </div>
              </div>
              
              <div class="col-xl-4 col-sm-12 col-12">
                <div class="card mb-4 bg-orange">
                  <div class="card-body d-flex align-items-center text-white">
                    <div class="icon-box lg p-4 rounded-3 me-3 shadow-solid-rb border border-white">
                      <i class="bi bi-star fs-3 lh-1"></i>
                    </div>
                    <div class="m-0">
                      <h5 class="fw-light mb-1">خریداری شده در این ماه</h5>
                      <h2 class="m-0">{{$number_of_buys_in_this_month}}</h2>
                    </div>
                    <div class="ms-auto text-body" id="spark3"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
              <div class="col-sm-12" style=" margin-top: 20px; box-shadow: 1px 6px 7px gray;">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title" style="text-align: center; background: #007ad7; padding: 10px; border-radius: 4px; color: #fff;">فروخته شده این ماه</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered align-middle m-0">
                        <thead >
                          <tr style="">
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">عکس</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">کتگوری</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">نام</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">قیمت</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">تعداد</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">قیمت کل</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">مشخصات</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">تاریخ فروش</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">تغیرات</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($sells as $sell)
                          
                           @php
                              $x++;
                           @endphp
                           @if($x%2==0)
                                <tr>
                                    <td style=" text-align:center">
                                      {{-- <h1>{{$image}}   bro!!!</h1> --}}

                                      @if ($sell->image)
                                          <img src="{{ asset($sell->image) }}" class="img-4x rounded-3 h-auto" alt="{{ $sell->product_name }}" style="width: 8rem; border-radius: 10px !important;" />
                                       @endif
                                    </td>
                                    <td style=" text-align:center">{{$sell->product_category}}</td>
                                    <td style=" text-align:center">{{$sell->product_name}}</td>
                                    <td style=" text-align:center">{{$sell->price}}<sub><span>af</span></sub></td>
                                    <td style="direction: ltr ; text-align:center">{{$sell->quantity}} </td>
                                    <td style=" text-align:center">{{$sell->total_price}}<sub><span>af</span></sub></td>
                                    <td style=" " style="overflow: auto">
                                      <div class="overflow_Controller">
                                          @if($sell->properties && count($sell->properties) > 0)
                                                <ul style="    padding: 0 27px 0 0;">
                                                    @foreach(array_slice($sell->properties, 0, 5, true) as $name => $value)
                                                        <li>{{ $name }} : {{ $value }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <li>مشخصات نیست</li>
                                            @endif
                                        </div>
                                    </td>                       
                                    <td style="text-align:center">
                                        {{ Jalalian::fromDateTime($sell->created_at)->format('Y/m/d') }}
                                    </td>
                                    <td style="text-align:center;">
                                      <a href="javascript:void(0);" class="btn_edit "  style="text-decoration: none;"
                                      class="btn_edits"
                                          data-type="sale" 
                                          data-id="{{ $sell->id }}" 
                                          data-name="{{ $sell->product_name }}" 
                                          data-category="{{ $sell->product_category }}" 
                                          data-quantity="{{ $sell->quantity }}" 
                                          data-price="{{ $sell->price }}">
                                          <i class="bi bi-pencil-square" style="font-size:22px; padding:3px; background:#00ff379c; color:#0000ffb5; border-radius:3px;"></i>
                                        </a>
                                       <a href="{{ route('admin.sales.delete', $sell->id) }}"
                                          class="btn_delete btn_deletes"
                                          onclick="return confirm('آیا مطمئن هستید که می‌خواهید این فروش را حذف کنید؟');"
                                          style="text-decoration: none; margin-right:10px">
                                            <i title="حذف" class="bi bi-trash"
                                              style="font-size: 22px; padding: 3px; background-color: #ff00009c; color: #0000ffb5; border-radius: 3px;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @else
                              <td style=" text-align:center;  background-color: rgb(217 , 217 ,217); ">
                                @if ($sell->image)
                                        <img src="{{ asset($sell->image) }}" class="img-4x rounded-3 h-auto" alt="{{ $sell->id}}" style="width: 8rem; border-radius: 10px !important;" />
                                   @endif
                                      </td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$sell->product_category}}</td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$sell->product_name}}</td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$sell->price}}<sub><span>af</span></sub>   </td>
                                    <td style="direction: ltr ; text-align:center; background-color: rgb(217 , 217 ,217); ">{{$sell->quantity}}</td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$sell->total_price}}<sub><span>af</span></sub> </td>
                                   <td style="background-color: rgb(217, 217, 217);">
                                       <div class="overflow_Controller">
                                            @if($sell->properties && count($sell->properties) > 0)
                                                <ul style="    padding: 0 27px 0 0;">
                                                    @foreach(array_slice($sell->properties, 0, 5, true) as $name => $value)
                                                        <li>{{ $name }} : {{ $value }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <li>مشخصات نیست</li>
                                            @endif
                                       </div>
                                    </td>
                                      <td style="text-align:center;  background-color: rgb(217 , 217 ,217);">                           
                                        {{ Jalalian::fromDateTime($sell->created_at)->format('Y/m/d') }}
                                    </td>
                                    <td style="text-align:center;   background-color: rgb(217 , 217 ,217);">
                                      <a href="javascript:void(0);" class="btn_edit"  style="text-decoration: none;"
                                      class="btn_edits"
                                        data-type="sale" 
                                        data-id="{{ $sell->id }}" 
                                        data-name="{{ $sell->product_name }}" 
                                        data-category="{{ $sell->product_category }}" 
                                        data-quantity="{{ $sell->quantity }}" 
                                        data-price="{{ $sell->price }}">
                                        <i class="bi bi-pencil-square" style="font-size:22px; padding:3px; background:#00ff379c; color:#0000ffb5; border-radius:3px;"></i>
                                      </a>
                                        
                                        <a href="{{ route('admin.sales.delete', $sell->id) }}"
                                          class="btn_delete btn_deletes"
                                          onclick="return confirm('آیا مطمئن هستید که می‌خواهید این فروش را حذف کنید؟');"
                                          style="text-decoration: none; margin-right:10px">
                                            <i title="حذف" class="bi bi-trash"
                                              style="font-size: 22px; padding: 3px; background-color: #ff00009c; color: #0000ffb5; border-radius: 3px;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        
                    @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12" style=" margin-top: 40px;box-shadow: 1px 6px 7px gray;">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title" style="text-align: center; background: #007ad7; padding: 10px; border-radius: 4px; color: #fff;">خریداری شده این ماه</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered align-middle m-0">
                        <thead >
                          <tr style="">
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">عکس</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">کتگوری</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">نام</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">قیمت</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">تعداد</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">قیمت کل</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">مشخصات</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">تاریخ فروش</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">تغیرات</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($buys as $buy)
                          
                           @php
                             $y++;
                           @endphp
                           @if($y%2==0)
                                <tr>
                                    <td style=" text-align:center">
                                      @if ($buy->image)
                                          <img src="{{ asset($buy->image) }}" class="img-4x rounded-3 h-auto" alt="{{ $buy->product_name }}" style="width: 8rem; border-radius: 10px !important;" />
                                        @endif
                                    </td>
                                    <td style=" text-align:center">{{$buy->product_category}}</td>
                                    <td style=" text-align:center">{{$buy->product_name}}</td>
                                    <td style=" text-align:center">{{$buy->price}}<sub><span>af</span></sub></td>
                                    <td style="direction: ltr ; text-align:center">{{$buy->quantity}}</td>
                                    <td style=" text-align:center">{{$buy->total_price}}<sub><span>af</span></sub></td>
                                    <td>
                                      <div class="overflow_Controller">
                                          @if($buy->properties && count($buy->properties) > 0)
                                              <ul style=" padding: 0 27px 0 0;">
                                                  @foreach(array_slice($buy->properties, 0, 5, true) as $name => $value)
                                                      <li>{{ $name }} : {{ $value }}</li>
                                                  @endforeach
                                              </ul>
                                          @else
                                              <li>مشخصات نیست</li>
                                          @endif
                                      </div>
                                    </td>
                                    <td  style=" text-align:center"class="persian-date">
                                      {{ Jalalian::fromDateTime($buy->created_at)->format('Y/m/d') }}
                                    </td>
                                    <td style=" text-align:center;   ">
                                        <a href="javascript:void(0);" class="btn_edit"  style="text-decoration: none;"
                                        class="btn_edits"
                                          data-type="purchase" 
                                          data-id="{{ $buy->id }}" 
                                          data-name="{{ $buy->product_name }}" 
                                          data-category="{{ $buy->product_category }}" 
                                          data-quantity="{{ $buy->quantity }}" 
                                          data-price="{{ $buy->price }}">
                                          <i class="bi bi-pencil-square" style="font-size:22px; padding:3px;      background:#00ff379c; color:#0000ffb5; border-radius:3px;"></i>
                                        </a>
                                        <a href="{{ route('admin.purchases.delete', $buy->id) }}"
                                          class="btn_delete btn_deletes"
                                            onclick="return confirm('آیا مطمئن هستید که می‌خواهید این خرید را حذف کنید؟');"
                                            style="text-decoration: none; margin-right:10px">
                                              <i title="حذف" class="bi bi-trash"
                                                style="font-size: 22px; padding: 3px; background-color: #ff00009c; color: #0000ffb5; border-radius: 3px;"></i>
                                          </a>
                                    </td>                           
                                </tr>
                            @else
                              <td style=" text-align:center;  background-color: rgb(217 , 217 ,217); ">
                                          @if ($buy->image)
                                         
                                          <img src="{{ asset($buy->image) }}" class="img-4x rounded-3 h-auto" alt="{{ $buy->product_name }}" style="width: 8rem; border-radius: 10px !important;" />
                                        @endif
                                    </td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$buy->product_category}}</td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$buy->product_name}}</td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$buy->price}}<sub><span>af</span></sub></td>
                                    <td style="direction: ltr ; text-align:center; background-color: rgb(217 , 217 ,217); ">{{$buy->quantity}}</td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$buy->total_price}}<sub><span>af</span></sub></td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">
                                     <div class="overflow_Controller">
                                        @if($buy->properties && count($buy->properties) > 0)
                                              <ul style=" padding: 0 27px 0 0;">
                                                  @foreach(array_slice($buy->properties, 0, 5, true) as $name => $value)
                                                      <li>{{ $name }} : {{ $value }}</li>
                                                  @endforeach
                                              </ul>
                                          @else
                                              <li>مشخصات نیست</li>
                                          @endif
                                     </div>
                                    </td>                           
                                    <td  style=" text-align:center; background-color: rgb(217 , 217 ,217); "class="persian-date">
                                      {{ Jalalian::fromDateTime($buy->created_at)->format('Y/m/d') }}
                                    </td>
                                    <td style=" text-align:center;  background-color: rgb(217 , 217 ,217);">
                                       <a href="javascript:void(0);" class="btn_edit"  style="text-decoration: none;"
                                       class="btn_edits"
                                          data-type="purchase" 
                                          data-id="{{ $buy->id }}" 
                                          data-name="{{ $buy->product_name }}" 
                                          data-category="{{ $buy->product_category }}" 
                                          data-quantity="{{ $buy->quantity }}" 
                                          data-price="{{ $buy->price }}">
                                          <i class="bi bi-pencil-square" style="font-size:22px; padding:3px; text-decoration:none; background:#00ff379c; color:#0000ffb5; border-radius:3px;"></i>
                                        </a>
                                        <a href="{{ route('admin.purchases.delete', $buy->id) }}"
                                          class="btn_delete btn_deletes"
                                          onclick="return confirm('آیا مطمئن هستید که می‌خواهید این خرید را حذف کنید؟');"
                                          style="text-decoration: none; margin-right:10px">
                                            <i title="حذف" class="bi bi-trash"
                                              style="font-size: 22px; padding: 3px; background-color: #ff00009c; color: #0000ffb5; border-radius: 3px;"></i>
                                        </a> 
                                    </td> 
                                </tr>
                            @endif
                        
                    @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>    



          <div class="row">

              <div class="col-sm-12 " style=" margin-top: 40px; box-shadow: 1px 6px 7px gray;" >
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title" style="text-align: center; background: #007ad7; padding: 10px; border-radius: 4px; color: #fff;">برداشتی های نقدی این ماه</h5>
                  </div>
                  <div class="card-body">

                    <!-- Table start -->
                                        <div class="table-responsive">
                      <table class="table table-bordered align-middle m-0">
                        <thead >
                          <tr style="">
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">آی دی</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">مقدار</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">موضوع</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">تاریخ</th>
                            <th style=" text-align:center; border-color:gray;  background-color: rgb(177, 173, 173);">تغیرات</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($withdrawals as $withdrawal)
                          
                           @php
                             $z++;
                           @endphp
                           @if($z%2==0)
                                <tr>
                                    <td style=" text-align:center">#{{$withdrawal->id}}</td>
                                    <td style=" text-align:center">{{$withdrawal->amount}}<sub><span>af</span></sub></td>
                                    <td style=" text-align:center">{{$withdrawal->description}}</td>
                                    <td  style=" text-align:center"class="persian-date">
                                      {{ Jalalian::fromDateTime($withdrawal->created_at)->format('Y/m/d') }}
                                    </td>
                                    <td style=" text-align:center;   ">

                                        <a href="javascript:void(0)" 
                                          class="btn_edit_withdrawal btn_edits"
                                          data-id="{{ $withdrawal->id }}"
                                          data-amount="{{ $withdrawal->amount }}"
                                          data-description="{{ $withdrawal->description }}"
                                          style="text-decoration: none;"
                                          data-bs-toggle="modal"
                                          data-bs-target="#withdrawalEditModal">
                                          <i class="bi bi-pencil-square" style="font-size:22px; padding:3px; background:#00ff379c; color:#0000ffb5; border-radius:3px;"></i>
                                        </a>

                                          <a href="{{ route('admin.withdrawal.delete', $withdrawal->id) }}"
                                            class="btn_deletes"
                                          onclick="return confirm('آیا برای حذف مطمئن هستید؟');"
                                          style="text-decoration: none; margin-right:10px">
                                            <i title="حذف" class="bi bi-trash"
                                              style="font-size: 22px; padding: 3px; background-color: #ff00009c; color: #0000ffb5; border-radius: 3px;"></i>
                                        </a>
                                    </td>                           
                                </tr>
                            @else
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">#{{$withdrawal->id}}</td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$withdrawal->amount}}<sub><span>af</span></sub></td>
                                    <td style=" text-align:center; background-color: rgb(217 , 217 ,217); ">{{$withdrawal->description}}</td>                          
                                    <td  style=" text-align:center; background-color: rgb(217 , 217 ,217); "class="persian-date">
                                      {{ Jalalian::fromDateTime($withdrawal->created_at)->format('Y/m/d') }}
                                    </td>
                                    <td style=" text-align:center;  background-color: rgb(217 , 217 ,217);">

                                <a href="javascript:void(0)" 

                                  class="btn_edit_withdrawal btn_edits"
                                  data-id="{{ $withdrawal->id }}"
                                  data-amount="{{ $withdrawal->amount }}"
                                  data-description="{{ $withdrawal->description }}"
                                  style="text-decoration: none;"
                                  data-bs-toggle="modal"
                                  data-bs-target="#withdrawalEditModal">
                                  <i class="bi bi-pencil-square" style="font-size:22px; padding:3px; background:#00ff379c; color:#0000ffb5; border-radius:3px;"></i>
                                </a>

                                        <a href="{{ route('admin.withdrawal.delete', $withdrawal->id) }}"
                                          class="btn_deletes"
                                          onclick="return confirm('آیا برای حذف مطمئن هستید؟');"
                                          style="text-decoration: none; margin-right:10px">
                                            <i title="حذف" class="bi bi-trash"
                                              style="font-size: 22px; padding: 3px; background-color: #ff00009c; color: #0000ffb5; border-radius: 3px;"></i>
                                        </a>
                                    </td> 
                                </tr>
                            @endif
                        
                    @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- Table end -->

                  </div>
                </div>
              </div>
          </div> 

          <!-- Modal ویرایش مشترک برای فروش و خرید -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="editForm" class="modal-content">
      @csrf
      @method('PUT')
      <div class="modal-header" style="background:#007ad7; color:#fff;">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        <h5 class="modal-title" id="editModalLabel" style="text-align: center; width:100%">ویرایش</h5>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>نام محصول</label>
          <input type="text" name="product_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>کتگوری</label>
          <input type="text" name="product_category" class="form-control">
        </div>
        <div class="mb-3">
          <label>تعداد</label>
          <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>قیمت</label>
          <input type="number" name="price" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
      </div>
    </form>
  </div>
</div>


<div class="modal fade" id="withdrawalEditModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="withdrawalEditForm" class="modal-content">
      @csrf
      @method('PUT') {{-- برای Laravel --}}
      <div class="modal-header" style="background:#007ad7; color:#fff;">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        <h5 class="modal-title" style="text-align: center; width:100%">ویرایش برداشت</h5>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>مبلغ</label>
          <input type="number" name="amount" id="edit_amount" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>توضیحات</label>
          <input type="text" name="description" id="edit_description" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
      </div>
    </form>
  </div>
</div>


@endsection

@section('script')
  <script>
    document.querySelectorAll('.btn_edit').forEach(btn => {
      btn.addEventListener('click', function() {
          const type = this.dataset.type; // 'sale' یا 'purchase'
          const id = this.dataset.id;
          const name = this.dataset.name;
          const category = this.dataset.category;
          const quantity = this.dataset.quantity;
          const price = this.dataset.price;

          const form = document.getElementById('editForm');
          form.action = `/admin/${type}s/${id}`; // مسیر PUT درست

          form.querySelector('input[name="product_name"]').value = name;
          form.querySelector('input[name="product_category"]').value = category;
          form.querySelector('input[name="quantity"]').value = quantity;
          form.querySelector('input[name="price"]').value = price;

          // نمایش modal
          const modal = new bootstrap.Modal(document.getElementById('editModal'));
          modal.show();
      });
  });


  
// Get the modal element
const withdrawalEditModalEl = document.getElementById('withdrawalEditModal');
const withdrawalEditModal = new bootstrap.Modal(withdrawalEditModalEl);

document.querySelectorAll('.btn_edit_withdrawal').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;
        const amount = this.dataset.amount;
        const description = this.dataset.description;

        const form = document.getElementById('withdrawalEditForm');

        // Set form action
        form.action = `/admin/withdrawals/${id}`;

        // Fill the input fields
        form.querySelector('input[name="amount"]').value = amount;
        form.querySelector('input[name="description"]').value = description;

        // Show the modal
        withdrawalEditModal.show();
    });
});


</script>

@endsection
    
