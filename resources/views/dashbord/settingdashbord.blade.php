@extends('layout/adminlayout')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <div class="d-flex justify-content-between">
                        <p>ตั้งค่า</p>
                    </div>
                    <div>

                        {{-- <form method="post" action="/admin/searchadmin" class="input-group form-control-sm"> --}}
                        {{-- <form method="post" action="{{ route('admin.searchUserByAdmin') }}"
                            class="input-group form-control-sm"> --}}
                        <form method="post" action="/searchadminsetting" class="input-group form-control-sm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" placeholder="ค้นหา..." name="username"
                                style="background-color: rgba(245, 245, 245, 0.39)">
                            <input type="hidden" value="{{ $offset }}" name="offset">
                            <input type="hidden" value="{{ $limit }}" name="limit">
                            <input type="submit" class="btn btn-primary" value="ค้นหา" />
                        </form>
                        {{-- <form method="GET" action="{{ route('admin.searchByRoom') }}" class="d-flex gap-2">
                        <input type="text" class="form-control" name="roomName" placeholder="ค้นหาห้อง..." value="{{ request('roomName') }}">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </form> --}}

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
                                {{-- <td> {{ $loop->iteration + ((int) $offset - 1) * (int) $limit }}</td> --}}
                                <td style="text-align: center">{{ $user->username }}</td>
                                <td style="text-align: center">{{ $user->phone }}</td>
                                <td>
                                    <!-- ปรับให้ใช้ URL ที่ถูกต้องกับ userId -->
                                    {{-- <a href="{{ url('/dashbord/postsetting/'.$user->userId) }}" 
                                            class="btn btn-warning" style="margin-right: 50px;">
                                            เปลี่ยนรหัสผ่าน
                                        </a> --}}

                                    <a href="{{ url('/postsetting/' . $user->userId) }}" class="btn btn-warning"
                                        style="margin-right: 50px;">
                                        เปลี่ยนรหัสผ่าน
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{-- </form> --}}
                </div>

                {{-- <div class="card-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            @if ($offset - 1 > 0)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $stringPage . '' . ($offset - 1) }}">Previous</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link">Previous</a>
                                </li>
                            @endif
                           
                            @for ($i = 1; $i <= $count; $i++)
                                @if ($i == $offset)
                                    <li class="page-item">
                                        <a class="page-link active"
                                            href="{{ $stringPage . '' . $i }}">{{ $i }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $stringPage . '' . $i }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endfor

                            @if ($offset + 1 <= $count)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $stringPage . '' . ($offset + 1) }}">Next</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" aria-disabled="true">Next</a>
                                </li>
                            @endif

                        </ul>
                    </nav>
                </div> --}}
                <div class="card-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            @if ($offset - 1 > 0)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $stringPage . '' . ($offset - 1) }}">Previous</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link">Previous</a>
                                </li>
                            @endif

                            @for ($i = 1; $i <= ceil($count / $limit); $i++)
                                <!-- This will calculate the total pages -->
                                @if ($i == $offset)
                                    <li class="page-item active">
                                        <a class="page-link" href="{{ $stringPage . '' . $i }}">{{ $i }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $stringPage . '' . $i }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endfor

                            @if ($offset + 1 <= ceil($count / $limit))
                                <li class="page-item">
                                    <a class="page-link" href="{{ $stringPage . '' . ($offset + 1) }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
