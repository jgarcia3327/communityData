<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Facade;

class CommonController extends Facade
{
    protected static function getFacadeAccessor() {
       //what you want
       return 'isAdmin';
    }
    public static function isAdmin() {
      return Auth::user()->type == 3? true : false;
    }
}
