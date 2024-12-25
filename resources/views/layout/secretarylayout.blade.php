@extends('layout/mainlayout')

@section('title')
<title>User</title>
@endsection


@section('sidebar')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- category1 --}}
        <li class="nav-item sidebar-category">
            <p>MeetingRoomBooking</p>
            <span></span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/dashbord">
              {{-- <i class="mdi mdi-view-quilt menu-icon"></i> --}}
              <i class="mdi mdi-update menu-icon"></i>
            
              <span class="menu-title">การจองของฉัน</span>
              {{-- <div class="badge badge-info badge-pill">2</div> --}}
            </a>
          </li>
          {{--end category1 --}}


          {{-- category2 --}}
          {{-- <li class="nav-item sidebar-category">
            <p>Components</p>
            <span></span>
          </li> --}}

          
        <li class="nav-item">
          <a class="nav-link" href="/roombooking">
            <i class="mdi mdi-calendar menu-icon"></i>
            <span class="menu-title">จองห้อง</span>
            {{-- <div class="badge badge-info badge-pill">2</div> --}}
          </a>
        </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/dashbord">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">ตั้งค่า</span>
              {{-- <div class="badge badge-info badge-pill">2</div> --}}
            </a>
          </li>
          {{--end category2 --}}
    </ul>
   
</nav>
@endsection



@section('header')
<nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="navbar-brand-wrapper">
            {{-- <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('images/logo.svg')}}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/logo-mini.svg')}}" alt="logo"/></a> --}}
        </div>
            {{-- <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, ploy ploy</h4> --}}
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
                {{-- <h4 class="mb-0 font-weight-bold d-none d-xl-block">Mar 12, 2024</h4> --}}
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
    <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                {{-- <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search"> --}}
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <img src="{{asset('images/faces/face5.jpg')}}" alt="profile"/>
                    {{-- <span class="nav-profile-name">ploy ploy</span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    {{-- <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                    </a> --}}
                    <a class="dropdown-item" href="/logout">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
@endsection
