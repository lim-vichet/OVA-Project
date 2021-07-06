<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Header(){
        return view('include/header');
    }
    function Index(){
        return view('Auth/index');
    }
}
