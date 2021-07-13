<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MissionController extends Controller
{
    public function index()
    {
        $missionData = Mission::first();
        return view('backend/mission/missionindex', compact('missionData'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $count = Mission::count();
            if ($count == 1){
                $mission = Mission::first();
            }else{
                $mission = new Mission();
            }
            $mission->detail = $request->txtMission;
            if ($mission->save()){
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
