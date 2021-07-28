<?php
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\DirectorController;
use App\Http\Controllers\Backend\MissionController;
use App\Http\Controllers\Backend\VisionController;
use App\Http\Controllers\Backend\StructureController;
use App\Http\Controllers\Backend\ActivityController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\CharityController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\SlideController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VideosController;

//login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login-store', [AuthController::class, 'store'])->name('login.store');
Route::get('logout', [AuthController::class, 'logout'])->name('login.logout');

Route::group(['prefix' => 'backend'], function (){
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

    Route::group(['prefix'=>'videos'], function (){
        Route::get('/', [VideosController::class, 'index'])->name('videos.index');
        Route::get('/ajax-table', [VideosController::class, 'videosAjaxTable'])->name('videos.ajaxtable');
        Route::post('/store', [VideosController::class, 'store'])->name('videos.store');
        Route::get('/disable/{id}', [VideosController::class, 'destroy'])->name('videos.destroy');
        Route::get('/edit/{id}', [VideosController::class, 'show'])->name('videos.show');
        Route::post('/update/{id}', [VideosController::class, 'update'])->name('videos.update');
    });

    Route::group(['prefix'=>'activity'], function (){
        Route::get('/', [ActivityController::class, 'index'])->name('activity.index');
        Route::get('/ajax-table', [ActivityController::class, 'partnerAjaxTable'])->name('activity.ajaxtable');
        Route::post('/store', [ActivityController::class, 'store'])->name('activity.store');
        Route::get('/disable/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');
        Route::get('/edit/{id}', [ActivityController::class, 'show'])->name('activity.show');
        Route::post('/update/{id}', [ActivityController::class, 'update'])->name('activity.update');
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
    Route::group(['prefix'=>'logo'], function (){
        Route::get('/',[LogoController::class, 'index'])->name('logo.index');
        Route::get('logo',[LogoController::class,'Logo'])->name('logo');
        Route::post('logo_insert',[LogoController::class,'Logo_Insert'])->name('logo_insert');
    });

    Route::group(['prefix'=>'charity'], function (){
        Route::get('/',[CharityController::class,'index'])->name('charity.index');
        Route::get('show',[CharityController::class,'Show_detail'])->name('charity.show');
        Route::post('charity_insert',[CharityController::class,'insert'])->name('charity_insert');
    });

    Route::group(['prefix'=>'contact'], function (){
        Route::get('/',[ContactController::class,'index'])->name('contact.index');
        Route::get('ajax-table',[ContactController::class,'ContactAjaxTable'])->name('contact.ajaxtable');
        Route::post('contact_insert',[ContactController::class,'insert'])->name('contact.insert');
        Route::get('destroy/{id}',[ContactController::class,'destroy'])->name('contact.destroy');
        Route::get('edit/{id}',[ContactController::class,'show'])->name('contact.show');
        Route::post('update/{id}',[ContactController::class,'update'])->name('contact.update');
    });

    Route::group(['prefix'=>'slide'], function (){
       Route::get('/',[SlideController::class,'index'])->name('slide.index');
       Route::get('ajax-table',[SlideController::class,'SlideAjaxTable'])->name('slide.ajaxtable');
       Route::post('slide_insert',[SlideController::class,'insert'])->name('slide.insert');
       Route::get('destroy/{id}',[SlideController::class,'destroy'])->name('slide.destroy');
       Route::get('edit/{id}',[SlideController::class,'show'])->name('slide.show');
       Route::post('update/{id}',[SlideController::class,'update'])->name('slide.update');
    });
    //user
    Route::group(['prefix'=>'user'], function (){
        Route::get('/',[UserController::class,'index'])->name('user.index');
        Route::get('ajax-table',[UserController::class,'userAjaxTable'])->name('user.ajaxtable');
        Route::post('user_insert',[UserController::class,'insert'])->name('user.insert');
        Route::get('destroy/{id}',[UserController::class,'destroy'])->name('user.destroy');
        Route::get('edit/{id}',[UserController::class,'show'])->name('user.show');
        Route::post('update/{id}',[UserController::class,'update'])->name('user.update');
    });
});
