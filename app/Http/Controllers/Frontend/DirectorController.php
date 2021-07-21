<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public static function getDirectorData()
    {
        $directorData = Director::first();
        return $directorData;
    }
}
