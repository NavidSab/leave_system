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

Route::prefix('user')->group(function() {
    Route::get('', 'UserController@index')->name('user');
    Route::get('{id}', 'UserController@show')->name('user.show')->where('id', '[0-9]+');
    Route::get('create', 'UserController@create')->name('user.create');
    Route::get('{id}/edit', 'UserController@edit')->name('user.edit')->where('id', '[0-9]+');
    Route::post('', 'UserController@store')->name('user.store');
    Route::post('{id}/destroy', 'UserController@destroy')->name('user.destroy')->where('id', '[0-9]+');
    Route::post('update', 'UserController@update')->name('user.update');
});