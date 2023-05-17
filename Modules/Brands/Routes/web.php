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

Route::prefix('brands')->group(function() {
    Route::get('/', 'BrandsController@index')->name('Brands');
    Route::get('/create', 'BrandsController@create')->name('Brands Create');
    Route::post('/store', 'BrandsController@store')->name('Brands Store');
    Route::get('/edit/{id}', 'BrandsController@edit')->name('Brands Edit');
    Route::post('/update/{id}', 'BrandsController@update')->name('Brands Update');
    Route::get('/delete/{id}', 'BrandsController@destroy')->name('Brands Delete');
});
