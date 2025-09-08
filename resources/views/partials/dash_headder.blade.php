          <div class="app-header d-flex align-items-center" style="    padding: 20px;     direction: ltr;">

            <!-- Toggle buttons start -->
            <div class="d-flex">
              <button type="button" class="btn btn-dark me-2 toggle-sidebar" id="toggle-sidebar">
                <i class="bi bi-chevron-left fs-5"></i>
              </button>
              <button type="button" class="btn btn-outline-dark me-2 pin-sidebar" id="pin-sidebar">
                <i class="bi bi-chevron-left fs-5"></i>
              </button>
            </div>
            <!-- Toggle buttons end -->

            <!-- App brand sm start -->

            <!-- App brand sm end -->

            <!-- App header actions start -->
            {{-- <div class="header-actions"> --}}


                <div class="dropdown ms-3">
                  <a class="dropdown-toggle action-icon" href="#!" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-bell fs-5 lh-1"></i>
                    <span class="count-label bg-danger animated infinite swing">7</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end shadow">
                    <div class="dropdown-item">
                      <div class="d-flex py-2 border-bottom">
                        <img src="{{asset('dash_assets/images/user.png')}}" class="img-4x me-3 rounded-3" alt="Admin Theme" />
                        <div class="m-0">
                          <h5 class="mb-1 fw-semibold">Lesley Preston</h5>
                          <p class="mb-1">Membership has been ended.</p>
                          <p class="small m-0 text-primary">Today, 07:30pm</p>
                        </div>
                      </div>
                    </div>
                    <div class="dropdown-item">
                      <div class="d-flex py-2 border-bottom">
                        <img src="{{asset('dash_assets/images/user2.png')}}" class="img-4x me-3 rounded-3" alt="Admin Theme" />
                        <div class="m-0">
                          <h5 class="mb-1 fw-semibold">Jannie Reilly</h5>
                          <p class="mb-1">Congratulate, James for new job.</p>
                          <p class="small m-0 text-primary">Today, 08:00pm</p>
                        </div>
                      </div>
                    </div>
                    <div class="dropdown-item">
                      <div class="d-flex py-2">
                        <img src="{{asset('dash_assets/images/user1.png')}}" class="img-4x me-3 rounded-3" alt="Admin Theme" />
                        <div class="m-0">
                          <h5 class="mb-1 fw-semibold">Elsa Gregory</h5>
                          <p class="mb-2">Lewis added new schedule release.</p>
                          <p class="small m-0 text-primary">Today, 09:30pm</p>
                        </div>
                      </div>
                    </div>
                    <div class="border-top p-2 d-grid">
                      <a href="javascript:void(0)" class="btn btn-info">View all</a>
                    </div>
                  </div>
                </div>
              
                <div class="ttttt btn btn-outline-primary" style="margin-left: 20px; " >
                    <a style="text-decoration:none;" href="{{route('pages.home')}}">خانه</a>
                </div>
            
            <!-- App header actions end -->

          </div>
          <!-- App header ends -->
