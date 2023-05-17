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

Route::prefix('contacts')->group(function() {
    Route::get('/', 'ContactsController@index')->name('Contacts');
    Route::get('/create', 'ContactsController@create')->name('Contacts Create');
    Route::post('/store', 'ContactsController@store')->name('Contacts Store');
    Route::get('/edit/{id}', 'ContactsController@edit')->name('Contacts Edit');
    Route::post('/update/{id}', 'ContactsController@update')->name('Contacts Update');
    Route::get('/delete/{id}', 'ContactsController@destroy')->name('Contacts Delete');
});
