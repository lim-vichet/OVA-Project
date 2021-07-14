<?php
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\DirectorController;
use App\Http\Controllers\Backend\MissionController;
use App\Http\Controllers\Backend\VisionController;
use App\Http\Controllers\Backend\StructureController;

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
        Route::get('/edit/{id}', [PartnerController::class, 'show'])->name('partner.show');
        Route::post('/update/{id}', [PartnerController::class, 'update'])->name('partner.update');
    });

    Route::group(['prefix'=>'director'], function (){
        Route::get('/', [DirectorController::class, 'index'])->name('director.index');
        Route::post('/store', [DirectorController::class, 'store'])->name('director.store');
    });

    Route::group(['prefix'=>'mission'], function (){
        Route::get('/', [MissionController::class, 'index'])->name('mission.index');
        Route::post('/store', [MissionController::class, 'store'])->name('mission.store');
    });

    Route::group(['prefix'=>'vision'], function (){
        Route::get('/', [VisionController::class, 'index'])->name('vision.index');
        Route::post('/store', [VisionController::class, 'store'])->name('vision.store');
    });

    Route::group(['prefix'=>'structure'], function (){
        Route::get('/', [StructureController::class, 'index'])->name('structure.index');
        Route::post('/store', [StructureController::class, 'store'])->name('structure.store');
    });
});
