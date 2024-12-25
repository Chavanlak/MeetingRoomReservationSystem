<?php

namespace App\Repository;

use App\Models\Room;

class RoomRepository{
    public static function getAll(){
        return Room::get();
    }


    public static function getRoomById($roomId){
        return Room::where('room.roomId','=',$roomId)->first();
    }


}





?>
