<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class CommonController
{
    
    public const USER_ADMIN = 3;
    public const USER_SECTOR_PRESIDENT = 2;
    public const USER_ENCODER = 1;
    public const USER_MEMBER = 0;
    
    public static function getNotAdmins() {
        return User::select("users.id","members.fname","members.lname","members.mname")->rightJoin("members","users.id","=","members.user_id")->where([["users.active","=",1],["users.type","<>",CommonController::USER_ADMIN]])->get();
    }
    
    public static function getAdmins() {
        return User::select("users.id","members.fname","members.lname","members.mname")->rightJoin("members","users.id","=","members.user_id")->where([["users.active","=",1],["users.type","=",CommonController::USER_ADMIN]])->get();
    }
    
    public static function getNotSectorPresidents() {
        return User::select("users.id","members.fname","members.lname","members.mname")->rightJoin("members","users.id","=","members.user_id")->where([["users.active","=",1],["users.type","<>",CommonController::USER_SECTOR_PRESIDENT], ["users.type","<>",CommonController::USER_ADMIN]])->get();
    }
    
    public static function getSectorPresidents() {
        return User::select("users.id","members.fname","members.lname","members.mname")->rightJoin("members","users.id","=","members.user_id")->where([["users.active","=",1],["users.type","=",CommonController::USER_SECTOR_PRESIDENT]])->get();
    }
    
    public static function getNotEncoders() {
        return User::select("users.id","members.fname","members.lname","members.mname")->rightJoin("members","users.id","=","members.user_id")->where([["users.active","=",1],["users.type","<>",CommonController::USER_ENCODER], ["users.type","=",CommonController::USER_MEMBER]])->get();
    }
    
    public static function getEncoders() {
        return User::select("users.id","members.fname","members.lname","members.mname")->rightJoin("members","users.id","=","members.user_id")->where([["users.active","=",1],["users.type","=",CommonController::USER_ENCODER]])->get();
    }
    
    public static function getUsers() {
        return User::select("users.id","members.fname","members.lname","members.mname")->rightJoin("members","users.id","=","members.user_id")->where("users.active",1)->get();
    }

    public static function getUserType() {
      return Auth::user()->type;
    }

    public static function generateRandomString($length = 10) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*()_+=-', ceil($length/strlen($x)) )),1,$length);
    }
  
}
