<!DOCTYPE html>
<html lang="en">

    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ลงทะเบียนผู้ใช้งาน</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
    </head>

    <body>
    <div class="container-scroller d-flex">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-form-transparent text-left p-3">
                <div class="brand-logo">
                    <img src="{{asset('images/logo-dark.svg')}}" alt="logo">
                </div>
                <h4>ลงทะเบียนผู้ใช้งานใหม่</h4>
                {{-- <h6 class="font-weight-light">Join us today! It takes only few steps</h6> --}}
                <form class="pt-3" action="/registerpost" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>อีเมล์</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-email text-primary"></i>
                            </span>
                            </div>
                            <input type="email" class="form-control form-control-lg border-left-0" placeholder="Email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>ชื่อผู้ใช้</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-account text-primary"></i>
                            </span>
                            </div>
                            <input type="text" class="form-control form-control-lg border-left-0" placeholder="Username" name="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>รหัสผ่าน</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-lock text-primary"></i>
                            </span>
                            </div>
                            <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" name="password">
                        </div>
                    </div>



                    <div class="form-group">
                        <label>ชื่อ</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-text-shadow text-primary"></i>
                            </span>
                            </div>
                            <input type="text" class="form-control form-control-lg border-left-0" placeholder="Firstname" name="firstName">
                        </div>
                    </div>


                    <div class="form-group">
                        <label>นามสกุล</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-text-shadow text-primary"></i>
                            </span>
                            </div>
                            <input type="text" class="form-control form-control-lg border-left-0" placeholder="Lastname" name="lastName">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>ประเภทผู้ใช้</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="userTypeId">
                            @foreach ($usertypes as $type)
                                <option value={{$type->userTypeId}}>{{$type->userTypeName}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mt-3">
                        <input type="submit" value="ลงทะเบียน" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"/>
                        {{-- <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</button> --}}
                    </div>
                    <div class="text-center mt-4 font-weight-light">
                        Already have an account? <a href="login.html" class="text-primary">Login</a>
                    </div>
                </form>
                </div>
            </div>
            <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021  All rights reserved.</p>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('js/template.js')}}"></script>
    <!-- endinject -->
    </body>
</html>
