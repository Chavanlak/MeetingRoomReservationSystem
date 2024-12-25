@extends('layout/secretarylayout')


@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">เเก้ไขการจองห้อง</div>
                <p class="card-description">
                    เเก้ไขการจองห้องประชุม {{$room->roomName}}
                </p>
                @if (session('message'))
                <h6 class="font-weight-bold text-danger">{{session('message')}}</h6>
                @endif

                @if (session('success'))
                <h6 class="font-weight-bold text-success">{{session('success')}}</h6>
                @endif
                <form class="forms-sample"  action="/booking/updatebooking" method="post" >
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
