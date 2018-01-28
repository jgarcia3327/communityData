<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class CommonController
{

    public static function isAdmin() {
      return Auth::user()->type == 3? true : false;
    }

    public static function generateRandomString($length = 10) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*()_+=-', ceil($length/strlen($x)) )),1,$length);
    }
}
