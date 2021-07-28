<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        return view('backend/auth/loginindex');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);
        $critical = [
            'name'  => $request->username,
            'password'  => $request->password
        ];
        if(Auth::attempt($critical)){
            return redirect()->route('dashboard');
        }else{
            return "Can't login";
        }
    }

    public function logout()
    {
        Auth::logout();
    }
}
