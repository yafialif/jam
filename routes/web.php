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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','JamController@index');

Route::get('/users','ApiController@users');

Route::get('/get_jam/{lat}/{long}','PrayTimeController@oneday');
Route::post('/rfid','RfidController@index');
Route::get('/itikaf','RegisterController@index');
Route::post('/itikaf','RegisterController@store');
Route::get('/pendaftaran','RegisterController@utama');
Route::post('/pendaftaran','RegisterController@simpan');
