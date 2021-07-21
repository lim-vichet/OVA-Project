<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public static function getVisionData()
    {
        $visionData = Vision::first();
        return $visionData;
    }
}
