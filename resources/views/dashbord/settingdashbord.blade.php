@extends('layout/adminlayout')

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
                {{-- <form action="/changpasswordByadmin" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    <table class="table table-responsive">
                        <thead>
                            <tbody>
                                <tr>
                                    <th style="text-align: center">ชื่อผู้ใช้</th>
                                    <th style="text-align: center">เบอร์โทร</th>
                                    {{-- <th style="text-align: center">เมนู</th> --}}
                                    {{-- <th style="margin-right: 60px;">เมนู</th> --}}
                                    <th style="text-align: left; padding-left: 60px;">เมนู</th>

                                </tr>
                            </tbody>
                            @foreach ($userList as $user)
                                <tr>
                                    <td style="text-align: center">{{ $user->username }}</td>
                                    <td style="text-align: center">{{ $user->phone }}</td>
                                    <td>
                                        <!-- ปรับให้ใช้ URL ที่ถูกต้องกับ userId -->
                                        {{-- <a href="{{ url('/dashbord/postsetting/'.$user->userId) }}" 
                                            class="btn btn-warning" style="margin-right: 50px;">
                                            เปลี่ยนรหัสผ่าน
                                        </a> --}}

                                        <a href="{{ url('/postsetting/'.$user->userId) }}" 
                                            class="btn btn-warning" style="margin-right: 50px;">
                                            เปลี่ยนรหัสผ่าน
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
