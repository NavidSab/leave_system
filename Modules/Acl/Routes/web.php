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



Route::prefix('role')->group(function() {
    Route::get('', 'RoleController@index')->name('role');
    Route::get('{id}', 'RoleController@show')->name('role.show')->where('id', '[0-9]+');
    Route::get('create', 'RoleController@create')->name('role.create');
    Route::get('{id}/edit', 'RoleController@edit')->name('role.edit')->where('id', '[0-9]+');
    Route::post('', 'RoleController@store')->name('role.store');
    Route::post('{id}/destroy', 'RoleController@destroy')->name('role.destroy')->where('id', '[0-9]+');
    Route::post('update', 'RoleController@update')->name('role.update');    
});
Route::prefix('permission')->group(function() {
    Route::get('', 'PermissionController@index')->name('permission');
    Route::get('{id}', 'PermissionController@show')->name('permission.show')->where('id', '[0-9]+');
    Route::get('create', 'PermissionController@create')->name('permission.create');
    Route::get('{id}/edit', 'PermissionController@edit')->name('permission.edit')->where('id', '[0-9]+');
    Route::post('', 'PermissionController@store')->name('permission.store');
    Route::post('{id}/destroy', 'PermissionController@destroy')->name('permission.destroy')->where('id', '[0-9]+');
    Route::post('update', 'PermissionController@update')->name('permission.update');    
});
