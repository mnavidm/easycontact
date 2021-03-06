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

Route::resource('/contact','ContactController');

Route::prefix('/contact/{contact}')->group(function () {

    Route::resource('phone', 'PhoneController');

    Route::resource('email', 'EmailController');

});

Route::get('/home/name','HomeController@name')->name('homeOrdername');
