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

    function index(){
        return view('backend/slide/slideindex');
    }
    function SlideAjaxTable(Request $request){
        if ($request->ajax()){
            $datas = Slide::where('status', 1)->get();
            return DataTables::of($datas)
                ->addColumn('action', function ($datas){
                    $button = "<button class='btn btn-primary btn-sm' id='btnEdit' data-id='".$datas->id."'>Edit</button>";
                    $button .= "<button class='btn btn-danger btn-sm' id='btnDisable' data-id='".$datas->id."'>Disable</button>" ;
                    return $button;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    function insert(Request $request){
        $slide = new Slide();
//        $slide->id = $request->id;
        $slide->name = $request->name;
        if ($request->hasFile('img')){
            $file = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/upload', $file);
            $slide->img = $file;
        }
        else{
            $slide->img = '';
        }
        $slide->save();
        return redirect()->route('slide.index');
    }

    function destroy($id){
        Slide::where('id', $id)->update([
            'status'    => 0
        ]);
        return response([
            'msg'   => 'ok'
        ], 200);
    }

    function show($id){
        $slide = Slide::find($id);
        return response()->json($slide);
    }
    function update(Request $request, $id){
        DB::beginTransaction();
        try{
            $img = $this->helpMeForFile($request->img)
                ->pathToStore('public/upload')
                ->ok();

            $slide = Slide::find($id);
            $slide->name = $request->name;
            $img == "naf" ? "" : $slide->img = $img;
            if ($slide->save()){
                DB::commit();
                return response([
                    'msg' => 'success'
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
