<?php

namespace App\DTO;

class BookingDTO{
    public $bookingId, $bookingAgenda, $bookingDate, $bookingTimeStart, $bookingTimeFinish,$bookingTimes;
    public $userbookingName;
    public $roomName;

    public function __construct($bookingId, $bookingAgenda, $bookingDate,$bookingTimes, $bookingTimeStart, $bookingTimeFinish, $userbookingName, $roomName) {
        $this->bookingId = $bookingId;
        $this->bookingAgenda = $bookingAgenda;
        $this->bookingDate = $bookingDate;
        $this->bookingTimes = $bookingTimes;
        $this->bookingTimeStart = $bookingTimeStart;
        $this->bookingTimeFinish = $bookingTimeFinish;
        $this->userbookingName = $userbookingName;
        $this->roomName = $roomName;
    }

}
