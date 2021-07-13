<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectorController extends Controller
{
    public function index()
    {
        $directorData = Director::first();
        return view('backend/director/directorindex', compact('directorData'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $count = Director::count();
            if ($count == 1){
                $director = Director::first();
            }else{
                $director = new Director();
            }
            $director->detail = $request->txtDirector;
            if ($director->save()){
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
