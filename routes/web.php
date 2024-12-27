<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['prefix'=>'booking'],function(){
//     Route::get('/',[BookingController::class,'roomListBooking']);
//     Route::get('/{roomId}',[BookingController::class,'roomBookingInfo']);
//     Route::post('/addbooking',[BookingController::class,'roombookingadd']);
// });


// before login
Route::group(['middleware'=>'guest'],function(){
    Route::get('/register',[AuthController::class,'register']);
    Route::post('/registerpost',[AuthController::class,'registerPost']);

    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/loginpost',[AuthController::class,'loginPost']);

    Route::get('/login/{roomId}',[AuthController::class,'loginRoomId']);
    Route::post('/loginpostroomid',[AuthController::class,'loginPostRoomId']);


    // Route::get('/',[RoomController::class,'getAllroomAlbum']);
    Route::get('/',[BookingController::class,'showfirstpage']);
//     Route::get('/changepassword',function(){
//         return view ('auth.changepassword');
//     }
        
// );
  


});

// affter login
Route::group(['middleware'=>'auth'],function(){

    Route::get('/roombooking',[RoomController::class,'getAllroomAlbum']);
    Route::get('/home',[AuthController::class,'home']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/bookingedit/{bookingId}',[BookingController::class,'updateBookingbyId']);
    Route::post('/bookingupdate',[BookingController::class,'editBookingbyId']);
    Route::get('/setting',[AuthController::class,'settingpassword']);
    Route::post('/updatepassword',[AuthController::class,'updatepassword']);
});

Route::group(['prefix'=>'user','middleware'=>'isUser'], function(){
    Route::get('/datatab',[UserController::class,'datatab'])->name('user.datatab');
    Route::get('/datatab2',[UserController::class,'datatab2']);
    Route::get('/dashbord',[UserController::class,'dashbord']);
    Route::get('/dashbord/{limit}/{offset}',[UserController::class,'dashbordlimit']);
    Route::post('/search',[UserController::class,'searchbooking']);
    Route::get('/search/{roomName}/{limit}/{offset}',[UserController::class,'searchnextpage']);
});

//Route::get('/datatab',[UserController::class,'datatab'])->name('user.datatab');


Route::group(['prefix'=>'admin','middleware'=>'isAdmin'],function(){
    Route::get('/dashbord',[AdminController::class,'dashbord']);
    Route::get('/dashbord/{limit}/{offset}',[AdminController::class,'dashbordlimit']);

    Route::get('/editbooking/{bookingId}',[BookingController::class,'admineditbookingWithId']);
    Route::post('/updatebooking',[BookingController::class,'adminupdateBookingWithId']);
});



Route::group(['prefix'=>'booking','middleware'=>'BookingRoom'],function(){
    Route::get('/{roomId}',[BookingController::class,'getBookingInRoom']);;
    Route::post('/addbooking',[BookingController::class,'addBooking']);


    // new route for booking
    // update
    Route::get('/editbooking/{bookingId}',[BookingController::class,'editbookingWithId']);
    Route::post('/updatebooking',[BookingController::class,'updateBookingWithId']);

    // add new
    Route::get('/{roomId}',[BookingController::class,'getBookingInRoom']);;
    Route::post('/addbooking',[BookingController::class,'addBooking']);



});



Route::group(['prefix'=>'room'],function(){
    Route::get('/',[RoomController::class,'getAllRoom']);
    Route::get('/{roomId}',[RoomController::class,'getBookinginRoom']);
});

// Route::group(['prefix'=>'room'],function(){
//     Route::get('/',[RoomController::class,'getAllroomAlbum']);
//     Route::get('/{roomId}',[RoomController::class,'getBookinginRoom']);
// });
// Route::group(['prefix'=>'room'],function(){
//     Route::get('/',[RoomController::class,'getAllRoom']);
//     Route::get('/{roomId}',[RoomController::class,'getBookinginRoom']);
// });

Route::get('delete/{bookingId}',[RoomController::class,'deleteBookinginRoom'])->name('delete');

// Route::get('room/{roomId}',[RoomController::class,'addRoom'])->name('addroom');

// Route::get('/booking/{roomId}', [BookingController::class, 'showBooking'])->middleware('auth');




