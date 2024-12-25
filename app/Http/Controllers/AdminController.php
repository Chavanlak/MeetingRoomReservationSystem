<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BookingRepository;
class AdminController extends Controller
{
    public static function dashbord(){
        $offset = 1;
        $limit = 5;
        $bookingList = BookingRepository::getBookingAdmin($limit,$offset);
        $count = BookingRepository::countBookingAdmin($limit);
        $stringPage = "/admin/dashbord/".$limit."/";
        return view('dashbord/admindashbord',compact('bookingList','offset','limit', 'stringPage','count'));
    }

    public static function dashbordlimit($limit, $offset){
        $bookingList = BookingRepository::getBookingAdmin($limit,$offset);
        $count = BookingRepository::countBookingAdmin($limit);
        $stringPage = "/admin/dashbord/".$limit."/";
        return view('dashbord/admindashbord',compact('bookingList','offset','limit', 'stringPage','count'));
    }

    public static function searchlike(Request $req){
        //eiei
    }
}

