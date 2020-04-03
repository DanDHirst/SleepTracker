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
    return redirect('dashboard');
//    $Sleeps = DB::select('SELECT * FROM `user_sleep`');
//    return $Sleeps;
    $Sleeps = \App\ViewSleep::all();
    foreach ($Sleeps as $Sleep){
        echo $Sleep;
    }
  //return view('dashboard');
});
Route::resource('viewSleep', 'ViewSleep'); // goes to the controller ViewSleep
Route::resource('viewUsers', 'viewUsers');
Route::resource('SleepData', 'SleepData');
Route::resource('EventData', 'EventData');
Route::resource('dashboard', 'Dashboard');
Route::resource('accTerminate', 'AccTerminate');

Route::get('account', function () {
    return view('account');
});
Route::get('sleepInfo', function () {
    return view('sleepInfo');
});
Route::get('login', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
