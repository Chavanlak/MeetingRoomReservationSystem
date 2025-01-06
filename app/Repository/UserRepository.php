<?php


namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class UserRepository{

    public static function save( $password, $username, $userTypeId, $department, $phone){
        $user = new User();
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->department = $department;
        $user->phone = $phone;
        $user->userTypeId = $userTypeId;
        $user->save();
    }


}




?>
