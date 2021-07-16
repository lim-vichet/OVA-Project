<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charity;

class CharityController extends Controller
{
    function index(){
        return view('backend/charity/charityindex');
    }
    function Show_detail(){
        $show = Charity::all();
        return view('Auth/charity')->with('show', $show);
    }
    function insert(Request $request){
        $charity = new Charity();
        $charity->detail = $request->detail;
        $charity->save();
        return redirect()->route('charity.index');
    }
}
