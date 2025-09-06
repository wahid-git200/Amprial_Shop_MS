@extends('layouts.app')

@section('title', 'درباره ما')

{{-- hedder --}}
@section('banner')
   <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>درباره ما </h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
            <li style="font-size: 20px;"><a href="{{ route('pages.home') }}">خانه </a></li>
            <li style="font-size: 20px; color:rgb(183, 183, 184);">/ درباره ما</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
 
    @endsection
    {{-- end of hedder --}}
@section('main')
      <section id="testimonials" class="testimonials" style="padding-bottom: 0;">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            
            <p style="font-size: 20px">
                ما افتخار داریم که با 10 سال تحربه بهترین اجناس را از مشهور ترین کامپنی های جهان <br>وارد و به دسترس شما مشتریان عزیز قرار میدهم 
               
               
            </p>
          </div>

      </section>
      <!-- End Testimonials Section -->

      <!--  Start Counter Section  -->
      <div id="stats-counter" class="call-to-action stats-counter section" style="background-color: rgba(0,0,0,0.5)">
        <div class="container" data-aos="fade-up">
          <div class="row gy-4 align-items-center">
            <div class="col-lg-4">
              <div class="stats-item d-flex flex-column align-items-center">
                <div class="icon circle">
                  <img src="{{asset('assets/images/icons/happy-clients.svg')}}" alt="icon" />
                </div>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="35"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p><span>کامپنی واردات</span> </p>
              </div>
              <!-- End Stats Item -->
            </div>
            <div class="col-lg-4">
              <div class="stats-item d-flex flex-column align-items-center">
                <div class="icon circle">
                  <img
                    src="{{asset('assets/images/icons/complete-projects.svg')}}"
                    alt="icon"
                  />
                </div>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="1000"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p><span>مشتری فعال</span></p>
              </div>
              <!-- End Stats Item -->
            </div>
            <div class="col-lg-4">
              <div class="stats-item d-flex flex-column align-items-center">
                <div class="icon circle">
                  <img src="{{asset('assets/images/icons/hours-support.svg')}}" alt="icon" />
                </div>
                <span
                  data-purecounter-start="0"
                  data-purecounter-end="10"
                  data-purecounter-duration="1"
                  class="purecounter"
                ></span>
                <p><span>سال تجربه کاری </span></p>
              </div>
              <!-- End Stats Item -->
            </div>
          </div>
        </div>
      </div>

            <div id="clients" class="clients section" style="padding: 50px;">
        <div class="container" data-aos="zoom-out">
          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide">
                <img
                  src="{{asset('assets/images/clients/client-1.png')}}"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="{{asset('assets/images/clients/hp_logo.png')}}"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="{{asset('assets/images/clients/apple_logo.webp')}}"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="{{asset('assets/images/clients/dell_logo.png')}}"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="{{asset('assets/images/clients/client-5.png')}}"
                  class="img-fluid"
                  alt=""
                />
              </div>

            </div>
          </div>
        </div>
      </div>
      <!--  End Counter Section  -->
            <section>
        <div class="container" id="featured">
          <div class="section-header" data-aos="fade-up" data-aos-delay="100">
            <h2>چرا باید مارا انتخاب کنید؟</h2>
          </div>
          <div class="row">
            <!-- start  left -->
            <div class="col-md-4 left">
              <div class="list-wrap" data-aos="fade-up" data-aos-delay="100">
                <div class="description">
                  <h4>تجربه</h4>
                  <p>
                    تجربه 10 ساله در عرصه واردات اجناس اصل و باکیفیت از مشهور ترین کامپنی های جهان
                  </p>
                </div>
                <div class="icon">
                  <img src="{{asset('assets/images/icons/icon-1.svg')}}" alt="icon" style="width:70px;" />
                </div>
              </div>

              <div class="list-wrap" data-aos="fade-up" data-aos-delay="400">
                <div class="description">
                  <h4>رضایت مشتری</h4>
                  <p>
                         رضایت مشتری در راس معاملات ما قرار دارد
                  </p>
                </div>
                <div class="icon">
                  <img src="{{asset('assets/images/icons/icon-2.svg')}}" alt="icon" style="width:70px;" />
                </div>
              </div>

              <div class="list-wrap" data-aos="fade-up" data-aos-delay="500">
                <div class="description">
                  <h4>اطمینان</h4>
                  <p>
                   ما همیشه اجناس اصل و باکیفیت وارد میکنیم
                  </p>
                </div>
                <div class="icon">
                  <img src="{{asset('assets/images/icons/icon-3.svg')}}" alt="icon" style="width:70px;" />
                </div>
              </div>
            </div>
            <!-- end  left -->

            <!-- start  center -->
            <div class="col-md-4 p-4 p-sm-5 center">
              <div
                class="list-center-wrap"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                <div class="center-icon">
                  <img src="{{asset('assets/images/features.jpg')}}" alt="icon"  />
                </div>
              </div>
            </div>
            <!-- end  center -->
            <!-- start  right -->
            <div class="col-md-4 right">
              <div class="list-wrap" data-aos="fade-up" data-aos-delay="100">
                <div class="icon">
                  <img src="{{asset('assets/images/icons/icon-4.svg')}}" alt="icon" style="width:70px;"/>
                </div>
                <div class="description">
                  <h4>قیمت</h4>
                  <p>
                    با مناسب ترین نرخ اجناس را به فروش میرسانیم
                  </p>
                </div>
              </div>

              <div class="list-wrap" data-aos="fade-up" data-aos-delay="200">
                <div class="icon">
                  <img src="{{asset('assets/images/icons/icon-5.svg')}}" alt="icon" style="width:70px;"/>
                </div>
                <div class="description">
                  <h4>خدمات پس از فروش</h4>
                  <p>
                    تبدیل یا خرید اجناس پس از فروش
                  </p>
                </div>
              </div>

              <div class="list-wrap" data-aos="fade-up" data-aos-delay="500">
                <div class="icon">
                  <img src="{{asset('assets/images/icons/icon-6.svg')}}" alt="icon" style="width:70px;"/>
                </div>
                <div class="description">
                  <h4>راهنمایی</h4>
                  <p>
                    راهنمایی درس و کامل در رابطه به استفاده جنس
                  </p>
                </div>
              </div>
            </div>
            <!-- end  right -->
          </div>
        </div>
      </section>
@endsection
