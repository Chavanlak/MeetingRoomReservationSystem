<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Room extends Model
{
    protected $table = 'room';
    public $timestamps = false;
    protected $primaryKey = 'roomId';


    //check booking history
    public function booking(){
        return $this->hasMany(Booking::class,'roomId')->orderby('booking.bookingDate','asc')->orderby('booking.bookingTimeStart','asc');
    }

  

    use HasFactory;
}
