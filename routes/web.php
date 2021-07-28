<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

/**
 * Backend routes
*/
include_once 'backend/backendRoute.php';

//HomeController
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'Index'])->name('/');
Route::get('header',[HomeController::class,'Header'])->name('header');
Route::get('footer',[HomeController::class,'Footer'])->name('footer');
Route::get('director',[HomeController::class,'Director'])->name('director');
Route::get('mission',[HomeController::class,'Mission'])->name('mission');
Route::get('vision',[HomeController::class,'Vision'])->name('vision');
Route::get('structure',[HomeController::class,'Structure'])->name('structure');
Route::get('activity',[HomeController::class,'Activity'])->name('activity');
Route::get('page-detail/{id}',[HomeController::class,'Page_Detail'])->name('page-detail');
Route::get('charity',[HomeController::class,'Charity'])->name('charity');
Route::get('contact',[HomeController::class,'Contact'])->name('contact');

