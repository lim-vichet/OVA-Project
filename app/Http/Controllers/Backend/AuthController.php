<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if(Auth::attempt($critical, true)){
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
