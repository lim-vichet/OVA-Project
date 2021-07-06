<?php
use App\Http\Controllers\Backend\AuthController;

Route::group(['prefix'=>'backend'], function (){
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::get('logout', [AuthController::class, 'logout'])->name('login.logout');
});
Route::group(['prefix' => 'backend', 'middleware'=>'auth'], function (){
    Route::get('/index', function (){
        return view('backend/master/masterpage');
    })->name('dashboard');
});
