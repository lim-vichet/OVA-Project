<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    public static function getStructureData()
    {
        $structureData = Structure::first();
        return $structureData;
    }
}
