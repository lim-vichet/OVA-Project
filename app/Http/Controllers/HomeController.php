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
    function Director(){
        return view('Auth/director');
    }
    function Mission(){
        return view('Auth/mission');
    }
    function Vision(){
        return view('Auth/vision');
    }
    function Structure(){
        return view('Auth/structure');
    }
    function Activity(){
        return view('Auth/activity');
    }
    function Page_Detail(){
        return view('Auth/page-detail');
    }
    function Charity(){
        return view('Auth/charity');
    }
    function Contact(){
        return view('Auth/contact');
    }
}
