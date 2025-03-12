<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BookingRoom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 1 auth check
        if(Auth::user() && Auth::user()->userTypeId == 2){
            // sectary
            return $next($request);
        }
        elseif(Auth::user() && Auth::user()->userTypeId != 2){
            return redirect('/home');
        }

        // 2 go to login with roomId
        $roomId = $request->route('roomId');
        return redirect('/login/'.$roomId)->with('message','กรุณาเข้าสู่ระบบก่อนจองห้องประชุม');






    }
}
