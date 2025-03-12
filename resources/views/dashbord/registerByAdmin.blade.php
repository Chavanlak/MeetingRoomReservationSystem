@extends('layout/adminlayout')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <div class="d-flex justify-content-between">
                        <p>ตั้งค่า</p>
                        {{-- <p>เพิ่มบัญชีผู้ใช้</p> --}}
                    </div>
                </div>

                <div class="card-body">
                    {{-- <h4>ลงทะเบียนผู้ใช้งานใหม่</h4> --}}

                  
                    <form action="/registerpostByAdmin" method="POST">
                        @csrf <!-- Laravel token -->
                        <table class="table table-responsive">
                            {{-- <div class="container-scroller d-flex justify-content-center align-items-center min-vh-100">
                            <div class="container-fluid page-body-wrapper full-page-wrapper d-flex justify-content-center align-items-center">
                                <div class="content-wrapper d-flex align-items-center justify-content-center auth auth-img-bg">
                                    <div class="row flex-grow justify-content-center w-100">
                                        <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                            <div class="auth-form-transparent text-left p-3"> --}}
                            <h4>ลงทะเบียนผู้ใช้งานใหม่</h4>
                            <!-- Username Field -->
                            <div class="form-group">
                                <label>รหัสพนักงาน</label>
                                <input type="text" class="form-control form-control-lg" placeholder="รหัสพนักงาน"
                                    name="username" value="{{ old('username') }}">
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                <input type="password" class="form-control form-control-lg" placeholder="รหัสผ่าน"
                                    name="password" minlength="6" required>
                                @error('password')
                                    <small class='text-danger'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ยืนยันรหัสผ่าน</label>
                                <input type="password" class="form-control form-control-lg" placeholder="ยืนยันรหัสผ่าน"
                                    name="password_confirmation" minlength="6" required>
                            </div>
                            <div id="passwordError" class="text-danger" style="display: none;">รหัสผ่านไม่ตรงกัน</div>

                            @if (session('success'))
                                <div class="text-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="text-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <!-- Department Field -->
                            <div class="form-group">
                                <label>เเผนก</label>
                                <input type="text" class="form-control form-control-lg" placeholder="เเผนก"
                                    name="department" value="{{ old('department') }}">
                                {{-- @error('phone') <small class="text-danger">{{ $message }}</small> @enderror --}}
                            </div>

                            <!-- Phone Field -->
                            <div class="form-group">
                                <label>เบอร์โทรติดต่อ</label>
                                <input type="text" class="form-control form-control-lg" placeholder="เบอร์โทรติดต่อ"
                                    name="phone" value="{{ old('phone') }}">
                                {{-- @error('phone') <small class="text-danger">{{ $message }}</small> @enderror --}}
                            </div>

                            <!-- User Type Selection -->
                            {{-- <div class="form-group">
                                                    <label>ประเภทผู้ใช้</label>
                                                    <select class="form-control form-control-lg" name="userTypeId">
                                                        @foreach ($usertypes as $type)
                                                            <option value="{{ $type->userTypeId }}">{{ $type->userTypeName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}

                            <!-- Submit Button -->
                            {{-- <div class="mt-3">
                                <input type="submit" value="ลงทะเบียน"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" />
                            </div> --}}
                            <div>
                                <button type="submit" value="ลงทะเบียน"  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    onclick="return confirm('ยืนยังการลงทะเบียน?')">
                                    ยืนยันการลงทะเบียน
                                </button>
                            </div>
                            {{-- </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
