<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memberbooking extends Model
{
    protected $table = 'memberbooking';
    public $timestamps = false;
    protected $primaryKey = 'memberbookingId';
    use HasFactory;
}
