<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisionController extends Controller
{
    public function index()
    {
        $visionData = Vision::first();
        return view('backend/vision/visionindex', compact('visionData'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $count = Vision::count();
            if ($count == 1){
                $vision = Vision::first();
            }else{
                $vision = new Vision();
            }
            $vision->detail = $request->txtVision;
            if ($vision->save()){
                DB::commit();
                return response([
                    'msg'   => 'success'
                ]);
            }
        }catch (\Exception $exception){
            DB::rollBack();
            return response([
                'msg'   => 'fail'
            ]);
        }

    }
}
