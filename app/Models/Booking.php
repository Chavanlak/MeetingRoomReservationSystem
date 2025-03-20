<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    protected $table = 'booking';
    public $timestamps = false;
    protected $primaryKey = 'bookingId';
    protected $fillable = [
        'bookingAgenda',
        'bookingDate',
        'bookingTimeStart',
        'bookingTimeFinish',
        'date', // ✅ เพิ่มตรงนี้
        'bookingTimes',
        'userId',
        'roomId'
    ];


    public function memberBooking(): HasMany{
        return $this->hasMany(Memberbooking::class,'bookingId');
    }
    public function user(){
        return $this->belongsTo(User::class,'userId');
    }

    public function room(){
        return $this->belongsTo(Room::class,'roomId');
    }

    use HasFactory;
}
