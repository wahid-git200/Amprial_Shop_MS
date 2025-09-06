
@extends('layouts.dashboard')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title','تحلیل ها')
    
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
 

@php
    $monthsNames = [
        1 => 'حمل', 2 => 'ثور', 3 => 'جوزا', 4 => 'سرطان',
        5 => 'اسد', 6 => 'سنبله', 7 => 'میزان', 8 => 'عقرب',
        9 => 'قوس', 10 => 'جدی', 11 => 'دلو', 12 => 'حوت'
    ];
@endphp

<form id="analysisForm"
      action="{{ route('admin.analysis.filter') }}"
      method="POST"
      style="padding: 11px 11px 30px 11px; background: #007ad7; margin: 0 auto 25px; border-radius: 5px;">
    @csrf
    <h2 style="text-align: center; color:#fff;">تحلیل ها</h2>

    <div class="container" style="width: 60%">
        <!-- فیلد سال -->
        <label class="form-label" for="abc5" style="color: #fff; font-size: 17px; transform: translateX(-38px);">سال</label>
        <select class="form-select" id="abc5" name="year" aria-label="Default select example">
          @if(!empty($years))
            @foreach($years as $year)
                <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>
                    {{ $year }}
                </option>
            @endforeach
            @else
            <option value="" selected>هیچ دیتایی وجود ندارد</option>
        @endif
        </select>

        <!-- فیلد ماه -->
        <label class="form-label" for="monthSelect" style="color: #fff; font-size: 17px; transform: translateX(-38px);">ماه</label>
        <select class="form-select" id="monthSelect" name="month">
            @foreach($yearMonths[$currentYear] ?? [] as $month)
                <option value="{{ $month }}" {{ $month == $currentMonth ? 'selected' : '' }}>
                    {{ $monthsNames[$month] ?? $month }}
                </option>
            @endforeach
        </select>
    </div>
</form>


<div id="results" style="margin-top:20px; color:#333; background:#f9f9f9; padding:10px; border-radius:5px;"></div>
                <!-- Row start -->
            <div class="row" style="align-items: stretch;">
              <div class="col-xl-3 col-sm-6 col-12" style="flex: 1">
                <div class="card mb-4 rounded-4 py-2 bg-light-blue">
                  <div class="card-body d-flex align-items-center text-white">
                    <div class="icon-box lg p-4 rounded-4 me-3 shadow-solid-rb border border-white">
                      <i class="bi bi-pie-chart fs-3 lh-1"></i>
                    </div>
                    <div class="m-0">
                      <h5 class="fw-light mb-1 ">فروشات</h5>
                      <h2 class="m-0  total_sell" style="margin-right: 13px !important;">0</h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 col-12" style="flex: 1">
                <div class="card mb-4 rounded-4 py-2 bg-light-green">
                  <div class="card-body d-flex align-items-center text-white">
                    <div class="icon-box lg p-4 rounded-4 me-3 shadow-solid-rb border border-white">
                      <i class="bi bi-sticky fs-3 lh-1"></i>
                    </div>
                    <div class="m-0">
                      <h5 class="fw-light mb-1">خرید ها</h5>
                      <h2 class="m-0  total_buy" style="margin-right: 13px !important;">0</h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 col-12" style="flex: 1">
                <div class="card mb-4 rounded-4 py-2 bg-purple">
                  <div class="card-body d-flex align-items-center text-white">
                    <div class="icon-box lg p-4 rounded-4 me-3 shadow-solid-rb border border-white">
                      <i class="bi bi-emoji-smile fs-3 lh-1"></i>
                    </div>
                    <div class="m-0">
                      <h5 class="fw-light mb-1">همه محصولات</h5>
                      <h2 class="m-0 all_products" style="margin-right: 13px !important;">0</h2>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- Row end -->



            <!-- Row start -->
            <div class="row">
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">فروشات</h5>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <h1 class="lh-1 d-flex align-items-center justify-content-center   total_sell_money" style="direction: ltr;">
                        0 
                        <i class="bi bi-arrow-up-right-circle text-success fs-3 ms-2"></i>
                      </h1>
                      <span class="badge bg-primary-subtle text-primary">
                        8% higher than last month
                      </span>
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
                      <h1 class="lh-1 d-flex align-items-center justify-content-center  total_buy_money" style="direction: ltr;">
                        0
                        <i class="bi bi-arrow-up-right-circle text-success fs-3 ms-2"></i>
                      </h1>
                      <span class="badge bg-danger-subtle text-danger">
                        6% higher than last month
                      </span>
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
                      <h1 class="lh-1 d-flex align-items-center justify-content-center  total_withdrawal_money" style="direction: ltr;">
                        0
                        <i class="bi bi-arrow-up-right-circle text-success fs-3 ms-2"></i>
                      </h1>
                      <span class="badge bg-warning-subtle text-warning">
                        9% higher than last month
                      </span>
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
                      <h1 class="lh-1 d-flex align-items-center justify-content-center net_income" style="direction: ltr;">
                        0
                        <i class="bi bi-arrow-down-right-circle text-danger fs-3 ms-2"></i>
                      </h1>
                      <span class="badge bg-primary-subtle text-primary">
                        3% higher than last month
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
<div class="col-sm-12" style="margin-top: 20px; box-shadow: 1px 6px 7px gray;">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title" style="text-align: center; background: #007ad7; padding: 10px; border-radius: 4px; color: #fff;">فروخته شده این ماه</h5>
        </div>
        <div class="card-body table-responsive">
            <table id="sellsTable" class="table table-bordered align-middle m-0">
                <thead>
                    <tr style="background-color: rgb(177, 173, 173); text-align:center;">
                        <th>عکس</th>
                        <th>کتگوری</th>
                        <th>نام</th>
                        <th>قیمت</th>
                        <th>تعداد</th>
                        <th>قیمت کل</th>
                        <th>مشخصات</th>
                        <th>تاریخ فروش</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- AJAX content --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-sm-12" style="margin-top: 40px; box-shadow: 1px 6px 7px gray;">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title" style="text-align: center; background: #007ad7; padding: 10px; border-radius: 4px; color: #fff;">خریداری شده این ماه</h5>
        </div>
        <div class="card-body table-responsive">
            <table id="buysTable" class="table table-bordered align-middle m-0">
                <thead>
                    <tr style="background-color: rgb(177, 173, 173); text-align:center;">
                        <th>عکس</th>
                        <th>کتگوری</th>
                        <th>نام</th>
                        <th>قیمت</th>
                        <th>تعداد</th>
                        <th>قیمت کل</th>
                        <th>مشخصات</th>
                        <th>تاریخ خرید</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- AJAX content --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-sm-12" style="margin-top: 40px; box-shadow: 1px 6px 7px gray;">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title" style="text-align: center; background: #007ad7; padding: 10px; border-radius: 4px; color: #fff;">برداشتی های نقدی این ماه</h5>
        </div>
        <div class="card-body table-responsive">
            <table id="withdrawalsTable" class="table table-bordered align-middle m-0">
                <thead>
                    <tr style="background-color: rgb(177, 173, 173); text-align:center;">
                        <th>آی دی</th>
                        <th>مقدار</th>
                        <th>موضوع</th>
                        <th>تاریخ</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- AJAX content --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

            </div>
            
            

@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

  
function loadFinanceData(year, month) {
    $.ajax({
        url: "{{ route('admin.finance.filter') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            year: year,
            month: month
        },
        success: function (data) {
            // فروش‌ها
            let sellsHtml = "";
            $.each(data.sells, function(i, sell) {
                sellsHtml += `<tr>
                    <td style="text-align:center">
                        ${sell.image ? `<img src="{{ asset('') }}${sell.image}" style="width:8rem; border-radius:10px;">` : ''}
                    </td>
                    <td style="text-align:center">${sell.product_category}</td>
                    <td style="text-align:center">${sell.product_name}</td>
                    <td style="text-align:center">${sell.price}</td>
                    <td style="text-align:center">${sell.quantity}</td>
                    <td style="text-align:center">${sell.total_price}</td>
                    <td>
                      <div class="overflow_Controller">
                        ${sell.properties && Object.keys(sell.properties).length > 0
                            ? `<ul>` + Object.entries(sell.properties).slice(0,5)
                                .map(([k,v]) => `<li>${k} : ${v}</li>`).join('') + `</ul>`
                            : 'مشخصات نیست'
                        }
                      </div>
                    </td>
                    <td style="text-align:center">${sell.jalali_date}</td>


                </tr>`;
            });

            $('#sellsTable tbody').html(sellsHtml);

            // خرید‌ها
            let buysHtml = "";
                $.each(data.buys, function(i, buy) {
                    buysHtml += `<tr>
                        <td style="text-align:center">
                            ${buy.image ? `<img src="{{ asset('') }}${buy.image}" style="width:8rem; border-radius:10px;">` : ''}
                        </td>
                        <td style="text-align:center">${buy.product_category}</td>
                        <td style="text-align:center">${buy.product_name}</td>
                        <td style="text-align:center">${buy.price}</td>
                        <td style="text-align:center">${buy.quantity}</td>
                        <td style="text-align:center">${buy.total_price}</td>
                        <td>
                          <div class="overflow_Controller">
                            ${buy.properties && Object.keys(buy.properties).length > 0
                                ? `<ul>` + Object.entries(buy.properties).slice(0,5)
                                    .map(([k,v]) => `<li>${k} : ${v}</li>`).join('') + `</ul>`
                                : 'مشخصات نیست'
                            }
                                </div>
                        </td>
                        <td style="text-align:center">${buy.jalali_date}</td>
                    </tr>`;
                });
            $('#buysTable tbody').html(buysHtml);

            // برداشت‌ها
            let withdrawalsHtml = "";
            $.each(data.withdrawals, function(i, withdrawal) {
                withdrawalsHtml += `<tr>
                    <td style="text-align:center">#${withdrawal.id}</td>
                    <td style="text-align:center">${withdrawal.amount}<sub><span>af</span></sub></td>
                    <td style="text-align:center">${withdrawal.description}</td>
                    <td style="text-align:center">${withdrawal.jalali_date}</td>
                </tr>`;
            });
            $('#withdrawalsTable tbody').html(withdrawalsHtml);

            $('.all_products').text(data.totalStock);
            $('.total_sell').text(data.totalSalesQty);
            $('.total_sell_money').html(data.totalSalesPrice + '<sub>af</sub>');
            $('.total_buy').text(data.totalPurchasesQty);
            $('.total_buy_money').html(data.totalPurchasesPrice + '<sub>af</sub>');
            $('.total_withdrawal_money').html(data.totalWithdrawals + '<sub>af</sub>');

            // Calculate net income with currency
            let netIncome = data.totalSalesPrice-(data.totalPurchasesPrice + data.totalWithdrawals) ;
            $('.net_income').html(netIncome + '<sub>af</sub>');
            

        }
    });
}



// وقتی سال/ماه تغییر کرد
$('#abc5, #monthSelect').on('change', function() {
    let year = $('#abc5').val();
    let month = $('#monthSelect').val();

    // آپدیت ماه‌ها اگر سال تغییر کرد
    if ($(this).attr('id') === 'abc5') {
        let yearMonths = @json($yearMonths);
        let monthNames = @json($monthsNames);

        $('#monthSelect').empty();
        $.each(yearMonths[year], function (i, m) {
            $('#monthSelect').append($('<option>', {value:m,text:monthNames[m]}));
        });
        month = $('#monthSelect').val();
    }

    loadFinanceData(year, month);
});

// بارگذاری اولیه
loadFinanceData("{{ $currentYear }}","{{ $currentMonth }}");

</script>
@endsection