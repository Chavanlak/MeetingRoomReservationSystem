@extends('layout/adminlayout')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header" style="background-color: white">
                <div class="d-flex justify-content-between">
                    <h4>ลงทะเบียนผู้ใช้งานใหม่</h4>
                </div>
            </div>
           
            <div class="card-body">
                <form action="/registerpost" method="POST">
                    @csrf <!-- Laravel token -->
                    <table class="table table-responsive">
                        <div class="container-scroller d-flex justify-content-center align-items-center min-vh-100">
                            <div class="container-fluid page-body-wrapper full-page-wrapper d-flex justify-content-center align-items-center">
                                <div class="content-wrapper d-flex align-items-center justify-content-center auth auth-img-bg">
                                    <div class="row flex-grow justify-content-center w-100">
                                        <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                            <div class="auth-form-transparent text-left p-3">
                                                <!-- Username Field -->
                                                <div class="form-group">
                                                    <label>รหัสพนักงาน</label>
                                                    <input type="text" class="form-control form-control-lg" placeholder="รหัสพนักงาน" name="username" required>
                                                </div>
                    
                                                <!-- Password Field -->
                                                <div class="form-group">
                                                    <label>รหัสผ่าน</label>
                                                    <input type="password" class="form-control form-control-lg" placeholder="รหัสผ่าน" name="password" minlength="6" required>
                                                </div>
                    
                                                <!-- Department Field -->
                                                <div class="form-group">
                                                    <label>เเผนก</label>
                                                    <input type="text" class="form-control form-control-lg" placeholder="เเผนก" name="department" required>
                                                </div>
                    
                                                <!-- Phone Field -->
                                                <div class="form-group">
                                                    <label>เบอร์โทรติดต่อ</label>
                                                    <input type="text" class="form-control form-control-lg" placeholder="เบอร์โทรติดต่อ" name="phone" required>
                                                </div>
                    
                                                <!-- User Type Selection -->
                                                <div class="form-group">
                                                    <label>ประเภทผู้ใช้</label>
                                                    <select class="form-control form-control-lg" name="userTypeId">
                                                        @foreach ($usertypes as $type)
                                                            <option value="{{ $type->userTypeId }}">{{ $type->userTypeName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                    
                                                <!-- Submit Button -->
                                                <div class="mt-3">
                                                    <input type="submit" value="ลงทะเบียน" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
