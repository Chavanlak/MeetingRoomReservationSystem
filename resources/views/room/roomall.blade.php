@extends('layout/guestlayout')


@section('title')
<title>All rooms</title>
@endsection


@section('content')
<div class="row">
    @foreach ($roomList as $room)
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">{{$room->roomName}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection


