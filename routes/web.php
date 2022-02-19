<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/soal1', 'JawabController@Soal1'); // soal nomor 1
Route::get('/soal2/{nilai}', 'JawabController@Soal2'); // soal nomor 2
Route::get('/soal3', 'JawabController@Soal3'); // soal nomor 3

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/beranda', function () {
    return view('page.users.beranda');
});

Route::get('/apoteker', function () {
    return view('page.users.apoteker');
});

Route::get('/obat', function () {
    return view('page.users.obat');
});

Route::get('/laporan', function () {
    return view('page.users.laporan');
});



// AUTH
Route::post('login', 'Auth\LoginController@doLogin')->name('auth.login'); // login
Route::post('logout', 'Auth\LoginController@doLogout')->name('auth.logout'); // logout
// End AUTH

// LIST DATA
Route::post('list_obat', 'DataController@listObat')->name('list.obat'); // login
// End LIST DATA

// Apoteker
Route::post('show_data_apoteker', 'ApotekerController@show')->name('apoteker.show'); // show apoteker
Route::post('proses_add_apoteker', 'ApotekerController@add')->name('apoteker.add'); // add apoteker
Route::post('proses_edit_apoteker', 'ApotekerController@edit')->name('apoteker.edit'); // edit apoteker
Route::post('proses_delete_apoteker', 'ApotekerController@delete')->name('apoteker.delete'); // delete apoteker
// End Apoteker

// Obat
Route::post('show_data_obat', 'ObatController@show')->name('obat.show'); // show obat
Route::post('proses_add_obat', 'ObatController@add')->name('obat.add'); // add obat
Route::post('proses_add_trx_obat', 'ObatController@trx_add')->name('obat.trx_add'); // add obat
Route::post('proses_edit_obat', 'ObatController@edit')->name('obat.edit'); // edit obat
Route::post('proses_delete_obat', 'ObatController@delete')->name('obat.delete'); // delete obat
// End Obat


// Trx
Route::post('show_trx', 'LaporanController@show')->name('laporan.show'); // show trx
Route::post('show_detil_trx', 'LaporanController@show_detil')->name('laporan.show_detil'); // add trx
// End Trx






