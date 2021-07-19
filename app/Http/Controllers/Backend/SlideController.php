<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
use Illuminate\Support\Facades\DB;
use Piseth\Storagehelper\Libs\StorageHelper;
use Yajra\DataTables\DataTables;


class SlideController extends Controller
{
    use StorageHelper;

}
