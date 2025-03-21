<?php


namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class UserRepository{

    public static function save( $username,$password,  $userTypeId, $department, $phone,){
        $user = new User();
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->userTypeId = $userTypeId;
        $user->department = $department;
        $user->phone = $phone;
        $user->save();
    }


}




?>
