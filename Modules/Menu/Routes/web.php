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

Route::prefix('menu')->group(function() {
    Route::get('/','MenuController@index')->name('menu');
    Route::post('createMenu', 'MenuController@createMenu')->name('menu.create'); 
    Route::post('deleteMenu', 'MenuController@deleteMenu')->name('menu.delete'); 
    Route::post('deleteMenuItem', 'MenuController@deleteMenuItem')->name('menuitem.delete'); 
    Route::post('updateMenuItem', 'MenuController@updateMenuItem')->name('menuitem.update'); 
    Route::post('addCustomMenuItem', 'MenuController@addCustomMenuItem')->name('custommenu.create'); 
    Route::post('generateMenuControl', 'MenuController@generateMenuControl')->name('generate.menucontrol'); 
});
