@extends('layout/secretarylayout')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header" style="background-color: white">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="card-title">ตั้งค่า</div>
                        <p class="card-description">
                           
                        </p>
                    </div>
                    <div>
                        {{-- <form method="post" action="/user/search" class="input-group form-control-sm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" placeholder="ค้นหาด้วยชื่อห้อง" name="roomName" style="background-color: rgba(245, 245, 245, 0.39)">
                            <input type="hidden" value="{{$offset}}" name="offset">
                            <input type="hidden" value="{{$limit}}" name="limit">
                            <input type="submit" class="btn btn-primary" value="ค้นหา" />
                        </form> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
               <p>reset password</p>
               <button></button>
               <a href="/from/changepassword"></a>
                    {{-- <div class="table-responsive">
                        <table id="bookingTable" class="table">
                        <table class="table">
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
                                    <th colspan="2" style="text-align: center">เมนู</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div> --}}
               
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>

@endsection






