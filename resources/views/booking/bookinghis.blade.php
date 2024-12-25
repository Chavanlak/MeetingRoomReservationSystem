@extends('layout/adminlayout')

@section('content')
<div class="row">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">รายการจองห้อง {{$room->roomName}}</h4>
            <p class="card-description">
                รายละเอียดการจองห้อง
            </p>
            <p class="btn btn-secondary ">เพิ่ม</p>


            {{-- <p style="position: absolute; right: 0;">เพิ่ม</p> --}}


            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>หัวข้อการประชุม</th>
                            <th>วันที่ใช้งาน</th>
                            <th>เวลาเริ่ม</th>
                            <th>เวลาสิ้นสุด</th>
                            <th>ผู้จอง</th>
                            <th>ลบข้อมูลการจอง</th>
                            <th>เเก้ไขข้อมูลการจอง</th>
                            {{-- <th>เเก้ไข</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookingList as $booking)
                        <tr>
                            <th>{{$booking->bookingId}}</th>
                            <th>{{$booking->bookingAgenda}}</th>
                            <th>{{$booking->bookingDate}}</th>
                            <th>{{$booking->bookingTimeStart}}</th>
                            <th>{{$booking->bookingTimeFinish}}</th>
                            <th>{{$booking->userId}}</th>
                            {{-- <th>{{$booking->firstName}}</th>
                            <th>{{$booking->lastName}}</th> --}}
                            <th><a href="{{route('delete',$booking->bookingId)}} "class="btn btn-danger" onclick="return confirm('คุณต้องการลบการจอง {{$booking->bookingId}}หรือไม่')">ลบ </a></th>
                            <th><a href="/bookingedit/{{$booking->bookingId}}" class="btn btn-warning">เเก้ไข</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
