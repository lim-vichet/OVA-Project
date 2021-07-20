<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Piseth\Storagehelper\Libs\StorageHelper;
use Yajra\DataTables\DataTables;

class UserController extends Controller

{
    use StorageHelper;


    function index(){
        return view('backend/user/userindex');
    }
}
