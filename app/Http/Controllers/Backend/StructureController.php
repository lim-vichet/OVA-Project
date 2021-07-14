<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StructureController extends Controller
{
    public function index()
    {
        $structureData = Structure::first();
        return view('backend/structure/structureindex', compact('structureData'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $count = Structure::count();
            if ($count == 1){
                $structure = Structure::first();
            }else{
                $structure = new Structure();
            }
            $structure->detail = $request->txtStructure;
            if ($structure->save()){
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
