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

Route::prefix('products')->group(function() {
    Route::get('/', 'ProductsController@index')->name('Products');
    Route::get('/create', 'ProductsController@create')->name('Products Create');
    Route::post('/store', 'ProductsController@store')->name('Products Store');
    Route::get('/edit/{id}', 'ProductsController@edit')->name('Products Edit');
    Route::post('/update/{id}', 'ProductsController@update')->name('Products Update');
    Route::get('/delete/{id}', 'ProductsController@destroy')->name('Products Delete');
    Route::get('/stock/create/{id}', 'ProductsController@stockCreate')->name('Products Stock Create');
    Route::post('/stock/update/{id}', 'ProductsController@stockUpdate')->name('Products Stock Update');
});
