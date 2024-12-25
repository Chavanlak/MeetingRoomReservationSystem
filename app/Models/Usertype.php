<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    protected $table = 'usertype';
    public $timestamps = false;
    protected $primaryKey = 'userTypeId';
    use HasFactory;
}
