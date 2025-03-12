<?php

namespace App\DTO;

class BookingDTO{
    public $bookingId, $bookingAgenda, $bookingDate, $bookingTimeStart, $bookingTimeFinish,$date,$bookingTimes;
    public $userbookingName;
    public $roomName;

    public function __construct($bookingId, $bookingAgenda, $bookingDate,$bookingTimes, $bookingTimeStart, $bookingTimeFinish, $date,$userbookingName, $roomName) {
        $this->bookingId = $bookingId;
        $this->bookingAgenda = $bookingAgenda;
        $this->bookingDate = $bookingDate;
        $this->bookingTimes = $bookingTimes;
        $this->bookingTimeStart = $bookingTimeStart;
        $this->bookingTimeFinish = $bookingTimeFinish;
        $this->date = $date;
        $this->userbookingName = $userbookingName;
        $this->roomName = $roomName;
    }

}
