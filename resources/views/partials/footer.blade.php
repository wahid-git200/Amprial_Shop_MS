<div class="container">
        <div class="footer-content pt-5 pb-5">
          <div class="row">
            <div class="col-xl-4 col-lg-4 mb-50">
              <div class="footer-widget">
                <div class="footer-logo">
                  <a href="{{route('pages.home')}}" class="logo d-flex align-items-center">
                    <img src="{{asset('assets/images/logo.png')}}" alt="logo" />
                  </a>
                </div>
                <div class="footer-text">
                  <p style="font-size: 20px">
                    فروشگاه نرم افزاری و سخت افزاری امپریال افتخار دارد تا شمارا در خرید با کیفیت ترین اجناس یاری نماید
                  </p>
                </div>
                <div class="footer-social-icon">
                  <span>مارا دنبال کنید</span>
                  <a href="#" class="twitter"
                    ><i class="bi bi-twitter-x"></i
                  ></a>
                  <a href="#" class="facebook"
                    ><i class="bi bi-facebook"></i
                  ></a>
                  <a href="#" class="instagram"
                    ><i class="bi bi-instagram"></i
                  ></a>
                  <a href="#" class="linkedin"
                    ><i class="bi bi-linkedin"></i
                  ></a>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
              <div class="service-widget footer-widget">
                <div class="footer-widget-heading">
                  <h3>خدمات ما</h3>
                </div>
                <ul class="list">
                  @forEach($categories as $category)
                    <li><a href="{{route('servicesList',$category->id)}}" >{{$category->name}}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
              <div class="service-widget footer-widget">
                <div class="footer-widget-heading">
                  <h3>معلومات</h3>
                </div>
                <ul class="list">
                  <li><a href="{{ route('pages.about') }}">درباره ما</a></li>
                  <li><a href="{{route('pages.contact')}}">ارتباط با ما</a></li>
                  <li><a href="{{route('pages.services')}}">خدمات ما</a></li>
                  <li><a href="{{route('pages.login')}}">ورود</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
              <div class="contact-widget footer-widget">
                <div class="footer-widget-heading">
                  <h3>راه های ارتباطی</h3>
                </div>
                <div class="footer-text">
                  <p>
                    <i class="bi bi-geo-alt-fill mr-15"></i>برچی - تانگ تیل - مارکیت احمدیان - منزل 2 - دوکان نمبر 35
                  </p>
                  <p>
                    <i class="bi bi-telephone-inbound-fill mr-15"></i> 0773454544 , 0783456363
                  </p>
                  <p>
                    <i class="bi bi-envelope-fill mr-15"></i>
                    amperial@gmail.com
                  </p>
                  <a href="{{route('pages.contact')}}" > 
                        <p>
                            <i class="bi bi-telegram mr-15"></i>
                            همین حالا ایمیل کنید
                        </p>
                    </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-6 col-lg-6 text-left text-lg-left">
              <div class="copyright-text">
                <p style="text-decoration: underline">
                  Developed By Abdul Wahid Najafi
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>