<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/tes',function(){
    dd(bcrypt('owner'));
});
Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@doLogin')->name('login');
Route::get('/logout', 'LoginController@doLogout');
Route::get('/register', 'LoginController@register');
Route::post('/register', 'LoginController@doRegister')->name('register');

Route::get('/', 'DashboardController@dashboard')->middleware('auth');

Route::get('/user', 'UserController@user')->middleware('auth');
Route::post('/user/update/{id}', 'UserController@doUpdateUser');

Route::get('/allUser', 'UserController@allUser')->middleware('auth');
Route::post('/allUser/insert', 'UserController@doInsertUser');
Route::post('/allUser/update/{id}', 'UserController@doUpdateAllUser');
Route::get('/allUser/delete/{id}', 'UserController@doDeleteUser');

Route::get('/venue', 'VenueController@venue')->middleware('auth');
Route::post('/venue/insert', 'VenueController@doInsertVenue');
Route::get('/venue/delete/{id}', 'VenueController@doDeleteVenue');
Route::get('/venue/{id}', 'VenueController@lapangan')->middleware('auth')->name('lapangan');
Route::post('/venue/{id}/insert', 'VenueController@doInsertLapangan');
Route::post('/venue/{idv}/update/{idl}', 'VenueController@doUpdateLapangan');
Route::get('/venue/{idv}/delete/{idl}', 'VenueController@doDeleteLapangan');

Route::get('/transaksi', 'TransaksiController@transaksi')->middleware('auth');
Route::get('/transaksi/{id}', 'TransaksiController@transaksiDetail')->middleware('auth')->name('transaksiDetail');
Route::post('/transaksi/{idv}/lunas/{idt}', 'TransaksiController@doLunas');
Route::post('/transaksi/bukti/{id}', 'TransaksiController@doBukti');

