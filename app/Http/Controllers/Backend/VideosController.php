<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Videos;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VideosController extends Controller
{
    public function index()
    {
        return view('backend/videos/videosindex');
    }

    public function videosAjaxTable(Request $request)
    {
        if ($request->ajax()){
            $datas = Videos::all();
            return DataTables::of($datas)
                ->addColumn('action', function ($datas){
                    $button = "<button class='btn btn-primary btn-sm' id='btnEdit' data-id='".$datas->id."'>Edit</button>";

                    $button .= "<button class='btn btn-danger btn-sm' id='btnDelete' data-id='".$datas->id."'>Delete</button>";
                    return $button;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'txtTitle'  => 'required',
            'txtDetail' => 'required'
        ]);

        $request->txtDetail = str_replace('"560"', '"100%"', $request->txtDetail);
        $request->txtDetail = str_replace('"315"', '"100%"', $request->txtDetail);

        $videos = new Videos();
        $videos->title = $request->txtTitle;
        $videos->youtube = $request->txtDetail;
        $videos->save();
        return response([
            'createok'  => ''
        ], 200);
    }

    public function show($id)
    {
        $videosData = Videos::find($id);
        return response()->json($videosData);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'txtTitle'  => 'required',
            'txtDetail' => 'required'
        ]);
        $video = Videos::find($id);
        $video->title = $request->txtTitle;
        $video->youtube = $request->txtDetail;
        $video->save();
        return response([
            'updateok'  => ''
        ], 200);
    }

    public function destroy($id)
    {
        Videos::find($id)->delete();
        return response([
            'destroyok'  => ''
        ], 200);
    }
}
