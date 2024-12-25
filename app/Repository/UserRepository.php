<?php


namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class UserRepository{

    public static function save($email, $password, $username, $firstName, $lastName, $userTypeId){
        $user = new User();
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->username = $username;
        $user->firstName = $firstName;
        $user->lastName = $lastName;
        $user->userTypeId = $userTypeId;
        $user->save();
    }


}




?>
