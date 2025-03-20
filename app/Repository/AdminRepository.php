<?php
namespace App\Repository;

use App\Models\Booking;
use App\Models\User;
use App\DTO\BookingDTO;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use ReturnTypeWillChange;

class AdminRepository{
    public static function AllBooking(){
        // $bookings = Booking::all()
        // ->first()
        // ->orderBy('booking.bookingId','asc')->first();
        // return $bookings;

        return Booking::all();
    
    }
    public static function searchLike(){
        return Booking::all()->where("booking.roomId");
    }
    public static function getAllBookingAdmin($limit=5,$offset=1){
        $k = ((int)$offset-1)*(int)$limit;
        $bookingDat = Booking::select('booking.bookingId', 'booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimes','booking.date','booking.bookingTimeStart', 'booking.bookingTimeFinish', DB::raw('concat(user.department," ",user.phone) as userbookingName'), 'room.roomName')
        ->join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->orderBy('booking.bookingDate','desc')
        ->orderBy('booking.bookingTimeStart','desc')
        ->limit($limit)
        ->offset($k)
        ->get();
        $bookingList = [];
        foreach($bookingDat as $dat){
            $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes,$dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->date,$dat->userbookingName, $dat->roomName);
        }


        return $bookingList;
    }

    public static function getallUsersBooking(){
        return Booking::select("user.userId","user.username","user.phone")
        ->join("user","booking.userId","=","user.userId")->get();
    }
    // public static function getAllUers(){
    //     return User::select("user.userId","user.username","user.phone")->get();
    // }
    public static function getAllUers($limit=6,$offset=1){
        $k = ((int)$offset-1)*(int)$limit;

        return User::select("user.userId","user.username","user.phone")
        ->offset($k)
        ->limit($limit)
        ->get();
    }
//    public static function countAllUserbyAdmin($limit=5){
//     $count  = User::count();
//     return (int)ceil($count /$limit);
//    }
public static function countAllUserbyAdmin($limit=6)
{
    return User::count(); // Or whatever query is used to count users
}
// public static function countAllUserbyAdmin()
// {
//     return User::count(); // Or whatever query is used to count users
// }

    // public static function getSearchByAdmin($limit=5,$offset=1){
    //     $k = ((int)$offset-1)*(int)$limit;
    //     $bookingDat = Booking::select('booking.bookingId', 'booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimeStart', 'booking.bookingTimeFinish', DB::raw('concat(user.department," ",user.phone) as userbookingName'), 'room.roomName')
    //     ->join('user','booking.userId','=','user.userId')
    //     ->join('room', 'booking.roomId','=','room.roomId')
    //     ->orderBy('booking.bookingDate','desc')
    //     ->orderBy('booking.bookingTimeStart','desc')
    //     ->limit($limit)
    //     ->offset($k)
    //     ->get();
    //     $bookingList = [];
    //     foreach($bookingDat as $dat){
    //         $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes,$dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->userbookingName, $dat->roomName);
    //     }


    //     return $bookingList;
    // }
    // public static function countBookingSearchByAdmin($userId,$roomName,$limit){
    //     $count = $bookingDat = Booking::join('user','booking.userId','=','user.userId')
    //     ->join('room','booking.roomId','=','room.roomId')
    //     ->where('room.roomName','like',"%{$roomName}")->get()->count();
    //     return (int)ceil($count/$limit);
    // }
    // public static function searchingallRoom($roomName,$userId){
    //     return Booking::select('booking.roomId','room.roomName','user.username','user.phone')
    //     ->join('room','room.roomId','=','booing','booking.roomId')
    //     ->join('user','user.userId','=','booking','booking.roomId')
    //     ->where('room.roomName','like',"%{$roomName}%")
    //     ->orderByDesc('booking.roomId')
    //     ->get();
    // }

    public static function searchingallRoom($userId, $roomName,$limit=5,$offset=1) {
        $k = ($offset - 1) * $limit;
        $bookingList = Booking::select('booking.roomId', 'room.roomName', 'user.username', 'user.phone')
            ->join('room', 'room.roomId', '=', 'booking.roomId') // แก้ชื่อ booking ที่ผิดพลาด
            ->join('user', 'user.userId', '=', 'booking.userId') // แก้เงื่อนไข join
            ->where('room.roomName', 'like', "%{$roomName}%") // ค้นหาห้องตามเงื่อนไข
            ->orderByDesc('booking.roomId')
            ->limit($limit)
            ->offset($k)
            ->get();
            return $bookingList;
    }
    public static function getUserBookingByadmin($userId,$limit=5,$offset=1){
        // SELECT booking.bookingId, booking.bookingAgenda, booking.bookingDate, booking.bookingTimeStart, booking.bookingTimeFinish, concat(user.firstName," ",user.lastName) as userbookingName, user.userId, room.roomName
        // FROM booking INNER JOIN user ON booking.userId = user.userId INNER JOIN room ON booking.roomId = room.roomId
        // WHERE booking.userId = 7 ORDER BY booking.bookingDate DESC, booking.bookingTimeStart DESC LIMIT J OFFSET K;
        // a1+(n-1)*d => k = 1+($offset-1)*$limit
        // J = $limit
        // $k = ($offset - 1) * $limit;
        $k = ((int)$offset-1)*(int)$limit;
        $bookingDat = Booking::select('booking.bookingId', 'booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimes', 'booking.date','booking.bookingTimeStart', 'booking.bookingTimeFinish', DB::raw('concat(user.department," ",user.phone) as userbookingName'), 'room.roomName')
        ->join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->where('user.userId','=',$userId)
        ->orderBy('booking.bookingDate','desc')
        ->orderBy('booking.bookingTimeStart','desc')
        ->limit($limit)
        ->offset($k)

        // ->setBindings(['userId' => $userId])
        ->get();


        $bookingList = [];
        foreach($bookingDat as $dat){
            $bookingList[] = new BookingDTO($dat->bookingId,$dat->bookingAgenda,$dat->bookingDate,$dat->bookingTimes,$dat->bookingTimeStart,$dat->bookingTimeFinish,$dat->date,$dat->userbookingName,$dat->roomName);
            // $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes, $dat->bookingTimeStart, $dat->bookingTimeFinish,$dat->date, $dat->userbookingName, $dat->roomName);
            // $bookingList[] = new BookingDTO(bookingId: $dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes,$dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->userbookingName, $dat->roomName);
        }


        return $bookingList;

    }

    public static function getUserBookingSearchbyAdmin($userId, $roomName, $limit=5,$offset=1){
        $k = ((int)$offset-1)*(int)$limit;
        // $k = ($offset - 1) * $limit;
        $bookingDat = Booking::select('booking.bookingId', 'booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimeStart', 'booking.bookingTimeFinish', DB::raw('concat(user.department," ",user.phone) as userbookingName'), 'room.roomName')
        ->join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->where('user.userId','=',$userId)
        ->where('room.roomName','like',"%{$roomName}%")
        ->orderBy('booking.bookingDate','desc')
        ->orderBy('booking.bookingTimeStart','desc')
        ->limit($limit)
        ->offset($k)
        ->get();
        // dd($bookingDat);
        $bookingList = [];
        foreach($bookingDat as $dat){
            $bookingList[] = new BookingDTO($dat->bookingId,$dat->bookingAgenda,$dat->bookingDate,$dat->bookingTimes,$dat->bookingTimeStart,$dat->bookingTimeFinish,$dat->date,$dat->userbookingName,$dat->roomName);
            // $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->date,$dat->userbookingName, $dat->roomName,$dat->bookingTimes);
            // $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes,$dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->userbookingName, $dat->roomName);
        }
        return $bookingList;
    }
    public static function getSearchByInformation($infomation, $limit=5, $offset=1){
        $k = ((int)$offset-1)*(int)$limit;
        $bookingDat = Booking::select('booking.bookingId', 'booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimeStart', 'booking.bookingTimeFinish', DB::raw('concat(user.username," ",user.phone) as userbookingName'), 'room.roomName')
        ->join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->where('user.username','like',"%{$infomation}%")
        ->orWhere('room.roomName','like',"%{$infomation}%")
        ->orWhere('booking.bookingAgenda', 'like', "%{$infomation}%")
        ->orderBy('booking.bookingDate','desc')
        ->orderBy('booking.bookingTimeStart','desc')
        ->limit($limit)
        ->offset($k)
        ->get();
        // dd($bookingDat);
        $bookingList = [];
        foreach($bookingDat as $dat){
            $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes, $dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->date,$dat->userbookingName, $dat->roomName);
            // $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->userbookingName, $dat->roomName,$dat->bookingTimes);
            // $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes,$dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->userbookingName, $dat->roomName);
        }
        return $bookingList;

    }
    // public static function getSearchUserNamebyAdmin($infomation, $limit=6, $offset=1){
    //     $k = ((int)$offset-1)*(int)$limit;
    //    return User::select('user.username')
    //     ->where('user.username','like',"%{$infomation}%")
    //     // ->where('user.phone','like',"%{$infomation}%")
    //     ->limit($limit)
    //     ->offset($k)
    //     ->get();
    // }
    // public static function countSearchUserNamebyAdmin($infomation, $limit){
    //     $count = User::where('user.username', 'like', "%{$infomation}%")->count();

    //     // Return the ceiling of count / limit to get the total number of pages
    //     return (int)ceil($count / $limit);
    // }
    public static function getSearchUserNamebyAdmin($infomation, $limit=6, $offset=1){
        $k = ((int)$offset-1)*(int)$limit;
       return User::select('user.username','user.phone')
        ->where('user.username','like',"%{$infomation}%")
        ->where('user.phone','like',"%{$infomation}%")
        ->limit($limit)
        ->offset($k)
        ->get();
    }
    public static function countSearchUserNamebyAdmin($infomation, $limit){
        $count = User::where('user.username', 'like', "%{$infomation}%")->count();

        // Return the ceiling of count / limit to get the total number of pages
        return (int)ceil($count / $limit);
    }
    public static function countUserBookingbyAdmin($userId, $limit){
        $count =  $bookingDat = Booking::join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')->where('user.userId','=',$userId)->get()->count();
        return (int)ceil($count/$limit);
    //     $count = Booking::join('user', 'booking.userId', '=', 'user.userId')
    //     ->join('room', 'booking.roomId', '=', 'room.roomId')
    //     ->where('user.userId', '=', $userId)
    //     ->count();  // Simply count the total records

    // return (int) ceil($count/$limit);  // Return the number of pages
    }
    public static function countSearchByInformation($infomation, $limit){
       $count =  User::where('user.username', 'like', "%{$infomation}%")
        
        ->get()->count();
        return (int)ceil($count/$limit);
    }
  

    public static function countUserBookingSearchbyAdmin($userId, $roomName, $limit){
        $count =  $bookingDat = Booking::join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->where('user.userId','=',$userId)
        ->where('room.roomName','like',"%{$roomName}%")->get()->count();
        return (int)ceil($count/$limit);
    //     $count = Booking::join('user', 'booking.userId', '=', 'user.userId')
    //     ->join('room', 'booking.roomId', '=', 'room.roomId')
    //     ->where('user.userId', '=', $userId)
    //     ->where('room.roomName', 'like', "%{$roomName}%")
    //     ->count();  // Simply count the total records

    // return (int) ceil($count/$limit);  // Return the number of pages
    }
    public static function serachbookingbyAdmin($roomName,$userId,$offset,$limit){
        $k = ((int)$offset-1)*(int)$limit;
        $bookingList = Booking::select('room.roomName')
        ->join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->where('user.userId','=',$userId)
        ->where('room.roomName','like',"%{$roomName}%")
        ->orderBy('booking.bookingDate','desc')
        ->orderBy('booking.bookingTimeStart','desc')
        ->limit($limit)
        ->offset($k)
        ->get();
        return $bookingList;
    }

  

    }

    
?>