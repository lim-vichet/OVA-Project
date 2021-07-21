<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public static function getMisionData()
    {
        $missionData = Mission::first();
        return $missionData;
    }
}
