@extends('layout/secretarylayout')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <div class="d-flex justify-content-between">
                        <p>ตั้งค่า</p>

                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <p>การตั้งค่ารหัสผ่าน</p>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input class="form-control form-control-lg border-left-0" type="password" name="new_password"
                            id="new_password" maxlength="6" minlength="6" required
                            pattern = "(?=.*\d)(?=.* [a-z])(?=.* [A-Z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{4,}">
                        {{-- @if ($errors->has('new_password'))
                            <span class="help-block text-danger">

                                <strong>{{ $errors->first('new_password') }}</strong>

                            </span>
                        @endif --}}
                        {{-- @if ($error->any('old_password'))
                            <span class="text-danger">{{ $errors->first('old_password') }}</span>
                        @endif --}}
                    </div>
                    {{-- <div class="from-group {{ $errors->has('comfirm_password') ? ' has-error' : '' }}"> --}}
                    <div class="from-group ">
                        <label for="confirm_password" style="font-size:14px;">Confirm Password</label>
                        <input class="form-control form-control-lg border-left-0" type="password"
                            name="comfirm_password" id="comfirm_password" maxlength="6" minlength="6" required
                            pattern = "(?=.*\d)(?=.* [a-z])(?=.* [A-Z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{4,} " >
                        {{-- @if ($error->any('old_password'))
                            <span class="text-danger">{{ $errors->first('old_password') }}</span>
                        @endif --}}
                        {{-- @if ($errors->has('comfirm_password'))
                            <span class="help-block">

                                <strong>{{ $errors->first('comfirm_password')}}</strong>

                            </span>
                        @endif --}}
                    </div>
                    
                    <input value="update password" type="submit" class="my-3 btn btn-primary"
                    onclick="return confirm('คุณต้องการเปลี่ยนรหัสผ่าน {{new_password}}หรือไม่')">
                    เปลี่ยน



                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
