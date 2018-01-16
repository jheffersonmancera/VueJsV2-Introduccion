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

use App\User;//*1

Route::get('/', function () {
    return view('welcome');
});
Route::get('users',function(){//*1
	//$users= User::get(); //*2
	$users= User::orderby('id','DESC')->take(5)->get();//alternativa-> *4
	//return ['Lynda', 'Isabella', 'Jhefferson','Alejandra', 'Marcos', 'Pedrito'];
	return $users;//*3
});