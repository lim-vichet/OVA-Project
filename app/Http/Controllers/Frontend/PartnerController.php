<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public static function getAllDatas()
    {
        $partnerDatas = Partner::where('status', 1)->get(['logo']);
        return $partnerDatas;
    }
}
