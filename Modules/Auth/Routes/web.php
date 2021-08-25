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

Route::prefix('auth')->group(function() {
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@login')->name('post.login');
    // Route::get('register', 'RegisterController@index')->name('register');
    // Route::post('register', 'RegisterController@create')->name('post.register');
    Route::post('logout', 'LogoutController@logout')->name('logout');
});
