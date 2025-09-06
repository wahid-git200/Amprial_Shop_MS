@extends('layouts.dashboard')

@section('style')
<style>
/* Reset */
*{margin:0;padding:0;box-sizing:border-box;}

/* Container */
.box {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 1.5rem;
  width: 100%;
  max-width: 1000px;
  margin: 0 auto;
}

/* Product Card */
.product-card {
  background:#fff;
  border-radius:15px;
  overflow:hidden;
  box-shadow:0px 6px 16px rgba(0,0,0,0.08);
  display:flex;
  flex-direction:column;
  transition:transform .2s ease, box-shadow .2s ease;
}
.product-card:hover {
  transform:translateY(-5px);
  box-shadow:0px 8px 22px rgba(0,0,0,0.12);
}

/* Top Section */
.card-top {
  position:relative;
  flex:1;
  overflow:hidden;
}
.card-top img {
  width:100%;
  height:180px;
  object-fit:contain;
  background:#f9f9f9;
}

/* Overlay inside top (NOT covering buttons) */
.card-overlay {
  position:absolute;
  left:0;
  top:100%;
  width:100%;
  height:100%;
  background:rgba(255,255,255,0.95);
  padding:15px;
  transition:top .3s ease;
  overflow-y:auto;
}
.card-top:hover .card-overlay {
  top:0;
}
.card-overlay h4 {
  margin-bottom:10px;
  font-size:1rem;
  font-weight:bold;
  color:#2f3640;
}
.card-overlay ul {
  list-style:none;
  padding:0;
  margin:0;
}
.card-overlay ul li {
  font-size:0.85rem;
  padding:5px 0;
  border-bottom:1px dashed #ccc;
}

/* Info inside top (default view) */
.stats-container {
  padding:0.8rem 1rem;
}
.stats-container .product_name {
  font-size:1rem;
  font-weight:600;
  color:#2f3640;
}
.stats-container .product_price {
  color:#44bd32;
  font-size:1rem;
  font-weight:700;
  float:right;
}

/* Bottom Section (always visible buttons) */
.card-bottom {
  padding:10px;
  border-top:1px solid #eee;
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:8px;
  background:#fafafa;
}
.card-bottom button {
  background:#0097e6;
  color:#fff;
  border:none;
  padding:8px;
  border-radius:8px;
  font-size:0.8rem;
  font-weight:bold;
  cursor:pointer;
  transition:0.2s;
}
.card-bottom button:hover {
  background:#0984e3;
}

/* Modal Form Styles */
.modal-body .form-control { margin-bottom: 1rem; }
span{
    padding: 0 7px;
}
</style>
@endsection

@section('title', $category->name)

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
      <div style="font-weight: bold; text-align: center; font-size: 20px; color: #fff; background-color: #3edc3e94; padding: 10px; margin: 8px; border-radius: 6px;">
          {{ session('success') }}
      </div>
  @endif
  @if(session('error'))
      <div style="font-weight: bold; text-align: center; font-size: 20px; color: #fff; background-color: #dc413e94; padding: 10px; margin: 8px; border-radius: 6px;">
          {{ session('error') }}
      </div>
  @endif
<div class="container">

  <div class="box">
    @forelse($category->products as $product)
      <div class="product-card">
        {{-- بخش بالا --}}
        <div class="card-top">
          @if($product->images)
            @php $images = json_decode($product->images, true); @endphp
            @if(!empty($images))
              <img src="{{ asset($images[0]) }}" alt="{{ $product->name }}">
            @endif
          @endif
           
          <div class="stats-container">
            <div>
              <span class="product_price">آی دی:</span>
              <span class="product_name">{{ $product->id }}</span>
            </div>
            <hr style="margin: 5px">
            <div>
                <span class="product_price">نام:</span>
                <span class="product_name">{{ $product->name }}</span>
            </div>
            <hr style="margin: 5px">
            <div>
                <span class="product_price">قیمت:</span>
                <span class="product_name">{{ number_format($product->price) }} افغانی</span>
            </div>
            <hr style="margin: 5px">
            <div>
                <span class="product_price">تعداد:</span>
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
          <button class="btn_sell" data-id="{{$product->id}}">فروش</button>
          <button  class="btn_bay" data-id="{{$product->id}}">خرید</button>
          <button data-bs-toggle="modal" data-bs-target="#editModal-{{ $product->id }}">ویرایش</button>
          <button class="btn_remove btn" data-id="{{ $product->id }}" >حذف</button>
        </div>
      </div>

      {{-- Modal فرم ویرایش محصول --}}
      <div class="modal fade" id="editModal-{{ $product->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header" style="background:#007ad7; color:#fff;">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              <h5 class="modal-title" style="text-align: center; width: 100%;" id="editModalLabel-{{ $product->id }}">ویرایش {{ $product->name }}</h5>
            </div>
            <div class="modal-body" style="padding:1.5rem; background:#f0f8ff;">
              <div class="row">
                <div class="col-lg-3 col-sm-6 mb-3">
                  <label class="form-label">نام</label>
                  <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="col-lg-3 col-sm-6 mb-3">
                  <label class="form-label">قیمت</label>
                  <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>
                <div class="col-lg-3 col-sm-6 mb-3">
                  <label class="form-label">تعداد</label>
                  <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>
                <div class="col-lg-3 col-sm-6 mb-3">
                  <label class="form-label">کتگوری</label>
                  <select name="category_id" class="form-select">
                    @foreach ($categories as $cat)
                      <option value="{{ $cat->id }}" @if($product->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                            <div class="mb-3">
                <label class="form-label">تصاویر</label>
                <input type="file" name="images[]" multiple class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">توضیحات</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">ویژگی‌ها</label>
                <div class="xbt">
                  @foreach($product->attributes as $index => $attr)
                  <div class="row mb-3">
                    <div class="col-lg-5">
                      <input type="text" class="form-control" placeholder="نام ویژگی" name="attributes[{{ $index }}][name]" value="{{ $attr->name }}" required>
                    </div>
                    <div class="col-lg-5">
                      <input type="text" class="form-control" placeholder="مقدار ویژگی" name="attributes[{{ $index }}][value]" value="{{ $attr->value }}" required>
                    </div>
                    <div class="col-lg-2 d-flex align-items-end">
                      <button type="button" class="btn btn-secondary btn_remove_attribute">حدف</button>
                    </div>
                  </div>
                  @endforeach
                </div>
                <button type="button" class="btn btn-primary btn_add_property mt-2">اضافه ویژگی</button>
              </div>


            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
            </div>
          </form>
        </div>
      </div>

    @empty
      <p  style="margin: auto auto; font-size: 20px; font-weight: bold; color: #d46565;">محصولی در این کتگوری وجود ندارد.</p>
    @endforelse
  </div>
</div>
 <div class="wrapperss" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.516);z-index: 9999;">
                      <form method="POST" action="{{route('admin.sell.store')}}" class="form-sign form-signinn" style="z-index: 99999">       
                        @csrf
                    <h2 class="form-signin-headingg">ثبت فروش ها</h2>
                    <input type="number" class="form-control" name="price" placeholder="قیمت" required="" autofocus="" />
                    <input type="hidden" class="form-control-hidden-id" name="product_id"  />
                    <input type="hidden" class="form-control-hidden-type" name="product_type"  />
                    <input style="margin-top:10px;" type="number" class="form-control" name="quantity" placeholder="تعداد"  required=""/>      
                    <div style="    padding-top: 20px;">
                        <button class="btn btn-primary  btn-block" type="submit">تایید</button>   
                        <button class="btn btn-outline-secondary  cnacle_btn_ts btn-block" type="reset">لغو</button>  
                    </div>
                    </form>
                </div>
                
                <div class="wrapperss_bay" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.516);z-index: 9999;">
                      <form method="POST" action="{{route('admin.purchase.store')}}" class="form-sign form-signinn_b" style="z-index: 99999">       
                        @csrf
                    <h2 class="form-signin-headingg_b">ثبت خرید ها</h2>
                    <input type="number" class="form-control" name="price" placeholder="قیمت" required="" autofocus="" />
                    <input type="hidden" class="form-control-hidden-id_d" name="product_id"  />
                    <input type="hidden" class="form-control-hidden-type_d" name="product_type"  /> 
                    <input style="margin-top: 10px;" type="number" class="form-control" name="quantity" placeholder="تعداد" required="" autofocus="" />
                    <div style="padding-top: 20px;">
                        <button class="btn btn-primary  btn-block" type="submit">تایید</button>   
                        <button class="btn btn-outline-secondary btn-block cnacle_btn_t" type="reset">لغو</button>  
                    </div>
                    </form>
                </div>
@endsection

@section('script')
<script>
document.querySelectorAll('.btn_remove').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.dataset.id;
        if (!confirm('آیا مطمئن هستید که می‌خواهید این محصول را حذف کنید؟')) return;

        fetch(`/admin/products/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.closest('.product-card').remove();
                alert(data.success);
            } else {
                alert('حذف با خطا مواجه شد.');
            }
        })
        .catch(error => {
            console.error(error);
            alert('خطایی رخ داده است.');
        });
    });
});





    
    let propIndex = {{ $category->products->isNotEmpty() ? $category->products->first()->attributes->count() : 0 }};

    document.querySelectorAll('.btn_add_property').forEach(btn => {
        btn.addEventListener('click', () => {
            const container = btn.closest('.modal-body').querySelector('.xbt');
            container.insertAdjacentHTML('beforeend', `
                <div class="row mb-3">
                    <div class="col-lg-5">
                      <input type="text" class="form-control" placeholder="نام ویژگی" name="attributes[${propIndex}][name]" required>
                    </div>
                    <div class="col-lg-5">
                      <input type="text" class="form-control" placeholder="مقدار ویژگی" name="attributes[${propIndex}][value]" required>
                    </div>
                    <div class="col-lg-2 d-flex align-items-end">
                      <button type="button" class="btn btn-secondary btn_remove_attribute">حدف</button>
                    </div>
                </div>
            `);
            propIndex++;
        });
    });

    document.addEventListener('click', function(e){
        if(e.target.classList.contains('btn_remove_attribute')){
            e.target.closest('.row').remove();
        }
    });


            const wrapperss = document.querySelector('.wrapperss');
            const form = document.querySelector('.form-signinn');

            // نمایش فرم وقتی روی دکمه فروش کلیک شد
            document.querySelectorAll('.btn_sell').forEach(el => {
                el.addEventListener('click', () => {
                    const id = el.dataset.id;
                    const type = el.dataset.type;
                    wrapperss.style.opacity = '1';
                    wrapperss.style.visibility = 'visible';
                    wrapperss.style.transform="scale(1)";
                    document.querySelector('.form-control-hidden-id').value = id;
                    document.querySelector('.form-control-hidden-type').value = type;
                });
            });

            // کلیک روی فضای خاکستری بیرونی -> بسته شدن فرم
            wrapperss.addEventListener('click', e => {
                // اگر روی خود wrapperss کلیک شد (نه فرم)، فرم بسته شود
                if (e.target === wrapperss) {
                    wrapperss.style.opacity = '0';
                    wrapperss.style.visibility = 'hidden';
                    wrapperss.style.transform="scale(0.5)";
                }
            });

            document.querySelector('.cnacle_btn_ts').addEventListener('click',function(){
                wrapperss.style.opacity = '0';
                wrapperss.style.visibility = 'hidden';
                wrapperss.style.transform="scale(0.5)";
            });

            // جلوگیری از بسته شدن وقتی روی فرم کلیک شد
            form.addEventListener('click', e => {
                e.stopPropagation();
            });

            const  wrapperss_bay = document.querySelector('.wrapperss_bay');
            const form_b = document.querySelector('.form-signinn_b');

            // نمایش فرم وقتی روی دکمه فروش کلیک شد
            document.querySelectorAll('.btn_bay').forEach(el => {
                el.addEventListener('click', () => {
                    const id_d = el.dataset.id;
                    const type_d = el.dataset.type;
                    wrapperss_bay.style.opacity = '1';
                    wrapperss_bay.style.visibility = 'visible';
                    wrapperss_bay.style.transform="scale(1)";
                    document.querySelector('.form-control-hidden-id_d').value = id_d;
                    document.querySelector('.form-control-hidden-type_d').value = type_d;
                });
            });

            // کلیک روی فضای خاکستری بیرونی -> بسته شدن فرم
            wrapperss_bay.addEventListener('click', e => {
                // اگر روی خود wrapperss کلیک شد (نه فرم)، فرم بسته شود
                if (e.target === wrapperss_bay) {
                    wrapperss_bay.style.opacity = '0';
                    wrapperss_bay.style.visibility = 'hidden';
                    wrapperss_bay.style.transform="scale(0.5)";
                }
            });
            document.querySelector('.cnacle_btn_t').addEventListener('click',function(){
                wrapperss_bay.style.opacity = '0';
                wrapperss_bay.style.visibility = 'hidden';
                wrapperss_bay.style.transform="scale(0.5)";
            });


            // جلوگیری از بسته شدن وقتی روی فرم کلیک شد
            form_b.addEventListener('click', e => {
                e.stopPropagation();
            })



</script>
@endsection
