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

Route::prefix('leave')->group(function() {
    Route::get('', 'LeaveController@index')->name('leave');
    Route::get('{id}', 'LeaveController@show')->name('leave.show')->where('id', '[0-9]+');
    Route::get('create', 'LeaveController@create')->name('leave.create');
    Route::get('{id}/edit', 'LeaveController@edit')->name('leave.edit')->where('id', '[0-9]+');
    Route::post('', 'LeaveController@store')->name('leave.store');
    Route::post('{id}/destroy', 'LeaveController@destroy')->name('leave.destroy')->where('id', '[0-9]+');
    Route::post('update', 'LeaveController@update')->name('leave.update');
});