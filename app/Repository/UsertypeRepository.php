<?php


namespace App\Repository;

use App\Models\Usertype;



class UsertypeRepository{
    public static function getAllUsertype(){
        return Usertype::get();
    }
}














?>
