<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Piseth\Storagehelper\Libs\StorageHelper;
use Yajra\DataTables\DataTables;

class UserController extends Controller

{
    use StorageHelper;

    function index(){
        return view('backend/user/userindex');
    }
    function userAjaxTable(Request $request){
        if ($request->ajax()){
            $datas = User::where('status', 1)->get();
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('img')){
            $file = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/upload', $file);
            $user->img = $file;
        }
        else{
            $user->img = '';
        }
        $user->save();
        return redirect()->route('user.index');
    }
    function destroy($id){
        User::where('id', $id)->update([
            'status'    => 0
        ]);
        return response([
            'msg'   => 'ok'
        ], 200);
    }
    function show($id){
        $user = User::find($id);
        return response()->json($user);
    }
    function update(Request $request, $id){
        DB::beginTransaction();
        try{
            $img = $this->helpMeForFile($request->img)
                ->pathToStore('public/upload')
                ->ok();

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $img == "naf" ? "" : $user->img = $img;
            if ($user->save()){
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
