@extends('layout.adminlayout')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header" style="background-color: white">
                <div class="d-flex justify-content-between">
                    <p>เปลี่ยนรหัสผ่าน</p>
                </div>
            </div>

            <div class="card-body">

                {{-- <form action="{{ route('updatepasswordByadmin', ['userId' => $user->userId]) }}" method="POST">
                    @csrf --}}


                <div class="form-group">
                    <label for="password">รหัสผ่านใหม่</label>
                    <input type="password" name="password" class="form-control" required minlength="6">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        required minlength="6">
                </div>
                <div id="passwordError" class="text-danger" style="display: none;">รหัสผ่านไม่ตรงกัน</div>
                {{-- <div>
                    <button type="submit" class="my-3 btn btn-primary"
                        onclick="return confirm('คุณต้องการเปลี่ยนรหัสผ่านหรือไม่?')">
                        อัปเดตรหัสผ่าน
                    </button>
                </div> --}}
                </form>
            </div>
        </div>
    </div>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;
            var errorDiv = document.getElementById("passwordError");

            if (password !== confirmPassword) {
                errorDiv.style.display = "block";
                return false;
            } else {
                errorDiv.style.display = "none";
                return true;
            }
        }
    </script>
@endsection
