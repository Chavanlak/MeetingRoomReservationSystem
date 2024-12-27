<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\RoomRepository;
use App\Repository\BookingRepository;

use Carbon\Carbon;
use Hamcrest\Text\SubstringMatcher;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    // input time and information for booking
    public static function getBookingInRoom($roomId){
        $room = RoomRepository::getRoomById($roomId);
        $userId = Auth::user()->userId;
        $bookingList = BookingRepository::getBookingInRoomWithId($roomId);
        // dd($bookingList->toSql());
        // dd($bookingList['0']);
        // $bookingList = $room->booking;
        return view('booking/bookingroom',compact('room','userId','bookingList'));
        // return view('room/roomalbum',compact('room','userId','bookingList'));
    }

    public static function addBooking(Request $req){
        $bookingAgenda = $req->bookingAgenda;
        $bookingDate = $req->bookingDate;
        $bookingTimeStart = Carbon::parse($req->bookingTimeStart);
        $bookingTimeFinish = Carbon::parse($req->bookingTimeFinish);
        $userId = $req->userId;
        $roomId = $req->roomId;
        $dateNow = Carbon::now();
        $dateSelect = Carbon::parse($bookingDate." ".$bookingTimeStart->format('H:i:s'));
        $bookingDurationMinutes = $bookingTimeFinish->diffInMinutes($bookingTimeStart);

        if ($dateSelect->lt($dateNow)) {
            return redirect('/booking/' . $roomId)->with('message', 'ไม่สามารถจองย้อนหลังได้');
        }


        if ($bookingDurationMinutes < 60) {
            return redirect('/booking/' . $roomId)->with('message', 'ต้องจองเวลาเท่ากับ 1 ชั่วโมงเท่านั้น');
        }

        if($bookingTimeFinish < $bookingTimeStart){
            return redirect('/booking/' . $roomId)->with('message', 'กรอกเวลาผิดพลาด');
        }

        $bookingTimes = now();
        $result = BookingRepository::addBooking(
            $bookingAgenda,
            $bookingDate,
            // $bookingTimes,
            $bookingTimeStart->format('H:i:s'),
            $bookingTimeFinish->format('H:i:s'),
            $userId,
            $roomId
        );


        if ($result) {
            // edit redirect to mybooking in user dashbord page
            return redirect('/user/dashbord')->with('message', 'จองสำเร็จ');
        }

        return redirect('/booking/' . $roomId)->with('message', 'ไม่สามารถจองได้เพราะทับเวลาคนอื่น');
    }


    public static function updateBookingbyId($bookingId){
        $booking = BookingRepository::getBookingbyId($bookingId);
        $room = RoomRepository::getRoomById($booking->roomId);
        return view('booking/bookingupdate',compact('booking','room'));

    }
    public static function editBookingbyId(Request $req){
        $bookingId = $req->bookingId;
        $bookingAgenda = $req->bookingAgenda;
        $bookingDate = $req->bookingDate;
        $bookingTimeStartCar = Carbon::parse($req->bookingTimeStart);
        $bookingTimeFinishCar = Carbon::parse($req->bookingTimeFinish);
        $bookingTimeStart = $req->bookingTimeStart ;
        $bookingTimeFinish = $req->bookingTimeFinish;
        $roomId = $req->roomId;

        $dateNow = Carbon::now();
        $dateSelect = Carbon::parse($bookingDate." ".$bookingTimeStart);
        $bookingDurationMinutes = $bookingTimeFinishCar->diffInMinutes($bookingTimeStartCar);

        if ($dateSelect->lt($dateNow)) {
            return redirect('/booking/' . $roomId)->with('message', 'ไม่สามารถจองย้อนหลังได้');
        }


        if ($bookingDurationMinutes < 60) {
            return redirect('/booking/' . $roomId)->with('message', 'ต้องจองเวลาเท่ากับ 1 ชั่วโมงเท่านั้น');
        }

        if($bookingTimeFinish < $bookingTimeStart){
            return redirect('/booking/' . $roomId)->with('message', 'กรอกเวลาผิดพลาด');
        }


        $updateResult = BookingRepository::update( $bookingId,$bookingAgenda,$bookingDate,$bookingTimeStart,$bookingTimeFinish,$roomId);
        if(!$updateResult){
            return redirect('/booking/'.$roomId)->with('message','ไม่สามารถแก้ไขการจองได้เพราะทับเวลาคนอื่น');
        }




        return redirect('/booking/'.$roomId);
        // return redirect('/room/'.$roomId);
    }
    public static function showfirstpage(){
        $roomList = RoomRepository::getAll();
        $bookingList = array();
        foreach($roomList as $room){
            $bookingList[] = BookingRepository::getBookingDetailinCurrentDate($room->roomId);
        }
        return view('room/roomalbum',compact('roomList','bookingList'));

    }

// new controller for booking method

    // update for user
    public static function editbookingWithId($bookingId){
        $booking = BookingRepository::getBookingbyId($bookingId);
        $room = RoomRepository::getRoomById($booking->roomId);
        return view('booking/userbookingupdate',compact('booking','room'));
    }

    public static function updateBookingWithId(Request $req){
        $bookingId = $req->bookingId;
        $bookingAgenda = $req->bookingAgenda;
        $bookingDate = $req->bookingDate;
        $bookingTimeStartCar = Carbon::parse($req->bookingTimeStart);
        $bookingTimeFinishCar = Carbon::parse($req->bookingTimeFinish);
        $bookingTimeStart = $req->bookingTimeStart ;
        $bookingTimeFinish = $req->bookingTimeFinish;
        $roomId = $req->roomId;

        $dateNow = Carbon::now();
        $dateSelect = Carbon::parse($bookingDate." ".$bookingTimeStart);
        $bookingDurationMinutes = $bookingTimeFinishCar->diffInMinutes($bookingTimeStartCar);

        if ($dateSelect->lt($dateNow)) {
            return redirect('/booking/editbooking/'.$bookingId)->with('message', 'ไม่สามารถจองย้อนหลังได้');
        }


        if ($bookingDurationMinutes < 60) {
            return redirect('/booking/editbooking/'.$bookingId)->with('message', 'ต้องจองเวลาเท่ากับ 1 ชั่วโมงเท่านั้น');
        }

        if($bookingTimeFinish < $bookingTimeStart){
            return redirect('/booking/editbooking/'.$bookingId)->with('message', 'กรอกเวลาผิดพลาด');
        }

        $updateResult = BookingRepository::update($bookingId,$bookingAgenda,$bookingDate,$bookingTimeStart,$bookingTimeFinish,$roomId);
        if(!$updateResult){
            return redirect('/booking/editbooking/'.$bookingId)->with('message','ไม่สามารถแก้ไขการจองได้เพราะทับเวลาคนอื่น');
        }


        return redirect('/booking/editbooking/'.$bookingId)->with('success','แก้ไขการจองเรียบร้อย');
    }
    // update for admin
    public static function admineditbookingWithId($bookingId){
        $booking = BookingRepository::getBookingbyId($bookingId);
        $room = RoomRepository::getRoomById($booking->roomId);
        return view('booking/adminbookingupdate',compact('booking','room'));
    }

    public static function adminupdateBookingWithId(Request $req){
        $bookingId = $req->bookingId;
        $bookingAgenda = $req->bookingAgenda;
        $bookingDate = $req->bookingDate;
        $bookingTimeStartCar = Carbon::parse($req->bookingTimeStart);
        $bookingTimeFinishCar = Carbon::parse($req->bookingTimeFinish);
        $bookingTimeStart = $req->bookingTimeStart ;
        $bookingTimeFinish = $req->bookingTimeFinish;
        $roomId = $req->roomId;

        $dateNow = Carbon::now();
        $dateSelect = Carbon::parse($bookingDate." ".$bookingTimeStart);
        $bookingDurationMinutes = $bookingTimeFinishCar->diffInMinutes($bookingTimeStartCar);

        if ($dateSelect->lt($dateNow)) {
            return redirect('/admin/editbooking/'.$bookingId)->with('message', 'ไม่สามารถจองย้อนหลังได้');
        }


        if ($bookingDurationMinutes < 60) {
            return redirect('/admin/editbooking/'.$bookingId)->with('message', 'ต้องจองเวลาเท่ากับ 1 ชั่วโมงเท่านั้น');
        }

        if($bookingTimeFinish < $bookingTimeStart){
            return redirect('/admin/editbooking/'.$bookingId)->with('message', 'กรอกเวลาผิดพลาด');
        }


        $updateResult = BookingRepository::update($bookingId,$bookingAgenda,$bookingDate,$bookingTimeStart,$bookingTimeFinish,$roomId);
        if(!$updateResult){
            return redirect('/admin/editbooking/'.$bookingId)->with('message','ไม่สามารถแก้ไขการจองได้เพราะทับเวลาคนอื่น');
        }
        return redirect('/admin/editbooking/'.$bookingId)->with('success','แก้ไขการจองเรียบร้อย');
    }
    // add new




}
