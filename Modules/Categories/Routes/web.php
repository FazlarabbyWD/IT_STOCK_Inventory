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

Route::prefix('categories')->group(function() {
    Route::get('/', 'CategoriesController@index')->name('Categories');
    Route::get('/create', 'CategoriesController@create')->name('Categories Create');
    Route::post('/store', 'CategoriesController@store')->name('Categories Store');
    Route::get('/edit/{id}', 'CategoriesController@edit')->name('Categories Edit');
    Route::post('/update/{id}', 'CategoriesController@update')->name('Categories Update');
    Route::get('/delete/{id}', 'CategoriesController@destroy')->name('Categories Delete');
});
