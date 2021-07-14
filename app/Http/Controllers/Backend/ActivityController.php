<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Piseth\Storagehelper\Libs\StorageHelper;
use Yajra\DataTables\DataTables;
use App\Model\Backend\Activity;

class ActivityController extends Controller
{
    use StorageHelper;
    public function index(){
        return view('backend/activity/activityindex');
    }

    public function partnerAjaxTable(Request $request)
    {
        if ($request->ajax()){
            $datas = Activity::where('status', '!=', 0);
            return DataTables::of($datas)
                ->addColumn('action', function ($datas){
                    $button = "<button class='btn btn-primary btn-sm' id='btnEdit' data-id='".$datas->id."'>Edit</button>";
                    $button .= "<button class='btn btn-danger btn-sm' id='btnDisable' data-id='".$datas->id."'>Disable</button>";
                    return $button;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'txtTitle'    => 'required',
            'txtThumbnail'    => 'required|mimes:jpg,png,jpeg,gif',
            'txtDetail' => 'required',
        ]);

        DB::beginTransaction();
        try{
            $thumbnail = $this->helpMeForFile($request->txtThumbnail)
                ->pathToStore('public/backend/activity')
                ->ok();

            $activity = new Activity();
            $activity->title  = $request->txtTitle;
            $activity->thumbnail  = $thumbnail;
            $activity->detail  = $request->txtDetail;
            if ($activity->save()){
                DB::commit();
                return response([
                    'msg' => 'success'
                ]);
            }
        }catch (\Exception $exception){
            DB::rollBack();
            return response([
                'msg'   => 'fail',
                'note'  => $exception->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        Activity::where('id', $id)->update([
            'status'    => 0
        ]);
        return response([
            'msg'   => 'ok'
        ], 200);
    }

    public function show($id)
    {
        $activity = Activity::find($id);
        return response()->json($activity);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $thumbnail = $this->helpMeForFile($request->txtPartnerLogo)
                ->pathToStore('public/backend/partner')
                ->ok();

            $activity = Activity::find($id);
            $activity->title  = $request->txtTitle;
            $activity->detail  = $request->txtDetail;
            $thumbnail == "naf" ? "" : $activity->thumbnail = $thumbnail;
            if ($activity->save()){
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
