<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repository\RoomRepository;
use App\Repository\BookingRepository;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller{
    public static function getAllRoom(){
        $roomList = RoomRepository::getAll();
        return view('room/roomall',compact('roomList'));
    }


    public static function getAllroomAlbum(){
        $roomList = RoomRepository::getAll();
        $bookingList = array();
        foreach($roomList as $room){
            $bookingList[] = BookingRepository::getBookingDetailinCurrentDate($room->roomId);
        }
        return view('room/roomalbum',compact('roomList','bookingList'));
        // return view('room/roomalbum',compact('roomList'));
    }
    public static function getBookinginRoom($roomId){
        $room = RoomRepository::getRoomById($roomId);
        $bookingList = $room->booking;
        // return view('/',compact('bookingList'));
        return view('booking/bookinghis',compact('bookingList','room'));
        // return view('room/roomalbum',compact('bookingList','room'));
    }
    // public static function getBookinginRoom($roomId){
    //     $room = RoomRepository::getRoomById($roomId);
    //     $bookingList = $room->booking;
    //     return view('booking/bookinghis',compact('bookingList','room'));
    // }
//    public static function deleteBookinginRoom($roomId){
//     $room = RoomRepository::getRoomById($roomId);
//     $bookingList = $room->booking();
//     return view('booking/bookinghis',compact('bookingList','room'));
//    }

    public static function deleteBookinginRoom($bookingId){
        $booking = DB::table('booking')->where('bookingId',$bookingId)->first();
        $roomId = $booking->roomId;
        DB::table('booking')->where('bookingId',$bookingId)->delete();
        // dd(DB::table('booking')->where('bookingId',$bookingId)->delete());
        // return redirect('/room/'.$roomId);

        return redirect('/user/dashbord');

    }
    // public static function updateBookingRoom( Request $req,$bookingId){
    //    $booking = DB::table('booking')->where('bookingId',$bookingId)->first();
    //     $roomId = $booking->roomId;
    //     DB::table('booking')->where('bookingId',$bookingId)->update($bookingId);

    // }
    // public static function addRoom($roomId){
    //     $room = RoomRepository::getRoomById($roomId);
    //     DB::table('booking')->where('roomId',$roomId)->add();
    //     return view('/room/'.$roomId);
    // }

}
