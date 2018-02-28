<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Login access
Route::group(['middleware' => 'auth'], function() {
  // Route here...
  // Single
    Route::get('/member/create_admin', 'MemberController@create_admin');
    Route::post('/member/create_admin', 'MemberController@create_admin_store');
    Route::post('/member/remove_admin', 'MemberController@remove_admin');
    Route::get('/member/create_sector_president', 'MemberController@create_sector_president');
    Route::post('/member/create_sector_president', 'MemberController@create_sector_president_store');
    Route::post('/member/remove_sector_president', 'MemberController@remove_sector_president');
    Route::get('/member/create_encoder', 'MemberController@create_encoder');
    Route::post('/member/create_encoder', 'MemberController@create_encoder_store');
    Route::post('/member/remove_encoder', 'MemberController@remove_encoder');
  // Resource
    Route::resource('member', "MemberController");
  
});
