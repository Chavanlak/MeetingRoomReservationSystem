<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Repository\BookingRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;
use App\Repository\RoomRepository;
use App\Repository\UsertypeRepository;
use App\Repository\UserRepository;


use Carbon\Carbon;

class AdminController extends Controller
{
    public static function dashbord()
    {
        $offset = 1;
        $limit = 5;
        $bookingList = BookingRepository::getBookingAdmin($limit, $offset);
        $count = BookingRepository::countBookingAdmin($limit);
        $stringPage = "/admin/dashbord/" . $limit . "/";
        return view('dashbord/admindashbord', compact('bookingList', 'offset', 'limit', 'stringPage', 'count'));
    }

    public static function dashbordlimit($limit, $offset)
    {
        $bookingList = BookingRepository::getBookingAdmin($limit, $offset);
        $count = BookingRepository::countBookingAdmin($limit);
        $stringPage = "/admin/dashbord/" . $limit . "/";
        return view('dashbord/admindashbord', compact('bookingList', 'offset', 'limit', 'stringPage', 'count'));
    }

    public static function searchlike(Request $req)
    {
        $bookList = AdminRepository::searchLike();
        return view("dashbord/admindashbord", compact("bookingList"));
    }
    public static function getAllBooking()
    {
        $bookingList = AdminRepository::getAllBookingAdmin();
        return view("dashbord/admintest", compact("bookingList"));
    }
    public static function settingdashbord()
    {
        $userList = AdminRepository::getAllUers();
        return view("dashbord/settingdashbord", compact("userList"));
    }
    public function showPostSetting($userId)
    {
        $user = User::where('userId', $userId)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'ไม่พบผู้ใช้');
        }

        return view('dashbord.postsetting', compact('user'));
    }

    public function updatePassword(Request $request, $userId)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('userId', $userId)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'ไม่พบผู้ใช้');
        }

        // อัปเดตรหัสผ่าน
        $user->password = bcrypt($request->password);
        $user->save();

        // return redirect()->route('settingdashbord')->with('success', 'อัปเดตรหัสผ่านสำเร็จ');
        // return redirect()->route('dashbord.updatepasswordByadmin')->with('success', 'อัปเดตรหัสผ่านสำเร็จ');
        return redirect()->route('postsetting', ['userId' => $userId])->with('success', 'อัปเดตรหัสผ่านสำเร็จ');
    }

    // public static function searchingUserByAdmin(Request $req)
    // {
    //     $offset = 1;
    //     $limit = $req->limit;
    //     $roomName = $req->roomName;
    //     $bookingList = AdminRepository::getSearchByAdmin(Auth::user()->userId, $roomName, $limit, $offset);
    //     $stringPage = "/admin/search" . $roomName . "/" . $limit . "/";
    //     $count = AdminRepository::countBookingSearchByAdmin(Auth::user()->userId, $roomName, $limit);
    //     return view('dashbord/admindashbord', compact('bookingList', 'offset', 'limit', 'stringPage', 'count'));
    // }
    // public static function searchnextpageByAdmin($roomName, $limit, $offset)
    // {
    //     $bookingList = AdminRepository::getSearchByAdmin(Auth::user()->userId, $roomName, $limit, $offset);
    //     $stringPage = "/admin/search/" . $roomName . "/" . $limit . "/";
    //     $count = AdminRepository::countBookingSearchByAdmin(Auth::user()->userId, $roomName, $limit);
    //     return view('dashbord/userdashbord', compact('bookingList', 'offset', 'limit', 'stringPage', 'count'));
    // }


    // public static function changepasswordByAdmin(Request $req){
    //     $req->validate([
    //         'change_password' => 'required|confirmed',
    //         'change_password_comfirmtion' =>'required'
    //     ]);
    //     User::where('userId','=',Auth::user()->userId)->update([
    //         'password' => Hash::make($req->change_password)
    //     ]);
    //     return redirect('/settingdashbord')->with('success', 'เปลี่ยนรหัสผ่านสำเร็จ!');
    // }
    // public static function settingpassword($userId) {
    //     // $email = Auth::user()->email;
    //     // $usernames = Auth::user()->username;
    //     // $phones = Auth::user()->phone;
    //     $user = User::find($userId);
    //     return view('/changepasswordByadmin',compact('usernames'));
    // }
    //     public static function changepasswordByAdmin($userId)
    // {
    //     $user = User::findOrFail($userId); // ค้นหาผู้ใช้ตาม userId
    //     return view('auth.changepassword', compact('user')); // ส่งผู้ใช้ไปในหน้า changepassword
    // }
    // public static function changepasswordByAdmin($userId) {
    //     $user = User::findOrFail($userId); // Get the user by ID
    //     return view('dashbord.changepasswordByAdmin', compact('user')); // Return the password change view with the user data
    // }

    // public static function updatepassword(Request $req, $userId) {
    //     $req->validate([
    //         'change_password' => 'required|confirmed',
    //         'change_password_comfirmtion' => 'required',
    //     ]);

    //     User::where('userId', '=', $userId)->update([
    //         'password' => Hash::make($req->change_password),
    //     ]);

    //     return redirect('/settingdashbord')->with('success', 'เปลี่ยนรหัสผ่านสำเร็จ!');
    // }
    // public function showChangePasswordForm($userId)
    //     {
    //         $user = User::findOrFail($userId);
    //         return view('changepasswordByadmin', compact('user'));
    //     }

    // Handle password update
    // public function changePassword(Request $request)
    // {
    //     $request->validate([
    //         'userId' => 'required|exists:users,id',
    //         'password' => 'required|min:6|confirmed',
    //     ]);

    //     $user = User::findOrFail($request->userId);
    //     $user->password = Hash::make($request->password);
    //     $user->save();
    //     return redirect('/changepasswordByadmin')->with('success', 'เปลี่ยนรหัสผ่านสำเร็จ');
    //     // return redirect('/settingdashbord')->with('success', 'เปลี่ยนรหัสผ่านสำเร็จ');
    //     // }
    // public static function changePassword(Request $req, $userId) {
    //     $req->validate([
    //         'change_password' => 'required|confirmed',
    //         'change_password_comfirmtion' => 'required',
    //     ]);

    //     User::where('userId', '=', $userId)->update([
    //         'password' => Hash::make($req->change_password),
    //     ]);

    //     return redirect('/changepasswordByadmin')->with('success', 'เปลี่ยนรหัสผ่านสำเร็จ!');
    // }
    // public static function showChangePasswordForm() {
    //     // $email = Auth::user()->email;
    //     $username = Auth::user()->username;
    //     return view('/changepasswordByadmin',compact('username'));
    // }
    //editbooking route admin
    public static function updateBookingbyIdFromAdmin($bookingId)
    {
        $booking = BookingRepository::getBookingbyId($bookingId);
        $room = RoomRepository::getRoomById($booking->roomId);
        return view('booking/adminbookingupdate', compact('booking', 'room'));
    }
    public static function editBookingbyIdfromAdmin(Request $req)
    {
        $bookingId = $req->bookingId;
        $bookingAgenda = $req->bookingAgenda;
        $bookingDate = $req->bookingDate;
        $bookingTimeStartCar = Carbon::parse($req->bookingTimeStart);
        $bookingTimeFinishCar = Carbon::parse($req->bookingTimeFinish);
        $bookingTimeStart = $req->bookingTimeStart;
        $bookingTimeFinish = $req->bookingTimeFinish;
        $roomId = $req->roomId;

        $dateNow = Carbon::now();
        $dateSelect = Carbon::parse($bookingDate . " " . $bookingTimeStart);
        $bookingDurationMinutes = $bookingTimeFinishCar->diffInMinutes($bookingTimeStartCar);

        if ($dateSelect->lt($dateNow)) {
            return redirect('/booking/' . $roomId)->with('message', 'ไม่สามารถจองย้อนหลังได้');
        }


        if ($bookingDurationMinutes < 60) {
            return redirect('/booking/' . $roomId)->with('message', 'ต้องจองเวลาเท่ากับ 1 ชั่วโมงเท่านั้น');
        }

        if ($bookingTimeFinish < $bookingTimeStart) {
            return redirect('/booking/' . $roomId)->with('message', 'กรอกเวลาผิดพลาด');
        }


        $updateResult = BookingRepository::update($bookingId, $bookingAgenda, $bookingDate, $bookingTimeStart, $bookingTimeFinish, $roomId);
        if (!$updateResult) {
            return redirect('/booking/' . $roomId)->with('message', 'ไม่สามารถแก้ไขการจองได้เพราะทับเวลาคนอื่น');
        }




        return redirect('/booking/' . $roomId);
        // return redirect('/room/'.$roomId);ccess','แก้ไขการจองเรียบร้อย');

    }

    //userbookingupdatebyadmin
    public static function editbookingWithIdByAdmin($bookingId)
    {
        $booking = BookingRepository::getBookingbyId($bookingId);
        $room = RoomRepository::getRoomById($booking->roomId);
        return view('booking/userbookingupdatebyadmin', compact('booking', 'room'));
    }

    public static function updateBookingWithIdByAdmin(Request $req)
    {
        $bookingId = $req->bookingId;
        $bookingAgenda = $req->bookingAgenda;
        $bookingDate = $req->bookingDate;
        $bookingTimeStartCar = Carbon::parse($req->bookingTimeStart);
        $bookingTimeFinishCar = Carbon::parse($req->bookingTimeFinish);
        $bookingTimeStart = $req->bookingTimeStart;
        $bookingTimeFinish = $req->bookingTimeFinish;
        $roomId = $req->roomId;

        $dateNow = Carbon::now();
        $dateSelect = Carbon::parse($bookingDate . " " . $bookingTimeStart);
        $bookingDurationMinutes = $bookingTimeFinishCar->diffInMinutes($bookingTimeStartCar);

        if ($dateSelect->lt($dateNow)) {
            // return redirect('/booking/editbooking/'.$bookingId)->with('message', 'ไม่สามารถจองย้อนหลังได้');
            return redirect('/admin/editbooking/' . $bookingId)->with('message', '*');
        }


        if ($bookingDurationMinutes < 60) {
            // return redirect('/booking/editbooking/'.$bookingId)->with('message', 'ต้องจองเวลาเท่ากับ 1 ชั่วโมงเท่านั้น');
            return redirect('/admin/editbooking/' . $bookingId)->with('message', '*');
        }

        if ($bookingTimeFinish < $bookingTimeStart) {
            // return redirect('/booking/editbooking/'.$bookingId)->with('message', 'กรอกเวลาผิดพลาด');
            return redirect('/admin/editbooking/' . $bookingId)->with('message', '*');
        }

        $updateResult = BookingRepository::update($bookingId, $bookingAgenda, $bookingDate, $bookingTimeStart, $bookingTimeFinish, $roomId);
        if (!$updateResult) {
            // return redirect('/booking/editbooking/'.$bookingId)->with('message','ไม่สามารถแก้ไขการจองได้เพราะทับเวลาคนอื่น');
            return redirect('/admin/editbooking/' . $bookingId)->with('message', '*');
        }


        return redirect('/admin/editbooking/' . $bookingId)->with('success', 'แก้ไขการจองเรียบร้อย');
    }
    // public static function getsearchingbyroom(Request $req) {
    //     $roomName = $req->roomName;
    //     $bookingList = AdminRepository::searchingallRoom(Auth::user()->userId,$roomName);
    //     return view('dashbord/admindashbord',compact('bookingList'));
    // }
    // public static function getsearchingbyroom(Request $req) {
    //     $roomName = $req->roomName;

    //     // ถ้ามีการค้นหาให้ใช้ค่า roomName แต่ถ้าไม่มีให้ดึงข้อมูลทั้งหมด
    //     if ($roomName) {
    //         $bookingList = AdminRepository::searchingallRoom(Auth::user()->userId, $roomName);
    //     } else {
    //         $bookingList = AdminRepository::searchingallRoom(Auth::user()->userId, null);
    //     }

    //     return view('dashbord.userdashbord', compact('bookingList'));
    // // }


    public static function dashbordlimitAdmin($limit, $offset)
    {
        $bookingList = AdminRepository::getUserBookingByadmin(Auth::user()->userId, $limit, $offset);
        $count = AdminRepository::countUserBookingbyAdmin(Auth::user()->userId, $limit);
        $stringPage = "/admin/dashbord/" . $limit . "/";
        return view('dashbord/admindashbord', compact('bookingList', 'offset', 'limit', 'stringPage', 'count'));
    }
    public static function searchbookingbyAdmin(Request $req)
    {
        $offset = 1;
        $limit = $req->limit;
        $roomName = $req->roomName;
        // $bookingList = AdminRepository::getSearchByInformation(Auth::user()->userId,$roomName,$limit,$offset);
        $bookingList = AdminRepository::getSearchByInformation($roomName, $limit, $offset);

        $stringPage = "/admin/search/" . $roomName . "/" . $limit . "/";
        $count = AdminRepository::countSearchByInformation($roomName, $limit);
        // $count = AdminRepository::countSearchByInformation(Auth::user()->userId,$roomName, $limit);
        return view('dashbord/admindashbord', compact('bookingList', 'offset', 'limit', 'stringPage', 'count'));
    }
    public static function searchnextpagebyAdmin($roomName, $limit, $offset)
    {
        // $bookingList = AdminRepository::getSearchByInformation(Auth::user()->userId,$roomName,$limit, $offset);
        $bookingList = AdminRepository::getSearchByInformation($roomName, $limit, $offset);
        $stringPage = "/admin/searchadmin/" . $roomName . "/" . $limit . "/";
        $count = AdminRepository::countSearchByInformation($roomName, $limit);
        // $count = AdminRepository::countSearchByInformation(Auth::user()->userId,$roomName, $limit);
        return view('dashbord/admindashbord', compact('bookingList', 'offset', 'limit', 'stringPage', 'count'));
    }
    public static function getBookigserchbyAdmin(Request $req) {}
    public static function registerByAdmin()
    {
        // render register from
        $usertypes = UsertypeRepository::getAllUsertype();
        return view('dashbord/registerByAdmin', compact('usertypes'));
    }

    public static function registerpostByAdmin(Request $req)
    {
        $req->validate([
        'password' => 'required|string|min:6|confirmed',
            // 'password_confirmation' => 'required',
            // 'comfrim_password' => 'require|confirmed'
        ]);
        $userTypeId = 2;
        // recive from save to db
        // $username = $req->username;
        // $password = $req->password;
        // $userTypeId = $req->userTypeId;
        // $department = $req->department;
        // $phone = $req->phone;

        // UserRepository::save($email, $password, $username, $firstName, $lastName, $userTypeId);
        // UserRepository::save($password, $username,  $userTypeId, $department, $phone);
        // UserRepository::save($req->username,$req->password,$req->userTypeId,$req->department,$req->phone);
        UserRepository::save($req->username,$req->password,$userTypeId,$req->department,$req->phone);
        // return redirect('/registerByAdmin');
        return redirect('/registerByAdmin')->with('sucsess','ลงทะเบียนสำเร็จ');
    }
    public function dashboard2()
    {
        return view('dashbord.admindashbord');
    }
    public function dashbordlimit2($limit, $offset = 0)
    {
        // Your query logic
        return view('dashboard.admindashboard', compact('limit', 'offset'));
    }
    // public function showPostSetting($userId)
    //     {
    //         $user = User::where('userId', $userId)->first();

    //         if (!$user) {
    //             return redirect()->back()->with('error', 'ไม่พบผู้ใช้');
    //         }

    //         return view('dashbord.postsetting', compact('user'));
    //     }

    //     public function updatePassword(Request $request, $userId)
    //     {
    //         $request->validate([
    //             'password' => 'required|min:6|confirmed',
    //         ]);

    //         $user = User::where('userId', $userId)->first();

    //         if (!$user) {
    //             return redirect()->back()->with('error', 'ไม่พบผู้ใช้');
    //         }

    //         // อัปเดตรหัสผ่าน
    //         $user->password = bcrypt($request->password);
    //         $user->save();

    //         // return redirect()->route('settingdashbord')->with('success', 'อัปเดตรหัสผ่านสำเร็จ');
    //         // return redirect()->route('dashbord.updatepasswordByadmin')->with('success', 'อัปเดตรหัสผ่านสำเร็จ');
    //         return redirect()->route('postsetting', ['userId' => $userId])->with('success', 'อัปเดตรหัสผ่านสำเร็จ');
    //     }


}
