@extends('layout/adminlayout')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="card-title">การจองห้องทั้งหมด</div>
                            <p class="card-description">
                                ประวัติการจองห้อง
                            </p>
                        </div>
                        <div>
                            {{-- <form class="d-flex gap-2">
                            <input type="text" class="form-control" name="search" placeholder="ค้นหา...">
                            <button type="submit" class="btn btn-info">ค้นหา</button>
                        </form> --}}
                            {{-- <form method="post" action="/admin/search" class="input-group form-control-sm"> --}}
                            {{-- <form method="GET" action="{{ route('admin.searchByRoom') }}" class="d-flex gap-2"> --}}
                            <form method="post" action="/admin/searchadmin" class="input-group form-control-sm">
                                {{-- you must to connected with route path Route::post('/searchadmin',[AdminController::class,'searchbookingbyAdmin']); or ou can write in front of thispath /admin/searchadmin --}}
                                {{-- <form method="post" action=" /admin/searchadmin" class="input-group form-control-sm"> --}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" placeholder="ค้นหา..." name="roomName"
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
                </div>
                <div class="card-body">
                    @if (!empty($bookingList))
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">ลำดับ</th>
                                        <th style="text-align: center">หัวข้อการประชุม</th>
                                        <th style="text-align: center">วันที่ใช้งาน</th>
                                        <th style="text-align: center">จองเวลา</th>
                                        {{-- <th style="text-align: center">เวลาเริ่ม</th>
                                        <th style="text-align: center">เวลาสิ้นสุด</th> --}}
                                        {{-- <th style="text-align: center">ผู้จอง</th> --}}
                                        <th style="text-align: center">ผู้จอง</th>
                                        <th style="text-align: center">เบอร์โทรติดต่อ</th>
                                        <th style="text-align: center">ห้อง</th>
                                        <th style="text-align: center">วันที่บันทึก</th>
                                        <th style="text-align: center">เวลาที่บันทึก</th>
                                   
                                        <th colspan="2" style="text-align: center">เมนู</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookingList as $booking)
                                        <tr>
                                            {{-- <td style="text-align: center">
                                            {{ $loop->iteration + ((int) $offset - 1) * (int) $limit }}
                                        </td> --}}
                                            <td style="text-align: center">
                                                {{ $loop->iteration + ((int) $offset - 1) * (int) $limit }}</td>
                                            <td style="text-align: center">{{ $booking->bookingAgenda }}</td>
                                            <td style="text-align: center">
                                                {{ $booking->bookingDate ? \Carbon\Carbon::parse($booking->bookingDate)->format('d/m/Y') : 'ไม่มีข้อมูล' }}
                                            </td>
                                            {{-- <td style="text-align: center">{{ $booking->bookingTimeStart }}</td>
                                            <td style="text-align: center">{{ $booking->bookingTimeFinish }}</td> --}}
                                            <td style="text-align: center">
                                                {{ \Carbon\Carbon::parse($booking->bookingTimeStart)->format('H.i') }}-
                                                {{ \Carbon\Carbon::parse($booking->bookingTimeFinish)->format('H.i') }}
                                            </td>
                                            {{-- <td style="text-align: center">{{ $booking->userbookingName }}</td> --}}
                                            <td style="text-align: center">{{ $booking->department }}</td>
                                            <td style="text-align: center">{{ $booking->phone }}</td>
                                            <td style="text-align: center">{{ $booking->roomName }}</td>
                                             <td style="text-align: center">
                                                {{ $booking->date ? \Carbon\Carbon::parse($booking->date)->format('d/m/Y') : 'ไม่มีข้อมูล' }}
                                            </td>
                                            {{-- <td style="text-align: center">{{ $booking->date }}</td> --}}
                                            <td style="text-align: center">{{ $booking->bookingTimes }}</td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('delete', $booking->bookingId) }}" class="btn btn-danger"
                                                    {{-- style="margin-right: 30px"  --}}
                                                    style="margin-right: 30px; width: 100px; height: 40px "
                                                    onclick="return confirm('คุณต้องการลบการจอง {{ $booking->bookingId }}หรือไม่')">
                                                    ลบ
                                                </a>
                                                <a href="/admin/editbooking/{{ $booking->bookingId }}"
                                                    class="btn btn-warning " style="width: 100px; height: 40px;">
                                                    แก้ไข</a>

                                            </td>
                                            {{-- @endif --}}
                                            {{-- @if (\Carbon\Carbon::parse($booking->bookingDate . ' ' . $booking->bookingTimeStart)->lt(\Carbon\Carbon::now()))
                                    <td colspan="2" style="text-align: center">
                                        ไม่สามารถแก้ไขหรือลบได้เนื่องจากเวลาเลยกำหนด
                                    </td>
                                    @else
                                    <td>
                                        <a href="{{route('delete',$booking->bookingId)}} "class="btn btn-danger" onclick="return confirm('คุณต้องการลบการจอง {{$booking->bookingId}}หรือไม่')">ลบ </a>
                                    </td>
                                    <td>
                                        <a href="/bookingedit/{{$booking->bookingId}}" class="btn btn-warning" >เเก้ไข</a>
                                    </td>
                                    @endif --}}

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center text-muted">ไม่มีข้อมูลการจองห้อง</p>
                    @endif
                </div>
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
                            {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
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
                </div>
            </div>
        </div>
    </div>
@endsection
