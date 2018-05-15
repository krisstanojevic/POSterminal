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
    return redirect('login');
});


//login, logout, register
Route::get('login', array('uses' => 'LoginController@showLogin'))->name('login');

Route::post('login', array('uses' => 'LoginController@doLogin'));

Route::post('register',  array('uses' => 'LoginController@doRegister'));
Route::get('register',  array('uses' => 'LoginController@showRegister'));

Route::post('logout', array('uses' => 'LoginController@doLogout'));
Route::get('logout', array('uses' => 'LoginController@doLogout'));


//only if user is logged in
Route::group(['middleware' => 'auth'], function () {
    Route::post('posTerminalShop', array('uses' => 'PosTerminalController@store'));
    Route::get('posTerminalShop', array('uses' => 'PosTerminalController@store'));
    Route::resource('posTerminal', 'PosTerminalController');
    Route::get('mybills', 'StatisticsController@mybills');
    Route::resource('statistics', 'StatisticsController');
    Route::resource('turnoverChoose', 'TurnOverController');
    Route::post('turnover', 'TurnOverController@turnover');
    Route::get('turnover', 'TurnOverController@turnover');
    
 });
 
 