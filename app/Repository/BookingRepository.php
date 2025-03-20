<?php

namespace App\Repository;

use App\Models\Booking;
use App\DTO\BookingDTO;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class BookingRepository
{
    public static function addBooking($bookingAgenda, $bookingDate, $bookingTimeStart, $bookingTimeFinish, $userId, $roomId)
    {
        $bookingTimeStart = Carbon::parse($bookingTimeStart)->format('H:i:s');
        $bookingTimeFinish = Carbon::parse($bookingTimeFinish)->format('H:i:s');

        DB::enableQueryLog();
        $isbooking = DB::select('
            select exists(
                select *
                from booking
                where
                    (
                        ((? > booking.bookingTimeStart and ? < booking.bookingTimeFinish) or (? > booking.bookingTimeStart and ? < booking.bookingTimeFinish))
                        or
                        (booking.bookingTimeStart <= ? and booking.bookingTimeFinish >= ?)
                        or
                        ((booking.bookingTimeStart > ? and booking.bookingTimeStart < ?) or (booking.bookingTimeFinish > ? and booking.bookingTimeFinish < ?))
                    )
                    and booking.roomId = ?
                    and booking.bookingDate = ?
            ) as result ', [$bookingTimeStart, $bookingTimeStart, $bookingTimeFinish, $bookingTimeFinish, $bookingTimeStart, $bookingTimeFinish, $bookingTimeStart, $bookingTimeFinish, $bookingTimeStart, $bookingTimeFinish, $roomId, $bookingDate]);
        if ($isbooking['0']->result == 0) {
            $booking = new Booking();
            $booking->bookingAgenda = $bookingAgenda;
            $booking->bookingDate = $bookingDate;
            // $booking->bookingTimes = $bookingTimes;
            $booking->bookingTimeStart= $bookingTimeStart;
            $booking->bookingTimeFinish = $bookingTimeFinish;
            $booking->userId = $userId;
            $booking->roomId= $roomId;
            $booking->bookingTimes = Carbon::now()->format('H:i:s'); // บันทึกเวลาปัจจุบัน
            $booking->date = Carbon::now()->toDateString(); // บันทึกวันที่ปัจจุบัน
            // $booking->bookingTimes = now();
            // $booking->date = now();
            // $booking->date = Carbon::now()->toDateString(); // ใช้คอลัมน์ date ที่มีอยู่แล้ว
            return $booking->save();
        }
        return false;
    }
    //update
    public static function getBookingbyId($bookingId)
    {
        $booking = Booking::where('bookingId', '=', $bookingId)->first();
        return $booking;
    }
    public static function update($bookingId, $bookingAgenda, $bookingDate, $bookingTimeStart, $bookingTimeFinish, $roomId)
    {
        // SELECT booking.bookingId, booking.bookingDate, booking.bookingTimeStart, booking.bookingTimeFinish, room.roomId FROM booking INNER JOIN room on booking.roomId = room.roomId WHERE booking.bookingDate = "2024-11-30" AND room.roomId = 2 AND (
        // (('20:02:00' BETWEEN booking.bookingTimeStart AND booking.bookingTimeFinish) OR ('21:02:00' BETWEEN booking.bookingTimeStart AND booking.bookingTimeFinish))
        //      OR (booking.bookingTimeStart < '20:02:00' AND booking.bookingTimeFinish > '21:02:00');
        // );

        // SELECT EXISTS(SELECT * FROM booking INNER JOIN room on booking.roomId = room.roomId WHERE booking.bookingDate = '2024-11-30' AND room.roomId = 2 AND (
        //     (('20:02:00' BETWEEN booking.bookingTimeStart AND booking.bookingTimeFinish) OR ('21:02:00' BETWEEN booking.bookingTimeStart AND booking.bookingTimeFinish))
        //     OR (booking.bookingTimeStart < '20:02:00' AND booking.bookingTimeFinish > '21:02:00')
        // )) as result;


        DB::enableQueryLog();
        $isbooking = DB::select('
            select exists(
                select *
                from booking
                where
                    (
                        ((? > booking.bookingTimeStart and ? < booking.bookingTimeFinish) or (? > booking.bookingTimeStart and ? < booking.bookingTimeFinish))
                        or
                        (booking.bookingTimeStart <= ? and booking.bookingTimeFinish >= ?)
                        or
                        ((booking.bookingTimeStart > ? and booking.bookingTimeStart < ?) or (booking.bookingTimeFinish > ? and booking.bookingTimeFinish < ?))
                    )
                    and booking.roomId = ?
                    and booking.bookingDate = ?
                    and booking.bookingId != ?
            ) as result ', [$bookingTimeStart, $bookingTimeStart, $bookingTimeFinish, $bookingTimeFinish, $bookingTimeStart, $bookingTimeFinish, $bookingTimeStart, $bookingTimeFinish, $bookingTimeStart, $bookingTimeFinish, $roomId, $bookingDate, $bookingId]);
        if ($isbooking['0']->result == 0) {
            $result = Booking::where('bookingId', '=', $bookingId)->update([
                'bookingAgenda' => $bookingAgenda,
                'bookingDate' => $bookingDate,
                'bookingTimeStart' => $bookingTimeStart,
                'bookingTimeFinish' => $bookingTimeFinish
            ]);
            return $result;
        }
        return false;
    }
    public static function getBookingInRoombyUserId($roomId, $userId)
    {
        $booking = Booking::where('booking.roomId', '=', $roomId)->where('booking.userId', '=', $userId)->orderBy('booking.bookingDate','DESC')->orderBy('booking.bookingTimeStart','DESC')->get();
        return  $booking;
    }

    public static function getBookingInRoomWithId($roomId){
        $booking = Booking::where('booking.roomId', '=', $roomId)->orderBy('booking.bookingDate','DESC')->orderBy('booking.bookingTimeStart','DESC')->get();
        return  $booking;
    }

    // public static function getBookingDetailinCurrentDate($roomId){
    //     // SELECT booking.bookingAgenda, booking.bookingDate, booking.bookingTimeStart, booking.bookingTimeFinish, booking.roomId, user.firstName, user.lastName FROM booking INNER JOIN user ON booking.userId = user.userId WHERE booking.bookingDate = CURRENT_DATE AND booking.roomId = 1 ORDER BY booking.bookingTimeStart ASC;
    //     $bookingDetail = Booking::select(['booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimeStart', 'booking.bookingTimeFinish', 'booking.roomId',
    //     'user.firstName', 'user.lastName'])->join('user','user.userId','=', 'booking.userId')
    //     ->whereRaw('booking.bookingDate = CURRENT_DATE')->where('booking.roomId','=',$roomId)->orderBy('booking.bookingTimeStart','asc')->get();
    //     return $bookingDetail;
    // }
    public static function getBookingDetailinCurrentDate($roomId){
        // SELECT booking.bookingAgenda, booking.bookingDate, booking.bookingTimeStart, booking.bookingTimeFinish, booking.roomId, user.firstName, user.lastName FROM booking INNER JOIN user ON booking.userId = user.userId WHERE booking.bookingDate = CURRENT_DATE AND booking.roomId = 1 ORDER BY booking.bookingTimeStart ASC;
        $bookingDetail = Booking::select(['booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimeStart', 'booking.bookingTimeFinish', 'booking.roomId',
        'user.department', 'user.phone'])->join('user','user.userId','=', 'booking.userId')
        ->whereRaw('booking.bookingDate = CURRENT_DATE')->where('booking.roomId','=',$roomId)->orderBy('booking.bookingTimeStart','asc')->get();
        return $bookingDetail;
    }

    public static function getbookingincurrentdate()
    {

        $bookingList = DB::table('booking')
            ->join('user', 'booking.userId', '=', 'user.userId')
            ->select(
                'booking.bookingAgenda',
                'booking.bookingTimeStart',
                'booking.bookingTimeFinish',
                'booking.userId',
                DB::raw('DATE_FORMAT(booking.bookingDate, "%d/%m/%y") AS BookingDate'),
                'user.department',
                'user.phone'
            )
            ->where('booking.bookingDate', DB::raw('CURDATE()'))
            ->orderBy('booking.bookingTimeStart', 'asc')
            ->get();
        return $bookingList;
    }




    // FOR USER DASHBORD
    public static function getUserBooking($userId,$limit=5,$offset=1){
        // SELECT booking.bookingId, booking.bookingAgenda, booking.bookingDate, booking.bookingTimeStart, booking.bookingTimeFinish, concat(user.firstName," ",user.lastName) as userbookingName, user.userId, room.roomName
        // FROM booking INNER JOIN user ON booking.userId = user.userId INNER JOIN room ON booking.roomId = room.roomId
        // WHERE booking.userId = 7 ORDER BY booking.bookingDate DESC, booking.bookingTimeStart DESC LIMIT J OFFSET K;
        // a1+(n-1)*d => k = 1+($offset-1)*$limit
        // J = $limit

        $k = ((int)$offset-1)*(int)$limit;
        $bookingDat = Booking::select('booking.bookingId', 'booking.bookingAgenda', 'booking.bookingDate', 'booking.bookingTimes','booking.date', 'booking.bookingTimeStart', 'booking.bookingTimeFinish', DB::raw('concat(user.department," ",user.phone) as userbookingName'), 'room.roomName')
        ->join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->where('user.userId','=',$userId)
        ->orderBy('booking.bookingDate','desc')
        ->orderBy('booking.bookingTimeStart','desc')
        ->limit($limit)
        ->offset($k)
        ->get();


        $bookingList = [];
        foreach($bookingDat as $dat){
            $bookingList[] = new BookingDTO($dat->bookingId,$dat->bookingAgenda,$dat->bookingDate,$dat->bookingTimes, $dat->bookingTimeStart,$dat->bookingTimeFinish,$dat->date,$dat->userbookingName,$dat->roomName);
            // $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes, $dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->date,$dat->userbookingName, $dat->roomName);
        } 


        return $bookingList;

    }

    public static function getUserBookingSearch($userId, $roomName, $limit=5,$offset=1){
        $k = ((int)$offset-1)*(int)$limit;
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
            // $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimeStart, $dat->bookingTimeFinish, $dat->userbookingName,$dat->date, $dat->roomName,$dat->bookingTimes);
        }
        return $bookingList;
    }

    public static function countUserBooking($userId, $limit){
        $count =  $bookingDat = Booking::join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')->where('user.userId','=',$userId)->get()->count();
        return (int)ceil($count/$limit);
    }

    public static function countUserBookingSearch($userId, $roomName, $limit){
        $count =  $bookingDat = Booking::join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')
        ->where('user.userId','=',$userId)
        ->where('room.roomName','like',"%{$roomName}%")->get()->count();
        return (int)ceil($count/$limit);
    }

    // FOR ADMIN DASHBORD
    public static function getBookingAdmin($limit=5,$offset=1){
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
            // $bookingList[] = new BookingDTO($dat->bookingId, $dat->bookingAgenda, $dat->bookingDate, $dat->bookingTimes,$dat->bookingTimeStart, $dat->bookingTimeFinish,$dat->date, $dat->userbookingName, $dat->roomName);
            $bookingList[] = new BookingDTO($dat->bookingId,$dat->bookingAgenda,$dat->bookingDate,$dat->bookingTimes,$dat->bookingTimeStart,$dat->bookingTimeFinish,$dat->date,$dat->userbookingName,$dat->roomName);
        }


        return $bookingList;
    }

    public static function countBookingAdmin($limit=5){
        $count =  $bookingDat = Booking::join('user','booking.userId','=','user.userId')
        ->join('room', 'booking.roomId','=','room.roomId')->get()->count();
        return (int)ceil($count/$limit);
    }
}
