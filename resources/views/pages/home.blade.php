@extends('layouts.app')

@section('title', 'خانه')

{{-- hedder --}}
@section('banner')
    <section id="hero" class="hero sticked-header-offset">
        <div class="bgdiv"></div>
        <div id="particles-js"></div>
        <div id="repulse-circle-div"></div>
        <div class="container position-relative">
        <div class="row gy-5 aos-init aos-animate">
            <div
                class="col-lg-7 offset-lg-5 dark-bg order-lg-1 d-flex flex-column justify-content-start text-left caption"
                >
                <h2 data-aos="fade-up">
                فرشگاه سخت افزاری <span>امپریال</span
                ><span class="circle" data-aos="fade-right" data-aos-delay="800"
                    ></span
                >
                </h2>
                <p data-aos="fade-up" data-aos-delay="400" style="font-size: 20px">
                ما افتخار داریم تا بهترین لوازم کامپیوتری را با بهترین کیفیت از مشهور ترین کامپنی های جهان برای شما عرضه میکنیم
                </p>
                <div class="social" data-aos="fade-up" data-aos-delay="600">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="d-flex justify-content-start">
                <a href="{{route('pages.services')}}" class="btn-get-started mr-20 ttt" style="margin-left: 30px" data-aos="fade-up" data-aos-delay="800">خدمات ما</a>
                <a href="{{route('pages.contact')}}" class="btn-get-started ttt" data-aos="fade-up" data-aos-delay="1000">ارتباط با ما</a>
                </div>
            </div>
        </div>
    </div>
    </section>
    @endsection
    {{-- end of hedder --}}
@section('main')
 <main id="main">
      <!-- Start Service Section -->
      <div id="services" class="section">
        <div class="top-icon-box position-relative">
          <div class="container position-relative">
            <div class="section-header">
              <h2>خدمات ما</h2>
            </div>
              @include('partials.services')
          </div>
        </div>
      </div>
      <!-- End Service Section -->

      <!-- Featured -->
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
      <!-- Featured -->



      <!--  Testimonials Section  -->
      <section id="testimonials" class="testimonials" style="padding-bottom: 0;">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>درباره ما</h2>
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
      <!--  End Counter Section  -->

      <!--  Clients Section  -->
      <div id="clients" class="clients section">
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
      <!-- End Clients Section -->

      <!--  Our Team Section  -->
      <section id="team" class="team sections-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">
          <div class="section-header">
            <h2>پر فروش ترین ها</h2>
          </div>

          <div class="row gy-4">



            <div
              class="col-xl-3 col-md-6 d-flex aos-init aos-animate"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="member">
                <img
                  src="{{asset('assets/images/team/loptop1.webp')}}"
                  class="img-fluid"
                  alt=""
                />
                <h4>Dell Latitude 7430</h4>
                <hr style="margin: 0; padding:7px;">
                <span>نسل 12</span>
                <hr style="margin: 0; padding:7px;">
                <span>رم 16</span>
                <hr style="margin: 0; padding:7px;">
                <span>گرافیک 8GB</span>
                <hr style="margin: 0; padding:7px;">
                
              </div>
            </div>
            <div
              class="col-xl-3 col-md-6 d-flex aos-init aos-animate"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="member">
                <img
                  src="{{asset('assets/images/team/loptop22.webp')}}"
                  class="img-fluid"
                  alt=""
                />
                <h4>Dell Latitude 7430</h4>
                <hr style="margin: 0; padding:7px;">
                <span>نسل 12</span>
                <hr style="margin: 0; padding:7px;">
                <span>رم 16</span>
                <hr style="margin: 0; padding:7px;">
                <span>گرافیک 8GB</span>
                <hr style="margin: 0; padding:7px;">
                
              </div>
            </div>

            
            <!-- End Team Member -->

            <div
              class="col-xl-3 col-md-6 d-flex aos-init aos-animate"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="member">
                <img
                  src="{{asset('assets/images/team/loptop3.png')}}"
                  class="img-fluid"
                  alt=""
                />
                <h4>HP 2020</h4>
                <hr style="margin: 0; padding:7px;">
                <span>نسل 11</span>
                <hr style="margin: 0; padding:7px;">
                <span>رم 16</span>
                <hr style="margin: 0; padding:7px;">
                <span>گرافیک 12GB</span>
                <hr style="margin: 0; padding:7px;">
                
              </div>
            </div>

            <!-- End Team Member -->

            <div
              class="col-xl-3 col-md-6 d-flex aos-init aos-animate"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="member">
                <img
                  src="{{asset('assets/images/team/loptop3.png')}}"
                  class="img-fluid"
                  alt=""
                />
                <h4>HP Keypad Notebook</h4>
                <hr style="margin: 0; padding:7px;">
                <span>نسل 12</span>
                <hr style="margin: 0; padding:7px;">
                <span>رم 32</span>
                <hr style="margin: 0; padding:7px;">
                <span>گرافیک 8GB</span>
                <hr style="margin: 0; padding:7px;">
                
              </div>
            </div>


          </div>
        </div>
      </section>
      <!-- End Our Team Section -->



      <!--  Call To Action Section  -->
      <section id="call-to-action" class="call-to-action">
        <div
          class="container text-center aos-init aos-animate"
          data-aos="zoom-out"
        >
          <div class="row gy-4">
            <div class="col-lg-12">
              <h3>همین هالا از اجناس های ما دیدن نماید</h3>
              <p>
                
              </p>
              <a class="cta-btn ttt" href="{{route('pages.services')}}">اجناس های ما</a>
            </div>
          </div>
        </div>
      </section>
      <!-- End Call To Action Section -->


      <!-- Start Contact Section -->
      <div id="contact" class="contact-section section">
        <div class="section-header">
          <h2>ارتباط باما</h2>
        </div>
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
                    @include('partials\contact')
                </div>
            </div>
        </div>
    </section>
        </div>
      </div>
      <!-- End Contact Section -->
    </main>
    <!-- End #main -->
@endsection
