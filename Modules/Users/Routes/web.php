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

Route::prefix('users')->group(function() {
    Route::get('/', 'UsersController@index')->name('Users');
    Route::get('/create', 'UsersController@create')->name('Users Create');
    Route::post('/store', 'UsersController@store')->name('Users Store');
    Route::get('/edit/{id}', 'UsersController@edit')->name('Users Edit');
    Route::post('/update/{id}', 'UsersController@update')->name('Users Update');
    Route::get('/delete/{id}', 'UsersController@destroy')->name('Users Delete');
});
