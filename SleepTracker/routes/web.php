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
//    $Sleeps = DB::select('SELECT * FROM `user_sleep`');
//    return $Sleeps;
    $Sleeps = \App\ViewSleep::all();
    foreach ($Sleeps as $Sleep){
        echo $Sleep;
    }
  //return view('dashboard');
});
Route::resource('sleep', 'ViewSleep'); // goes to the controller ViewSleep

Route::resource('addSleep', 'addSleep');
Route::get('dashboard', function (){
    return view('dashboard');
});
Route::get('addSleep', function (){
    return view('addSleep');
});
Route::get('account', function () {
    return view('account');
});
