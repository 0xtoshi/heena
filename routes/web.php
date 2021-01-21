<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::post('/pengguna/buat', 'PenggunaController@UnchMakeUser');
Route::post('/pengguna/login', 'PenggunaController@UnchLogin');
Route::get('/pengguna/session', 'PenggunaController@UnchSessionCek');

