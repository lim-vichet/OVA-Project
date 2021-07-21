<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public static function getAllActivityDatas()
    {
        $activityDatas = Activity::where('status', 1)->get(['id','title','thumbnail','detail']);
        return $activityDatas;
    }
}
