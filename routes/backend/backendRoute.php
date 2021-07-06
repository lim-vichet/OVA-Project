<?php
Route::group(['prefix' => 'backend'], function (){
    Route::get('/index', function (){
        return view('backend/master/masterpage');
    });
});
