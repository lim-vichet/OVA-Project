<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charity;

class CharityController extends Controller
{
    function index(){
        $charity = Charity::first();
        return view('backend/charity/charityindex', compact('charity'));
    }
    function Show_detail(){
        $show = Charity::all();
        return view('Auth/charity')->with('show', $show);
    }
    function insert(Request $request){
        if (Charity::count() == 0)
            $charity = new Charity();
        else
            $charity = Charity::first();
        $charity->detail = $request->detail;
        $charity->save();
        return redirect()->route('charity.index');
    }
}
