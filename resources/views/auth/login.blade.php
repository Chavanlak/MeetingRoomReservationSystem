<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .login-box {
            background-color: #ffffff;
            /* พื้นหลังสีขาว */
            border-radius: 8px;
            /* มุมโค้งมน */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* เงา */
            padding: 30px;
            /* เพิ่มพื้นที่ภายใน */
            max-width: 950px;
            /* กำหนดความกว้างสูงสุด */
            margin: auto;
            height: 200px;
            width: 100%;
        }

        .content-wrapper {
            padding: 40px;
            /* เพิ่มระยะรอบฟอร์ม */
            background-color: #f4f4f4;
            /* เปลี่ยนพื้นหลังรอบฟอร์ม */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* ให้ฟอร์มอยู่กึ่งกลางแนวตั้ง */
        }
    </style>

    <title>ลงชื่อเข้าใช้</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller d-flex">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            {{-- <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg"> --}}
            <div class="content-wrapper d-flex align-items-stretch  ">
                <div class="row flex-grow">
                    {{-- <div class="col-lg-6 d-flex align-items-center justify-content-center"> --}}
                    <div class=" d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3 login-box ">
                            <div class="brand-logo">
                                {{-- <img src="{{asset('images/logo-dark.svg')}}" alt="logo"> --}}
                            </div>
                            <h4>ลงชื่อเข้าใช้</h4>

                            @if (session('message'))
                                <h6 class="font-weight-bold text-danger">{{ session('message') }}</h6>
                            @endif
                            {{-- <h6 class="font-weight-light">Happy to see you again!</h6> --}}
                            <form class="pt-3" action="/loginpost" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail">อีเมล์</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control form-control-lg border-left-0"
                                            id="exampleInputEmail" placeholder="อีเมล์" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">รหัสผ่าน</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0"
                                            id="exampleInputPassword" placeholder="รหัสผ่าน" name="password">
                                    </div>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            {{-- Keep me signed in --}}
                                        </label>
                                    </div>
                                    {{-- <a href="#" class="auth-link text-black">Forgot password?</a> --}}
                                </div>
                                <div class="my-3">
                                    <input type="submit" value="ลงชื่อเข้าใช้"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" />
                                </div>
                                {{-- <div class="text-center mt-4 font-weight-light">
                            Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                        </div> --}}
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
                        {{-- <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021  All rights reserved.</p> --}}
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <script src="{{ asset('js/jquery.cookie.js" type="text/javascript') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <!-- endinject -->
</body>

</html>
