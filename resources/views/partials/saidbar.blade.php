<nav id="sidebar" class="sidebar-wrapper">

          <!-- App brand starts -->
          <div class="app-brand px-3 py-3 d-flex align-items-center">
            <a href="index.html">
              <img src="{{asset('dash_assets/images/logo.svg')}}"  class="logo" alt="Bootstrap Gallery" />
            </a>
          </div>
          <!-- App brand ends -->

          <!-- Sidebar profile starts -->
          <div class="sidebar-user-profile">
            <img src="{{asset('dash_assets/images/user5.png')}}" class="profile-thumb rounded-circle p-1 d-lg-flex d-none"
              alt="Bootstrap Gallery" />
            <h5 class="profile-name lh-lg mt-2 text-truncate">
                {{ Auth::check() ? Auth::user()->name : 'Guest' }}
            </h5>
              <hr style="color: aliceblue;  width: 100%; margin-bottom: 0;">
          </div>
          <!-- Sidebar profile ends -->

          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
              <li class="active current-page">
                <a href="{{route('admin.dashboard')}}">
                  <i class="bi bi-tv"></i>
                  <span class="menu-text">داشبورد</span>
                </a>
              </li>
              <li>
                <a href="{{route('admin.analysis')}}">
                  <i class="bi bi-bar-chart"></i>
                  <span class="menu-text">تحلیل ها</span>
                </a>
              </li>
              <li>
                <a href="{{route('admin.add')}}">
                  <i class="bi bi-plus-square"></i>
                  <span class="menu-text">ثبت</span>
                </a>
              </li>

                  <li>
                    <a href="{{ route('admin.logout') }}" 
                      onclick="return confirm('آیا مطمعین هستین که صفحه خارج شوید؟')">
                      <i class="bi bi-person-x"></i>
                      <span class="menu-text">خروج</span>
                    </a>
                  </li>
              <li class="treeview">
                <a href="#!">
                  <i class="bi bi-stickies"></i>
                  <span class="menu-text">اجناس</span>
                </a>
                <ul class="treeview-menu">
                  @foreach ($categories as $catgory)
                    <li>
                        <a href="{{route('category.show',$catgory->id)}}">{{$catgory->name}}</a>
                  </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </div>
          <!-- Sidebar menu ends -->

        </nav>