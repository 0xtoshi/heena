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
Route::get('/login', 'UnchUI@UnchLogin');


Route::group( ['middleware' => 'heenasession'], function(){ 

    
    Route::get('/dashboard', 'UnchUI@UnchDashboard');
    Route::get('/rekening', 'UnchUI@UnchRekening');
    Route::get('/kas/masuk', 'UnchUI@UnchKasMasuk');
    Route::get('/kas/keluar', 'UnchUI@UnchKasKeluar');
    Route::get('/profil', 'UnchUI@UnchProfil');
    Route::get('/rekap', 'UnchUI@UnchRekap');
    
    
    // ROUTING CRUD REKENING
    
    Route::post('/rekening/tambah','RekeningController@TambahRekening');
    Route::post('/rekening/delete','RekeningController@DeleteRekening');
    Route::post('/rekening/update','RekeningController@UpdateRekening');
    Route::get('/rekening/show/{id}','RekeningController@getDataRekening');
    
    
    Route::post('/kas/tambah','KasController@TambahKas');
    Route::post('/kas/delete','KasController@DeleteKas');
    Route::post('/kas/update','KasController@UpdateKas');
    Route::get('/kas/show/{id}','KasController@ShowKas');
    
    
    Route::post('/nota/upload','NotaneController@UploadNota');
    Route::get('/nota/id','NotaneController@getLastID');
    
    
    Route::post('/profile/ubahpassword','PenggunaController@UbahPassword');

    Route::get('/rekap/tahunan/{id}','UnchUI@UnchRekapTahunan');

});

