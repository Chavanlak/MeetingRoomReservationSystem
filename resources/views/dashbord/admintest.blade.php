@extends('layout.adminlayout')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-heard" style="background-color:white">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="care-title">การจองทั้งหมด</div>
                            <p class="card-description">ประวัติการจองห้อง</p>
                        </div>
                    </div>
                    <button class="btn btn-info">ค้นหา</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th style="text-align: center">ลำดับ</th> --}}
                            <th style="text-align: center">หัวข้อการประชุม</th>
                            <th style="text-align: center">วันที่ใช้งาน</th>
                            <th style="text-align: center">เวลาเริ่ม</th>
                            <th style="text-align: center">เวลาสิ้นสุด</th>
                            <th style="text-align: center">ผู้จอง</th>
                            <th style="text-align: center">ห้อง</th>
                            {{-- <th style="text-align: center">ลบข้อมูลการจอง</th> --}}
                            <th colspan="2" style="text-align: center">เมนู</th>
                        </tr>
                    </thead>
                    @foreach ($bookingList as $booking)
                        <tr>
                            {{-- <td style="text-align: center">{{$loop->iteration+((int)$offset-1)*(int)$limit}}</td> --}}
                            <td style="text-align: center">{{ $booking->bookingAgenda }}</td>
                            <td style="text-align: center">{{ $booking->bookingDate }}</td>
                            <td style="text-align: center">{{ $booking->bookingTimeStart }}</td>
                            <td style="text-align: center">{{ $booking->bookingTimeFinish }}</td>
                            <td style="text-align: center">{{ $booking->userbookingName }}</td>
                            <td style="text-align: center">{{ $booking->roomName }}</td>
                            <td style="text-align: center;">
                                <a href="{{route('delete',$booking->bookingId)}}" 
                                   class="btn btn-danger" 

                                   {{-- style="margin-right: 30px"  --}}
                                    style="margin-right: 30px; width: 100px; height: 40px "
                                   onclick="return confirm('คุณต้องการลบการจอง {{$booking->bookingId}}หรือไม่')">
                                   ลบ
                                </a>
                                <a href="/booking/editbooking/{{$booking->bookingId}}" 
                                    class="btn btn-warning "
                                     style="width: 100px; height: 40px;"
                                    >แก้ไข</a>
                                    
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection
