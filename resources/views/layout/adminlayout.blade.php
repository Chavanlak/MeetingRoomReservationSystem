@extends('layout/mainlayout')

@section('title')
    <title>Admin</title>
@endsection


@section('sidebar')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            {{-- category1 --}}
            <li class="nav-item sidebar-category">
                <p>MeetingRoomBooking</p>
                <span></span>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link" href="/admin/dashbord">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Home</span>
              
            </a>
          </li> --}}
            {{-- end category1 --}}


            {{-- category2 --}}
            {{-- <li class="nav-item sidebar-category">
            <p>Components</p>
            <span></span>
          </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashbord">
                    {{-- <i class="mdi mdi-view-quilt menu-icon"></i> --}}
                    <i class="mdi mdi-clock-outline menu-icon"></i>

                    <span class="menu-title">การจองทั้งหมด</span>
                    {{-- <div class="badge badge-info badge-pill">2</div> --}}
                </a>
            </li>
            {{-- end category1 --}}


            {{-- category2 --}}
            {{-- <li class="nav-item sidebar-category">
            <p>Components</p>
            <span></span>
          </li> --}}


            {{-- <li class="nav-item">
          <a class="nav-link" href="">
            <i class="mdi mdi-calendar menu-icon"></i>
            <span class="menu-title">รายการ</span>
         
          </a> --}}
            </li>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="/settingdashbord"aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">ตั้งค่า</span>
              <i class="menu-arrow"></i>
           
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">ห้องทั้งหมด</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">เพิ่มห้อง</a></li>
              </ul>
            </div>
          </li> --}}
            {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse show" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">ตั้งค่า</span>
           
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/settingdashbord">เปลี่ยนรหัสผ่านผู้ใช้งาน</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">เพิ่มบัญชีผู้ใช้งาน</a></li>
              </ul>
            </div>
          </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse"  data-bs-target="#ui-basic" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                
                    <i class="mdi mdi-settings menu-icon"></i>
                    <span class="menu-title">ตั้งค่า</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse " id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="">เปลี่ยนรหัสผ่านผู้ใช้งาน</a></li>
                        <li class="nav-item"> <a class="nav-link" href="#">เพิ่มบัญชีผู้ใช้งาน</a></li>
                    </ul>
                </div>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#ui-basic" href="javascript:void(0);" aria-expanded="false" aria-controls="ui-basic">
                  <i class="mdi mdi-settings menu-icon"></i>
                  <span class="menu-title">ตั้งค่า</span>
             
              </a>
              <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="/settingdashbord">เปลี่ยนรหัสผ่านผู้ใช้งาน</a></li>
                      <li class="nav-item"> <a class="nav-link" href="/registerByAdmin">เพิ่มบัญชีผู้ใช้งาน</a></li>
                  </ul>
              </div>
          </li>
          
          
            {{-- end category2 --}}
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
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/logo-mini.svg')}}" alt="logo"/></a>
        </div> --}}
                {{-- <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, Brandon Haynes</h4> --}}
                <ul class="navbar-nav navbar-nav-right">
                    {{-- <li class="nav-item">
                <h4 class="mb-0 font-weight-bold d-none d-xl-block">Mar 12, 2019 - Apr 10, 2019</h4>
            </li>li --}}
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        {{-- <div class="input-group">
                <input type="text" class="form-control" style="text-align: center" placeholder="MeetingRoom" aria-label="search" aria-describedby="search">
                </div> --}}


                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="{{ asset('images/faces/face5.jpg') }}" alt="profile" />
                            <span class="nav-profile-name">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            {{-- <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                    </a> --}}
                            <a class="dropdown-item"href="/logout">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
    </nav>
@endsection
