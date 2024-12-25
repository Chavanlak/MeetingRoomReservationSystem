<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    // public static function testsome(){
    //     return view('room/roomall');
    // }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
