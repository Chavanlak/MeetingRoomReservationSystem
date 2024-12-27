<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BookingRepository;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
class UserController extends Controller
{
    public static function dashbord(){
        $offset = 1;
        $limit = 5;
        $bookingList = BookingRepository::getUserBooking(Auth::user()->userId);
        $count = BookingRepository::countUserBooking(Auth::user()->userId, $limit);
        $stringPage = "/user/dashbord/".$limit."/";
        // dd($count);
        return view('dashbord/userdashbord',compact('bookingList','offset','limit', 'stringPage','count'));
    }

    public static function datatab(Request $request){
        if($request->ajax()){
            $bookingList = BookingRepository::getUserBooking(Auth::user()->userId);
            return DataTables::of($bookingList)->addIndexColumn()->make(true);
        }
    }

    public static function datatab2(){
        return view('dashbord/userdashborddatatable');
    }

    public static function dashbordlimit($limit,$offset){
        $bookingList = BookingRepository::getUserBooking(Auth::user()->userId, $limit, $offset);
        $count = BookingRepository::countUserBooking(Auth::user()->userId, $limit);
        $stringPage = "/user/dashbord/".$limit."/";
        return view('dashbord/userdashbord',compact('bookingList','offset','limit', 'stringPage','count'));
    }

    public static function searchbooking(Request $req){
        $offset = 1;
        $limit = $req->limit;
        $roomName = $req->roomName;
        $bookingList = BookingRepository::getUserBookingSearch(Auth::user()->userId,$roomName,$limit,$offset);
        $stringPage = "/user/search/".$roomName."/".$limit."/";
        $count = BookingRepository::countUserBookingSearch(Auth::user()->userId,$roomName, $limit);
        return view('dashbord/userdashbord',compact('bookingList','offset','limit', 'stringPage','count'));
    }

    public static function searchnextpage($roomName, $limit, $offset){
        $bookingList = BookingRepository::getUserBookingSearch(Auth::user()->userId,$roomName,$limit, $offset);
        $stringPage = "/user/search/".$roomName."/".$limit."/";
        $count = BookingRepository::countUserBookingSearch(Auth::user()->userId,$roomName, $limit);
        return view('dashbord/userdashbord',compact('bookingList','offset','limit', 'stringPage','count'));
    }
   
}
