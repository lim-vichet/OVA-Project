<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logo;

class LogoController extends Controller
{
    function index(){
        return view('backend/logo/logoindex');
    }
    function Logo(){
        $logos = Logo::all();
        return view('include/header')->with('logos', $logos);
    }
    function Logo_Insert(Request $request){
        $logo = new Logo();
        $logo->	khmer_name = $request->	khmer_name;
        $logo-> english_name = $request-> english_name;
        if ($request->hasFile('img')){
            $file = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/upload', $file);
            $logo->img = $file;
        }
        else{
            $logo->img = '';
        }
        $logo->save();

        return redirect()->route('logo.index');

    }
}
