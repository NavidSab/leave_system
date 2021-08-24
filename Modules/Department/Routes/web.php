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


Route::prefix('department')->group(function() {
    Route::get('', 'DepartmentController@index')->name('department');
    Route::get('{id}', 'DepartmentController@show')->name('department.show')->where('id', '[0-9]+');
    Route::get('create', 'DepartmentController@create')->name('department.create');
    Route::get('{id}/edit', 'DepartmentController@edit')->name('department.edit')->where('id', '[0-9]+');
    Route::post('', 'DepartmentController@store')->name('department.store');
    Route::post('{id}/destroy', 'DepartmentController@destroy')->name('department.destroy')->where('id', '[0-9]+');
    Route::post('update', 'DepartmentController@update')->name('department.update');
});