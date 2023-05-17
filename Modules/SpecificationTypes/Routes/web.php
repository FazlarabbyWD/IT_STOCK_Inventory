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

Route::prefix('specificationtypes')->group(function() {
    Route::get('/', 'SpecificationTypesController@index')->name('SpecificationTypes');
    Route::get('/create', 'SpecificationTypesController@create')->name('SpecificationTypes Create');
    Route::post('/store', 'SpecificationTypesController@store')->name('SpecificationTypes Store');
    Route::get('/edit/{id}', 'SpecificationTypesController@edit')->name('SpecificationTypes Edit');
    Route::post('/update/{id}', 'SpecificationTypesController@update')->name('SpecificationTypes Update');
    Route::get('/delete/{id}', 'SpecificationTypesController@destroy')->name('SpecificationTypes Delete');
});
