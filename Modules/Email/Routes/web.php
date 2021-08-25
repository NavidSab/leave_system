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

Route::prefix('email')->group(function() {
    Route::get('/','EmailController@index')->name('email');
    Route::get('leaveConfirm/{type}/{code}/{approve}','EmailController@leaveConfirm')->name('leave.confirm');
    //test in browser
    Route::get('/test', function () {
        $invoice = Modules\Email\Entities\Email::find(34);
        return new  Modules\Email\Http\Mail\LeaveRequest($invoice);
    });
    Route::get('/test1', function () {
        $leave = Modules\Leave\Entities\Leave::find(54);
        return new  Modules\Email\Http\Mail\LeaveUserApprove($leave);
    });
});


