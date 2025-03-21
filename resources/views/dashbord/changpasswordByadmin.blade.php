@extends('layout/adminlayout')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <div class="d-flex justify-content-between">
                        <p >ตั้งค่า</p>

                    </div>
                </div>
                <div class="card-body">
                    <div class="text-secondary">
                        <p>การตั้งค่ารหัสผ่าน</p>
                    </div>
                    <form action="/updatepassword" id="" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- @if ($error->any('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            @endif --}}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control form-control-lg border-left-0" type="text"
                                value="{{ $username }}" disabled>
                        </div>
                        <div class= "form-group">
                            <label for="change_password" style="font-size:14px;">{{ 'Change Password' }}</label>


                            <input id="change_password" type="password" class="form-control form-control-lg border-left-0"
                                name="change_password" required autocomplete="new-password"maxlength="6" minlength="6"
                                required
                                pattern = "(?=.*\d)(?=.* [a-z])(?=.* [A-Z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{4,}">

                        </div>

                        <div class="form-group">
                            <label for="change_password_comfirmtion" style="font-size:14px;">{{ 'Confirm Password' }}</label>


                            <input id="change_password_comfirmtion" type="password"
                                class="form-control form-control-lg border-left-0  @error('change_password') is-invalid @enderror"
                                name="change_password_comfirmtion" required autocomplete="new-password" maxlength="6"
                                minlength="6" required
                                pattern = "(?=.*\d)(?=.* [a-z])(?=.* [A-Z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{4,}">
                            @error('change_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>
                        @if (session('success'))
                        <div class="text-success">Password updated successfully!</div>
                    @endif
                        <input value="update password" type="submit"
                            class="my-3 btn btn-primary"onclick="return confirm('คุณต้องการเปลี่ยนรหัสผ่านหรือไม่')" >

                </div>


                </form>



            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    </div>
@endsection
