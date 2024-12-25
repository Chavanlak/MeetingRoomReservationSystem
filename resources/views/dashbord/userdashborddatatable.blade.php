@extends('layout/secretarylayout')


@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header" style="background-color: white">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="card-title">การจองของฉัน</div>
                        <p class="card-description">
                            ประวัติการจองห้อง
                        </p>
                    </div>
                </div>
{{--                <div>--}}
{{--                    <form method="post" action="/user/search" class="input-group form-control-sm">--}}
{{--                        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                        <input type="text" placeholder="ค้นหาด้วยชื่อห้อง" name="roomName" style="background-color: rgba(245, 245, 245, 0.39)">--}}
{{--                        <input type="hidden" value="{{$offset}}" name="offset">--}}
{{--                        <input type="hidden" value="{{$limit}}" name="limit">--}}
{{--                        <input type="submit" class="btn btn-primary" value="ค้นหา" />--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="bookingTable" class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center">ลำดับ</th>
                                <th style="text-align: center">หัวข้อการประชุม</th>
                                <th style="text-align: center">วันที่ใช้งาน</th>
                                <th style="text-align: center">เวลาที่จอง</th>
                                <th style="text-align: center">เวลาเริ่ม</th>
                                <th style="text-align: center">เวลาสิ้นสุด</th>
                                <th style="text-align: center">ผู้จอง</th>
                                <th style="text-align: center">ชื่อห้อง</th>
{{--                                <th colspan="2" style="text-align: center">เมนู</th>--}}
                            </tr>
                        </thead>
                        <tbody>
{{--                        @foreach ($bookingList as $booking)--}}
{{--                            <tr>--}}
{{--                                <td>1</td>--}}
{{--                                <td style="text-align: center">{{$loop->iteration+((int)$offset-1)*(int)$limit}}</td>--}}
{{--                                <td style="text-align: center">{{$booking->bookingAgenda}}</td>--}}
{{--                                <td style="text-align: center">{{$booking->bookingDate}}</td>--}}
{{--                                <td style="text-align: center">{{$booking->bookingTimes ?? 'N/A'}}</td>--}}
{{--                                <td style="text-align: center">{{$booking->bookingTimeStart}}</td>--}}
{{--                                <td style="text-align: center">{{$booking->bookingTimeFinish}}</td>--}}
{{--                                <td style="text-align: center">{{$booking->userbookingName}}</td>--}}
{{--                                <td style="text-align: center">{{$booking->roomName}}</td>--}}

{{--                                --}}{{-- <td>{{\Carbon\Carbon::now()}}</td> --}}
{{--                                --}}{{-- <td>{{\Carbon\Carbon::parse($booking->bookingDate." ".$booking->bookingTimeStart)->lt(\Carbon\Carbon::now())}}</td> --}}
{{--                                @if (\Carbon\Carbon::parse($booking->bookingDate." ".$booking->bookingTimeStart)->lt(\Carbon\Carbon::now()))--}}
{{--                                    <td colspan="2" style="text-align: center">--}}
{{--                                        ไม่สามารถแก้ไขหรือลบได้เนื่องจากเวลาเลยกำหนด--}}
{{--                                    </td>--}}
{{--                                @else--}}
{{--                                    <td>--}}
{{--                                        <a href="{{route('delete',$booking->bookingId)}} "class="btn btn-danger" onclick="return confirm('คุณต้องการลบการจอง {{$booking->bookingId}}หรือไม่')">ลบ </a>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="/booking/editbooking/{{$booking->bookingId}}" class="btn btn-warning" >เเก้ไข</a>--}}
{{--                                    </td>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptadd')
<script type="text/javascript">
    // let table = new DataTable('#bookingTable');
    $(function (){
        var table = $('#bookingTable').DataTable({
            processing : true,
            serverSide : true,
            ajax :{
                type:"get",
                url : "{{ route('user.datatab') }}",
                // dataType:json
            },
            columns : [
                {data : 'bookingId', name : 'bookingId'},
                {data : 'bookingAgenda', name : 'bookingAgenda'},
                {data : 'bookingDate', name : 'bookingDate'},
                {data : 'bookingTimes', name : 'bookingTimes'},
                {data : 'bookingTimeStart', name : 'bookingTimeStart'},
                {data : 'bookingTimeFinish', name : 'bookingTimeFinish'},
                {data : 'userbookingName', name : 'userbookingName'},
                {data : 'roomName', name : 'roomName'}
            ]
        });



    });
</script>
@endsection
