@extends('layout/secretarylayout')


@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">จองห้อง</div>
                <p class="card-description">
                    จองห้องประชุม {{$room->roomName}}
                </p>
                @if (session('message'))
                {{-- <h6 class="font-weight-bold text-danger">{{session('message')}}</h6> --}}
                @endif
                <form class="forms-sample"  action="/booking/addbooking" method="post" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="roomnameInput">ชื่อห้องประชุม</label>
                        <input type="text" class="form-control" id="roomnameInput" name="roomName" placeholder="ระบุชื่อห้อง" value="{{$room->roomName}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="roomnameInput">หัวข้อการประชุม</label>
                        <input type="text" class="form-control" id="roomnameInput" name="bookingAgenda" placeholder="ห้องการประชุม" required>
                    </div>
                    <div class="form-group">
                        <label for="roomnameInput">วันที่ใช้ห้อง</label>
                        <input type="date" class="form-control" id="roomnameInput" name="bookingDate" required>
                    </div>
                    <div class="form-group">
                        {{-- <h5 class="font-weight-bold text-danger">{{session('message')}}</h5> --}}
                        {{-- <label for="time ">{{session('message')}}เวลาที่ใช้ห้อง</label> --}}
                        <label for="time">
                            <span style="color: red;">{{ session('message') }}</span> เวลาที่ใช้ห้อง
                        </label>
                        
                        
                        <div class="row" id="time">
                            <div class="col-sm-6">
                                <label for="timestart">เวลาเริ่ม</label>
                                <input type="time" class="form-control" id="timestart" name="bookingTimeStart" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="timeend">เวลาสิ้นสุด</label>
                                <input type="time" class="form-control" id="timeend" name="bookingTimeFinish" required>
                            </div>
                        </div>

                    </div>
                    {{-- userid => 1 --}}
                    <input type="hidden" name="roomId" value="{{$room->roomId}}">
                    <input type="hidden" name="userId" value="{{$userId}}">
                    <input type="submit" class="btn btn-primary" value="จองห้อง">
                </form>
            </div>

        </div>

        </div>



    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">รายการจองห้อง {{$room->roomName}}</h4>
                <p class="card-description">
                    รายละเอียดการจองห้อง
                </p>

                {{-- <p style="position: absolute; right: 0;">เพิ่ม</p> --}}


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center">ลำดับที่</th>
                                <th style="text-align: center">หัวข้อการประชุม</th>
                                <th style="text-align: center">วันที่ใช้งาน</th>
                                <th style="text-align: center">เวลาที่จอง</th>
                                <th style="text-align: center">เวลาเริ่ม</th>
                                <th style="text-align: center">เวลาสิ้นสุด</th>
                                <th style="text-align: center">ผู้จอง</th>
                                {{-- <th>ลบข้อมูลการจอง</th>
                                <th>เเก้ไขข้อมูลการจอง</th> --}}
                                <th colspan="2" style="text-align: center">เมนู</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookingList as $booking)
                            <tr>
                                <td style="text-align: center">{{$booking->bookingId}}</td>
                                <td style="text-align: center">{{$booking->bookingAgenda}}</td>
                                <td style="text-align: center">{{$booking->bookingDate}}</td>
                                {{-- <td style="text-align: center">{{$booking->bookingTimes }}</td> --}}
                                <td style="text-align: center">{{$booking->bookingTimes ?? 'N/A'}}</td>
                                <td style="text-align: center">{{$booking->bookingTimeStart}}</td>
                                <td style="text-align: center">{{$booking->bookingTimeFinish}}</td>
                                <td style="text-align: center">{{$booking->user->firstName." ".$booking->user->lastName}}</td>

                                @if(\Carbon\Carbon::parse($booking->bookingDate." ".$booking->bookingTimeStart)->lt(\Carbon\Carbon::now()))
                                <td colspan="2" style="text-align: center">
                                    ไม่สามารถแก้ไขหรือลบได้เนื่องจากเวลาเลยกำหนด
                                </td>
                                @else
                                @if ($userId != $booking->userId)
                                <td colspan="2" style="text-align: center">
                                    ไม่สามารถแก้ไขหรือลบได้เนื่องจากผู้ใช้ไม่ได้เป็นคนเพิ่ม
                                </td>
                                @else
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
                                        >
                                        แก้ไข</a>
                                        
                                </td>
                                
                                @endif
                                @endif


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
