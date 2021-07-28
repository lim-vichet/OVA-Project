<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Piseth\Storagehelper\Libs\StorageHelper;
use Yajra\DataTables\DataTables;

class PartnerController extends Controller
{
    use StorageHelper;
    public function index()
    {
        return view('backend/partner/partnerindex');
    }
    public function partnerAjaxTable(Request $request)
    {
        if ($request->ajax()){
            $datas = Partner::where('status', '!=', 0);
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
            'txtPartnerName'    => 'required',
            'txtPartnerLogo'    => 'required|mimes:jpg,png,jpeg'
        ]);

        DB::beginTransaction();
        try{
            $logo = $this->helpMeForFile($request->txtPartnerLogo)
                ->pathToStore('public/backend/partner')
                ->ok();

            $partner = new Partner();
            $partner->name  = $request->txtPartnerName;
            $partner->logo  = $logo;
            if ($partner->save()){
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

    public function destroy($id)
    {
        Partner::where('id', $id)->update([
            'status'    => 0
        ]);
        return response([
            'msg'   => 'ok'
        ], 200);
    }

    public function show($id)
    {
        $partner = Partner::find($id);
        return response()->json($partner);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $logo = $this->helpMeForFile($request->txtPartnerLogo)
                ->pathToStore('public/backend/partner')
                ->ok();

            $partner = Partner::find($id);
            $partner->name  = $request->txtPartnerName;
            $logo == "naf" ? "" : $partner->logo = $logo;
            if ($partner->save()){
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
