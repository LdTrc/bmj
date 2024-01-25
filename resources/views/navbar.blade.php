<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>


    
  

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        {{-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..."  aria-describedby="basic-addon2" />
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div> --}}
      </li>

      {{-- <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <li class="nav-item d-none d-md-block">
          <a class="nav-link">
              <form  method="POST">
                  <div class="customize-input">
                      <input name="keyword" class="form-control custom-shadow custom-radius border- bg-white" type="search" placeholder="Search" aria-label="Search" value="">
                      <i class="form-control-icon" data-feather="search"></i>
                  </div>
              </form>
          </a>
      </li>
      </div> --}}
      

      
        <!-- Dropdown - Messages -->
        {{-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
          <h6 class="dropdown-header">Message Center</h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="{{ asset('img/undraw_profile_1.svg')}}" alt="..." />
              <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
              <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
              <div class="small text-gray-500">Emily Fowler · 58m</div>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="{{ asset('img/undraw_profile_2.svg')}}" alt="..." />
              <div class="status-indicator"></div>
            </div>
            <div>
              <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
              <div class="small text-gray-500">Jae Chun · 1d</div>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="{{ asset('img/undraw_profile_3.svg')}}" alt="..." />
              <div class="status-indicator bg-warning"></div>
            </div>
            <div>
              <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
              <div class="small text-gray-500">Morgan Alvarez · 2d</div>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="{{ asset('https://source.unsplash.com/Mv9hjnEUHR4/60x60')}}" alt="..." />
              <div class="status-indicator bg-success"></div>
            </div>
            <div>
              <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
              <div class="small text-gray-500">Chicken the Dog · 2w</div>
            </div>
          </a>
          <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
        </div> --}}
      </li>
      
      <header>
       
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown notification-ui">
                            <a class="nav-link dropdown-toggle notification-ui_icon" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                @if(count($notifications) != 0)
                                <span class="unread-notification"></span>
                                @endif
                            </a>
                            <div class="dropdown-menu notification-ui_dd" aria-labelledby="navbarDropdown" style="width: 400px;margin-left:-200px;">
                                <div class="notification-ui_dd-header">
                                    <h3 class="text-center">Notification</h3>
                                </div>
                                  <table class="table-responsive text-center table table-striped">
                                    <thead>
                                      <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted p-2">Product Name</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted p-2">Quantity</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted p-2">Order Date</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted p-2">Warranty End Date</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted p-2">Days Left</th>                                
                                      </tr>
                                    </thead>
                                  <tbody>
                                    @foreach ($notifications as $notif )
                                    <tr>
                                      <td class="border-top-0">{{  $notif["productName"] }}</td>
                                      <td class="border-top-0 text-muted font-14">{{  $notif["quantity"] }}</td>
                                      <td class="border-top-0 text-muted font-14">{{  $notif["order_date"] }}</td>
                                      <td class="border-top-0 text-muted font-14">{{  $notif["endDate"] }}</td>
                                      <td class="border-top-0 text-muted font-14">{{  $notif["days_left"] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        
    </header>

     
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">

        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
  
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg')}}" />
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          {{-- <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
          </a> --}}
          {{-- <div class="dropdown-divider"></div> --}}
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button>
        </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->