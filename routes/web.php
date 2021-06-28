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

Route::get('/book', function () {
    return view('truck.book');
});

Route::get('/new', function () {
    return view('sell');
});

Route::get('/get', function () {
    return view('get');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/dashboard', function () {
    return view('dash');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/garage', 'TruckController@garage');
Route::get('/book', 'TruckController@book');
Route::get('/mechanic', 'TruckController@mechanic');
Route::get('/request', 'TruckController@index');
Route::get('/history', 'TruckController@history');
Route::get('/mhistory', 'TruckController@mechistory');
Route::get('/trucks', 'TruckController@trucks');
Route::get('/book/{id}/{mec}', 'TruckController@booked');
Route::get('/waiting/{id}', 'TruckController@state');
Route::get('/view-request', 'TruckController@booked');
Route::get('/cancel/{id}', 'TruckController@cancel');
Route::get('/endtrip/{id}', 'TruckController@endtrip');





Route::post('save-mechanic', 'TruckController@mechanicsave');
Route::post('save-garage', 'TruckController@garagesave');
Route::post('book-now', 'TruckController@requestsave');