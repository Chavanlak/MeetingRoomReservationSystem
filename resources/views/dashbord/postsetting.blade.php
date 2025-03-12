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
                <form action="{{ route('updatepasswordByadmin', ['userId' => $user->userId]) }}" method="POST" onsubmit="return validatePassword()">
                    @csrf
                    <div class="form-group">
                        <label for="username">ชื่อผู้ใช้</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone">เบอร์โทร</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="password">รหัสผ่านใหม่</label>
                        <input type="password" id="password" name="password" class="form-control" required minlength="6">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required minlength="6">
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

                    {{-- <div>
                        <button type="submit" class="my-3 btn btn-primary">
                            อัปเดตรหัสผ่าน
                        </button>
                    </div> --}}
                    <div>
                        <button type="submit" class="my-3 btn btn-primary"
                            onclick="return confirm('คุณต้องการเปลี่ยนรหัสผ่านหรือไม่')">
                            อัปเดตรหัสผ่าน
                        </button>
                    </div>

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
