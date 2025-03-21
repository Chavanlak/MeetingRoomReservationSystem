<?php

namespace App\DTO;

class BookingDTO{
    public $bookingId, $bookingAgenda, $bookingDate, $bookingTimeStart, $bookingTimeFinish,$bookingTimes,$date;
    // public $userbookingName,$department,$phone;
    public $department,$phone;
    public $roomName;
    public function __construct($bookingId, $bookingAgenda, $bookingDate,$bookingTimes, $bookingTimeStart, $bookingTimeFinish, $date, $department,$phone,$roomName) {
    // public function __construct($bookingId, $bookingAgenda, $bookingDate,$bookingTimes, $bookingTimeStart, $bookingTimeFinish, $date,$userbookingName, $department,$phone,$roomName) {
        // public function __construct($bookingId, $bookingAgenda, $bookingDate,$bookingTimes, $bookingTimeStart, $bookingTimeFinish, $userbookingName, $roomName) {
        $this->bookingId = $bookingId;
        $this->bookingAgenda = $bookingAgenda;
        $this->bookingDate = $bookingDate;
        $this->bookingTimes = $bookingTimes;
        $this->bookingTimeStart = $bookingTimeStart;
        $this->bookingTimeFinish = $bookingTimeFinish;
        $this->date = $date;
        // $this->userbookingName = $userbookingName;
        $this->$department = $department;
        $this->$phone = $phone;
        $this->roomName = $roomName;
    }

}
// class BookingDTO{
//     public $bookingId,$bookingAgenda,$bookingDate,$bookingTimeStart,$bookingTimeFinish,$bookingTimes,$date;
//     public $userbookingName;
//     public $roomName;

//     public function __contruct($bookingId,$bookingAgenda,$bookingDate,$bookingTimes,$bookingTimeStart,$bookingTimeFinish,$date,$userbookingName,$roomName){
//         $this->bookingId = $bookingId;
//         $this->bookingAgenda = $bookingAgenda;
//         $this->bookingDate =$bookingDate;
//         $this->bookingTimes = $bookingTimes;
//         $this->bookingTimeStart = $bookingTimeStart;
//         $this->bookingTimeFinish = $bookingTimeFinish;
//         $this->date = $date;
//         $this->userbookingName = $userbookingName;
//         $this->roomName = $roomName;
//     }
// }
?>
