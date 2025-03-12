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
            จัดให้อยู่กึ่งกลาง
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
    <title>ลงทะเบียนผู้ใช้งาน</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>

<body>
    <!-- Use Flexbox to center the page content -->
    <div class="container-scroller d-flex justify-content-center align-items-center min-vh-100">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex justify-content-center align-items-center">
            <div class="content-wrapper d-flex align-items-center justify-content-center auth auth-img-bg">
                <div class="row flex-grow justify-content-center w-100">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <h4>ลงทะเบียนผู้ใช้งานใหม่</h4>
                            <form class="pt-3" action="/registerpost" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                

                                <!-- Username Field -->
                                <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0" placeholder="รหัสพนักงาน" name="username">
                                    </div>
                                </div>

                                <!-- Password Field -->
                                <div class="form-group">
                                    <label>รหัสผ่าน</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="รหัสผ่าน" name="password" minlength="6" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{4,}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เเผนก</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-domain text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0" placeholder="เเผนก" name="department">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรติดต่อ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-phone text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0" placeholder="เบอร์โทรติดต่อ" name="phone">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label>เบอร์โทรติดต่อ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-phone text-primary"></i>
                                            </span>
                                        </div>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-lg border-left-0" 
                                            placeholder="เบอร์โทรติดต่อ" 
                                            name="phone" 
                                            maxlength="11" 
                                            oninput="formatPhone(this)" 
                                            required
                                        >
                                    </div>
                                </div>
                                
                                <script>
                                    function formatPhone(input) {
                                        // Remove all non-numeric characters
                                        let phone = input.value.replace(/\D/g, '');
                                        
                                        // Format as xxx-xxxxxxx
                                        if (phone.length <= 3) {
                                            input.value = phone;
                                        } else if (phone.length <= 10) {
                                            input.value = phone.substring(0, 3) + '-' + phone.substring(3);
                                        } else {
                                            input.value = phone.substring(0, 3) + '-' + phone.substring(3, 10);
                                        }
                                    }
                                </script> --}}
                                

                                <!-- User Type Selection -->
                                <div class="form-group">
                                    <label>ประเภทผู้ใช้</label>
                                    <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="userTypeId">
                                        @foreach ($usertypes as $type)
                                            <option value={{$type->userTypeId}}>{{$type->userTypeName}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-3">
                                    <input type="submit" value="ลงทะเบียน" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"/>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="/login" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- base:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('js/template.js')}}"></script>
</body>
</html>
