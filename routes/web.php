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
    return view('homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/staff', 'StaffController');
Route::resource('/level', 'LevelController');
Route::resource('/department', 'DepartmentController');
Route::resource('/leave', 'LeaveController');
Route::resource('/rank', 'RankController');
Route::resource('/zone', 'ZoneController');
Route::resource('/status', 'StatusController');
Route::resource('/appointmenttype', 'AppointmenttypeController');