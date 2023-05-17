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

Route::prefix('companies')->group(function() {
    Route::get('/', 'CompaniesController@index')->name('Companies');
    Route::get('/create', 'CompaniesController@create')->name('Companies Create');
    Route::post('/store', 'CompaniesController@store')->name('Companies Store');
    Route::get('/edit/{id}', 'CompaniesController@edit')->name('Companies Edit');
    Route::post('/update/{id}', 'CompaniesController@update')->name('Companies Update');
    Route::get('/delete/{id}', 'CompaniesController@destroy')->name('Companies Delete');
});
