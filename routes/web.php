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

    Route::get('/forgotpassword',[AuthController::class,'changePassword']);
    Route::post('/forgotpasswordpost',[AuthController::class,'changePasswordPost']);




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
    Route::post('/searchadmin',[AdminController::class,'searchbookingbyAdmin']);
    Route::get('/searchadmin/{roomName}/{limit}/{offset}',[AdminController::class,'searchnextpagebyAdmin']);
    // Route::post('/searchadmin',[AdminController::class,'searchingUserByAdmin']);
    // Route::get('/searchadmin/{roomName}/{limit}/{offset}',[AdminController::class,'searchnextpageByAdmin']);
    
    // Route::get('/editbooking/{bookingId}',[BookingController::class,'admineditbookingWithId']);
    // Route::post('/updatebooking',[BookingController::class,'adminupdateBookingWithId']);
    Route::get('/editbooking/{bookingId}',[AdminController::class,'updateBookingbyIdFromAdmin']);
    Route::post('/updatebooking',[AdminController::class,'editBookingbyIdfromAdmin']);


    // Route::get('/settingdashbord',[AdminController::class,'settingdashbord']);
    // Route::post('/changpasswordByadmin',[AuthController::class,'updatepassword']);
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
     //admin
     Route::get('/editbookingadmin/{bookingId}',[AdminController::class,'editbookingWithIdByAdmin']);
    Route::post('/updatebookingadmin',[AdminController::class,'updateBookingWithIdByAdmin']);



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
Route::get('/adminlayout', function () {
    return view('layout.adminlayout');
});
// Route::group(['prefix'=>'admin2','middleware'=>'isAdmin'],function(){
// Route::get('/',[AdminController::class,'getAllBooking']);
// Route::get('/F',[AdminController::class,'dashbord']);
// Route::get('/dashbord/{limit}/{offset}',[AdminController::class,'dashbordlimit']);
// });
// Route::get('/settingdashbord', function () {
//     return view('dashbord.settingdashbord');
// });
// Route::get('/settingdashbord/{userId}',[AdminController::class,'settingdashbord']);
// Route::post('/changpasswordByadmin',[AdminController::class,'updatepassword']);

// Route to display the settings dashboard for a specific user
// Route::get('/settingdashbord/{userId}', [AdminController::class, 'settingdashbord']);

// // Route to show the change password page for a specific user
// Route::get('/changepasswordByadmin/{userId}', [AdminController::class, 'changepasswordByAdmin']);

// // Route to handle the password update form submission
// Route::post('/changepasswordByadmin/{userId}', [AdminController::class, 'updatepassword']);
// Route::prefix('dashbord')->group(function () {
//     Route::get('/settingdashbord', [AdminController::class, 'settingdashbord']); // User list
//     Route::get('/changepasswordByadmin/{userId}', [AdminController::class, 'showChangePasswordForm']); // Show password form
//     Route::post('/changepasswordByadmin', [AdminController::class, 'changePassword']); // Handle password update
// });

// Route::prefix('dashbord')->group(function () {
//     Route::get('/settingdashbord', [AdminController::class, 'settingdashbord']); // User list
//     Route::get('/changepasswordByadmin/{userId}', [AdminController::class, 'showChangePasswordForm']); // Show password form
//     Route::post('/updatepasswordByadmin', [AdminController::class, 'changePassword']); // Handle password update
// });

// Route::get('/settingdashbord',[AdminController::class,'settingdashbord']);
// Route::get('/postsetting', function () {
//     return view('dashbord/postsetting');
// });
Route::get('/settingdashbord', [AdminController::class, 'settingdashbord'])->name('settingdashbord');
Route::get('/settingdashbordLimit/{limit}/{offset}', [AdminController::class, 'settingdashbordLimit']);

Route::get('/postsetting/{userId}', [AdminController::class, 'showPostSetting'])->name('postsetting');
Route::post('/updatepasswordByadmin/{userId}', [AdminController::class, 'updatePassword'])->name('updatepasswordByadmin');
    Route::post('/searchadminsetting',[AdminController::class,'searchuserbyAdmin']);
    Route::get('/searchadminsetting/{username}/{limit}/{offset}',[AdminController::class,'searchusernextpagebyAdmin']);

Route::get('/registerByAdmin',[AdminController::class,'registerByAdmin']);
Route::post('/registerpostByAdmin',[AdminController::class,'registerpostByAdmin']);
// Route::get('/admin/search', [AdminController::class, 'searchByRoom'])->name('admin.searchByRoom');

// Route::get('/admindashbord', function () {
//     return view('dashbord/admindashbord');
// });
Route::get('/admindashbord', [AdminController::class, 'dashboard2'])->name('dashbord.admindashbord');
Route::get('/dashbord/{limit}/{offset}', [AdminController::class, 'dashbordlimit2']);
