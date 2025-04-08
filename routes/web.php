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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/paket/categories', 'PaketCategoryController@index')->name('paket.categories');
Route::get('/paket/departures', 'DepartureController@index')->name('paket.departures');
Route::get('/paket/programs', 'ProgramController@index')->name('paket.programs');
Route::get('/paket/rooms', 'RoomController@index')->name('paket.rooms');
Route::get('/paket/order', 'PaketController@index')->name('paket.order');
Route::get('/paket/jamaah', 'PaketController@jamaah')->name('paket.jamaah');
Route::get('/pembayaran/{id}', 'PaketController@payment')->name('paket.payments');
Route::get('/nik', 'PaketController@getNama');
