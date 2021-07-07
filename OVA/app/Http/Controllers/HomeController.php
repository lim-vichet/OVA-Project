<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Header(){
        return view('include/test');
    }
    function Footer(){
        return view('include/footer');
    }
    function Index(){
        return view('Auth/index');
    }
}
