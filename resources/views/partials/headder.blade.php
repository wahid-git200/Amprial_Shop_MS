
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{route('pages.home')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/images/logo.png')}}" alt="logo">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('pages.home') }}" class="" style="font-size: 20px;">خانه</a></li>
          <li><a href="{{route('pages.services')}}" class="" style="font-size: 20px;">خدمات ما</a></li>
          <li><a href="{{ route('pages.about') }}" class="" style="font-size: 20px;">درباره ما</a></li>
          <li><a href="{{route('pages.contact')}}" class="" style="font-size: 20px;">ارتباط با ما</a></li>
          @if (Auth::check())
            <li><a href="{{route('admin.dashboard')}}" class="" style="font-size: 20px;">داشبورد</a></li>
          @endif
              
          @if(!Auth::check())
          <li><a href="{{route('pages.login')}}" class="" style="font-size: 20px;">ورود</a></li>
          @endif
           
          
        </ul>
      </nav><!-- .navbar -->
      <button id="darkmode-button"><i class="bi bi-moon-fill"></i></button>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>


  <!-- End Header -->