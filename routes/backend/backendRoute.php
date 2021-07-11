<?php
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\PartnerController;

Route::group(['prefix'=>'backend'], function (){
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::get('logout', [AuthController::class, 'logout'])->name('login.logout');
});
Route::group(['prefix' => 'backend', 'middleware'=>'auth'], function (){
    Route::get('/index', function (){
        return view('backend/master/masterpage');
    })->name('dashboard');

    Route::group(['prefix'=>'partner'], function (){
        Route::get('/', [PartnerController::class, 'index'])->name('partner.index');
        Route::get('/ajax-table', [PartnerController::class, 'partnerAjaxTable'])->name('partner.ajaxtable');
        Route::post('/store', [PartnerController::class, 'store'])->name('partner.store');
        Route::get('/disable/{id}', [PartnerController::class, 'destroy'])->name('partner.destroy');
    });
});
