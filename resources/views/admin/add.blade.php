
@extends('layouts.dashboard')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title','ایجاد')
    
@section('content')
 <div id="analysisForm"
      action="www.inex.html"
      method="POST"
      style="padding: 11px 11px 30px 11px; background: #007ad7; margin: 0 auto 0px; border-radius: 5px;">
     <h2 style="text-align: center; color:#fff;">ثبت جنس جدید</h2>
  </div> 
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
            <div class="row">
              <div class="col-sm-12">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="custom-tabs-container">
                      <ul class="nav nav-tabs" id="customTab" role="tablist">
                        <li class="nav-item" role="presentation" style="margin-left: 0;">
                          <a class="nav-link active" id="tab-one" data-bs-toggle="tab" href="#one" role="tab"
                            aria-controls="one" aria-selected="true"><b>جنس جدید</b></a>
                        </li>
                        <li class="nav-item" role="presentation" style="margin-right: 0;">
                          <a class="nav-link" id="tab-two" data-bs-toggle="tab" href="#two" role="tab"
                            aria-controls="two" aria-selected="false"><b>کتگوری ها</b></a>
                        </li>
                        <li class="nav-item" role="presentation" style="margin-right: 0;">
                          <a class="nav-link" id="tab-tree" data-bs-toggle="tab" href="#tree" role="tab"
                            aria-controls="tree" aria-selected="false"><b>ثبت برداشتی نقدی</b></a>
                        </li>

                      </ul>
                      <div class="tab-content" id="customTabContent">
                        <div class="tab-pane fade show active" id="one" role="tabpanel" >
                           <form action="{{route('admin.product.store')}}" class="activer" id="form-comp" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="col-sm-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <!-- Row start -->
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-6 col-12">
                                                    <div class="mb-3">

                                                        <div class="m-0">
                                                        <label class="form-label" for="abc5">کتگوری</label>
                                                        <select class="form-select" id="abc5" aria-label="Default select example" name="category_id" placeholder="chhc">
                                                            
                                                            @foreach ($categories as $catagory)
                                                                <option value="{{$catagory->id}}">{{$catagory->name}}</option>  
                                                            @endforeach

                                                        </select>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-4 col-12">
                                                    <div class="mb-3">
                                                    <label class="form-label" for="abc10">نام</label>
                                                    <input type="text" class="form-control" id="abc10" placeholder="نام را وارد کنید" required name="name" value="{{old('name')}}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-4 col-12">
                                                    <div class="mb-3">
                                                    <label class="form-label" for="abc11">قیمت</label>
                                                    <input type="number" class="form-control" id="abc11" placeholder="قیمت را وارد کنید" name="price" required value="{{old('price')}}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-4 col-12">
                                                    <div class="mb-3">
                                                    <label class="form-label" for="abc12">تعداد</label>
                                                    <input type="number" class="form-control" id="abc12" placeholder="تعداد را وارد کنید" required name="stock" value="{{old('stock')}}"  />
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="mb-5" style="margin-bottom: 1rem !important;">
                                                    <label for="abc23" class="form-label">عکس</label>
                                                    <input class="form-control" accept="image/*" type="file" id="abc23" multiple placeholder="یک یا چند عکس" required name="images[]"  />
                                                </div>
                                                <div class="mb-5" style="margin-bottom: 1rem !important;">   
                                                    <label class="form-label" for="abc4">توضیح در باره محصول</label>
                                                    <textarea class="form-control" rows="3" id="abc4" placeholder="توضیحات در باره جینس" name="description" value="{{old('description')}}"> </textarea>
                                                </div>
                                        </div>
                                        <!-- Row end -->
                                        <div class="bg-light bg-opacity-50 p-3 mb-3 fw-bold">مشخصات</div>
                                        <div class="row xbt">
                                            <div class="col-lg-3 col-sm-4 col-13">
                                                <div class="mb-3">
                                                    <label class="form-label" for="abc24">نام ویژگی</label>
                                                    <input type="text" class="form-control" id="abc24" placeholder="نام ویژگی را وارد کنید" required name="attributes[0][name]"   />
                                                </div>
                                            </div>
                                                <div class="col-lg-3 col-sm-4 col-12">
                                                    <div class="mb-3 ">
                                                        <label class="form-label" for="abc25">قیمت ویژگی</label>
                                                    
                                                        <div class="xxx" style="display: flex">
                                                            <input type="text" class="form-control" id="abc25" placeholder="مقدار ویژگی را وارد کنید" required required name="attributes[0][value]"   />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row" style="margin-right: 3%; width:70px">
                                            <p  class="btn btn-primary btn_add_property ">
                                                    اضافه
                                            </p>
                                        </div>
                                        {{-- <h4 style="background: red">مشخصات</h4>
                                        <div id="attributes-wrapper">
                                            <div class="attribute-row">
                                                <input type="text" name="attr_name[]" placeholder="نام ویژگی">
                                                <input type="text" name="attr_value[]" placeholder="مقدار ویژگی">
                                                <button type="button" class="remove-attr">حذف</button>
                                            </div>
                                        </div>
                                        <button type="button" id="add-attr">افزودن ویژگی</button> --}}

                                        <!-- Row end -->
                                    </div>
                                        <div class="card-footer">
                                            <div class="d-flex gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-primary " name='submit'>
                                                    ثبت
                                                </button>
                                                <button type="reset" class="btn btn-outline-secondary">
                                                    لغو
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="two" role="tabpanel">
                            
                        <div class="boxr">  <div style="background: #007ad7; height: 100%; text-align: center; color: #fff; padding: 10px; border-radius: 5px;"><h5>کتگوری های موجود</h5></div>
                                        <div class=" col-sm-12">
                                            <div class="card mb-4" style="    text-align: center;">
                                            <div class="card-body" style="width: 87%; margin: 0 auto; overflow-y: auto; " >
                                                <div class="table-responsive">
                                                <table class="table table-striped m-0" style="  min-width: 500px;">
                                                    <thead>
                                                    <tr>
                                                        <th >آی دی</th>
                                                        <th >نام</th>
                                                        <th >توضیحات</th>
                                                        <th >تغیرات</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($categories as $catagory)
                                                        <tr>
                                                            <td  style="direction: ltr">{{$catagory->id}}</td>
                                                            <td >{{$catagory->name}}</td>
                                                            <td >{{$catagory->discription}}</td>
                                                            <td >
                                                                        <a href="#"  style="text-decoration: none; "    data-id="{{ $catagory->id }}"  data-discription="{{$catagory->discription}}" class="update_btn btn_edits"  data-name="{{ $catagory->name }}">
                                                                            <i  title="تغیر"class="bi bi-pencil-square" style="font-size: 22px; padding: 3px; background-color: #00ff379c; color: #0000ffb5; border-radius: 3px;"></i>
                                                                        </a>
                                                                    <a class="btn_deletes" href="{{route('admin.catagory.delete',['id'=>$catagory->id])}}" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این کامپیوتر را حذف کنید؟');" style=" text-decoration: none; margin-right:10px"  >
                                                                            <i  title="حذف" class="bi bi-trash" style="font-size: 22px; padding: 3px; background-color: #ff00009c; color: #0000ffb5; border-radius: 3px;"></i>
                                                                        </a>                          
                                                                        <p  class="btn_bay btn_deletes" data-id="" data-type="App\Models\ProductComputers" style=" cursor: pointer; text-decoration: none; margin-right:10px;  display:inline" >
                                                                            <i title="اضافه کردن کتگوری" class="bi bi-plus-square" style="font-size: 22px; padding: 3px; background-color: #f6ea0b9c; color: #0000ffb5; border-radius: 3px;"></i>
                                                                        </p>                                                         
                                                                    </td> 
                                                        </tr>
                                                            
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                
                                                </div>
                                                @if (count($categories)==0)
                                                    <h5 style="padding: 13px; color: #ff0b0b;">هیچ کتگوری وجود ندارد!!</h5>
                                                            <p  class="btn_bay" data-id="" data-type="App\Models\ProductComputers" style=" cursor: pointer; text-decoration: none; margin-right:10px;  display:inline" >
                                                                            <i title="اضافه کردن کتگوری" class="bi bi-plus-square" style="font-size: 33px; padding: 3px; background-color: #00ff379c; color: #0000ffb5; border-radius: 3px;"></i>
                                                                        </p> 
                                                    @endif
                                            </div>
                                            </div>
                                        </div>
                        </div></div>

                        <div class="tab-pane fade" id="tree" role="tabpanel">
                                <form action="{{route('admin.withdrawal.store')}}" class="activer" id="form-comp" method="GET" enctype="multipart/form-data" >
                                @csrf
                                <div class="col-sm-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <!-- Row start -->
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-4 col-12">
                                                    <div class="mb-3">
                                                    <label class="form-label" for="abc10">مقدار</label>
                                                    <input type="number" class="form-control" id="abc10" placeholder="مقدار را وارد کنید" required name="amount" value="{{old('amount')}}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-4 col-12">
                                                    <div class="mb-3">
                                                    <label class="form-label" for="abc11">موضوع</label>
                                                    <input type="text" class="form-control" id="abc11" placeholder="موضوع را وارد کنید" name="description" required value="{{old('description')}}" />
                                                    </div>
                                                </div>
                                        </div>

                                    </div>
                                        <div class="card-footer">
                                            <div class="d-flex gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-primary " name='submit'>
                                                    ثبت
                                                </button>
                                                <button type="reset" class="btn btn-outline-secondary">
                                                    لغو
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                       <div class="wrapperss_bay" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.516);z-index: 9999;">
                      <form method="POST" action="{{route('admin.add_catagory.store')}}" class="form-sign form-signinn_b" style="z-index: 99999">       
                        @csrf
                    <h2 class="form-signin-headingg_b">ثبت کتگوری جدید</h2>
                    <input type="text" class="form-control form-control_name" name="name" placeholder="نام" required autofocus="" />
                     <textarea class="form-control form-control_discription" name="discription" id="discription" required placeholder="توضیح در باره کتگوری" cols="55" rows="4" style="margin-top: 5px"></textarea>
                    <input type="hidden" name="id" class="form-control-hidden-id_d" value="">
                    <div style="padding-top: 20px;">
                        <button class="btn btn-primary  btn-block" type="submit">تایید</button>   
                        <button class="btn btn-outline-secondary btn-block cnacle_btn_t" type="reset">لغو</button>  
                    </div>
                    </form>
                </div>

                



@endsection

@section('script')
            <script>
                const wrapperss_bay = document.querySelector('.wrapperss_bay');
                const form_b = document.querySelector('.form-signinn_b');
                const input_name = document.querySelector('.form-control-name');
                const input_id = document.querySelector('.form-control-hidden-id');

                // دکمه اضافه
                document.querySelectorAll('.btn_bay').forEach(el => {
                    el.addEventListener('click', () => {
                        wrapperss_bay.style.opacity = '1';
                        wrapperss_bay.style.visibility = 'visible';
                        wrapperss_bay.style.transform = 'scale(1)';


                        input_name.value = '';
                        input_id.value = '';
                    });
                });

                // دکمه ویرایش
               document.querySelectorAll('.update_btn').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault(); // جلوگیری از رفتار پیش‌فرض لینک

                        const id = this.dataset.id;       // گرفتن آیدی از data-id
                        const name = this.dataset.name;   // گرفتن نام از data-name
                        const discription= this.dataset.discription;

                        const wrapper = document.querySelector('.wrapperss_bay');
                        const inputId = document.querySelector('.form-control-hidden-id_d');
                        const inputName = document.querySelector('.form-control_name');
                        const inputDiscription = document.querySelector('.form-control_discription');
                        if(id!=""){
                        document.querySelector('.form-signin-headingg_b').textContent="بروزرسانی کتگوری";

                        // پر کردن فیلدهای فرم
                        inputId.value = id;
                        inputName.value = name;
                        inputDiscription.value = discription;
                        }

                        // نمایش فرم
                        wrapper.style.opacity = '1';
                        wrapper.style.visibility = 'visible';
                        wrapper.style.transform = 'scale(1)';
                    });
                });

                // بستن فرم با کلیک بیرونی یا دکمه لغو
                wrapperss_bay.addEventListener('click', e => {
                    if(e.target === wrapperss_bay){
                        wrapperss_bay.style.opacity = '0';
                        wrapperss_bay.style.visibility = 'hidden';
                        wrapperss_bay.style.transform = 'scale(0.5)';
                    }
                });
                document.querySelector('.cnacle_btn_t').addEventListener('click',function(){
                    wrapperss_bay.style.opacity = '0';
                    wrapperss_bay.style.visibility = 'hidden';
                    wrapperss_bay.style.transform = 'scale(0.5)';
                });

                // جلوگیری از بسته شدن فرم وقتی روی خود فرم کلیک شد
                form_b.addEventListener('click', e => e.stopPropagation());

    let propIndex = 1;
document.querySelector('.btn_add_property').addEventListener('click', function() {
    document.querySelector('.xbt').insertAdjacentHTML('beforeend', `
        <div class="row mb-3">
            <div class="col-lg-3 col-sm-4 col-12">
                <div class="mb-3">
                    <label class="form-label">نام ویژگی</label>
                    <input type="text" class="form-control" placeholder="نام ویژگی را وارد کنید" required name="attributes[${propIndex}][name]" />
                </div>
            </div>
            <div class="col-lg-3 col-sm-4 col-12">
                <div class="mb-3">
                    <label class="form-label">مقدار ویژگی</label>
                    <input type="text" class="form-control" placeholder="مقدار ویژگی را وارد کنید" required name="attributes[${propIndex}][value]" />
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-12 d-flex align-items-end">
                <p  class="btn btn-secondary btn_remove_attribute">حدف</p>
            </div>
        </div>
    `);
    propIndex++;

                        
                });

                document.querySelector('.xbt').addEventListener('click', function(e) {
                    if(e.target.classList.contains('btn_remove_attribute')) {
                        e.target.closest('.row').remove();
                        propIndex--;
                    }
                });
            </script>
@endsection