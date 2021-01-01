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
Route::post('/user/update/{idu}', 'UserController@doUpdateUser');

Route::get('/allUser', 'UserController@allUser')->middleware('auth');
Route::post('/allUser/insert', 'UserController@doInsertUser');
Route::post('/allUser/update/{idu}', 'UserController@doUpdateAllUser');
Route::get('/allUser/delete/{idu}', 'UserController@doDeleteUser');

Route::get('/venue', 'VenueController@venue')->middleware('auth');
Route::post('/venue/insert', 'VenueController@doInsertVenue');
Route::get('/venue/delete/{idv}', 'VenueController@doDeleteVenue');
Route::get('/venue/{idv}', 'VenueController@lapangan')->middleware('auth')->name('lapangan');
Route::post('/venue/{idv}/insert', 'VenueController@doInsertLapangan');
Route::post('/venue/{idv}/update/{idl}', 'VenueController@doUpdateLapangan');
Route::get('/venue/{idv}/delete/{idl}', 'VenueController@doDeleteLapangan');
Route::get('/venue/jadwal/{idv}', 'VenueController@jadwal')->middleware('auth');

Route::get('/transaksi', 'TransaksiController@transaksi')->middleware('auth');
Route::get('/transaksi/{idv}', 'TransaksiController@transaksiDetail')->middleware('auth')->name('transaksiDetail');
Route::get('/transaksi/{idv}/lunas/{idt}', 'TransaksiController@doLunas');
Route::get('/transaksi/{idv}/batal/{idt}', 'TransaksiController@doBatal');
Route::post('/transaksi/bukti/{idt}', 'TransaksiController@doBukti');

Route::get('/pesan', 'PesanController@pesan')->middleware('auth');
Route::get('/pesan/{idv}', 'PesanController@jadwal')->middleware('auth')->name('pesan');
Route::post('/pesan/{idv}/insert', 'PesanController@doInsertPesan');
