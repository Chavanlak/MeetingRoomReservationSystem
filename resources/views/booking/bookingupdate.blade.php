@extends('layout/secretarylayout')


@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">เเก้ไขการจอง</div>
                <p class="card-description">
                    เเก้ไขการจองห้องประชุม {{$room->roomName}}
                </p>
                @if (session('message'))
                <h6 class="font-weight-bold text-danger">{{session('message')}}</h6>
                @endif
                <form class="forms-sample"  action="/bookingupdate" method="post" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="roomnameInput">ชื่อห้องประชุม</label>
                        <input type="text" class="form-control" id="roomnameInput" name="roomName" placeholder="ระบุชื่อห้อง" value="{{$room->roomName}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="roomnameInput">หัวข้อการประชุม</label>
                        <input type="text" class="form-control" id="roomnameInput" name="bookingAgenda" placeholder="ห้องการประชุม" value="{{$booking->bookingAgenda}}" required>
                    </div>
                    <div class="form-group">
                        <label for="roomnameInput">วันที่ใช้ห้อง</label>
                        <input type="date" class="form-control" id="roomnameInput" name="bookingDate" value="{{$booking->bookingDate}}" required>
                    </div>
                    <div class="form-group">
                        <label for="time">เวลาที่ใช้ห้อง</label>
                        <div class="row" id="time">
                            <div class="col-sm-6">
                                <label for="timestart">เวลาเริ่ม</label>
                                <input type="time" class="form-control" id="timestart" name="bookingTimeStart" value="{{$booking->bookingTimeStart}}" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="timeend">เวลาสิ้นสุด</label>
                                <input type="time" class="form-control" id="timeend" name="bookingTimeFinish" value="{{$booking->bookingTimeFinish}}" required>
                            </div>
                        </div>

                    </div>
                    {{-- userid => 1 --}}
                    <input type="hidden" name="roomId" value="{{$room->roomId}}">
                    <input type="hidden" name="bookingId" value="{{$booking->bookingId}}">
                    <input type="hidden" name="userId" value="{{$booking->userId}}">
                    <input type="submit" class="btn btn-warning" value="เเก้ไข">
                </form>
            </div>

        </div>

        </div>

    </div>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const timeStartInput = document.getElementById("timestart");
        const timeEndInput = document.getElementById("timeend");

        timeStartInput.addEventListener("change", function () {
            if (timeStartInput.value) {
                let startTime = timeStartInput.value.split(":");
                let hours = parseInt(startTime[0]);
                let minutes = parseInt(startTime[1]);

                // เพิ่ม 1 ชั่วโมง
                hours += 1;

                // กรณีชั่วโมงเกิน 23 ให้กลับไปเป็น 00 (เช่นเลือก 23:30 -> 00:30)
                if (hours >= 24) {
                    hours = 0;
                }

                // แปลงให้เป็นรูปแบบ 2 หลัก เช่น 09:00
                let formattedHours = hours.toString().padStart(2, "0");
                let formattedMinutes = minutes.toString().padStart(2, "0");

                // ตั้งค่าเวลาเสร็จสิ้นอัตโนมัติ
                timeEndInput.value = `${formattedHours}:${formattedMinutes}`;
            }
        });
    });
</script>
