<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Piseth\Storagehelper\Libs\StorageHelper;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    use StorageHelper;


    function index(){
        return view('backend/contact/contactindex');
    }
    function ContactAjaxTable(Request $request){
        if ($request->ajax()){
            $datas = Contact::where('status', 1)->get();
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
        $contact = new Contact();
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        if ($request->hasFile('img')){
            $file = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/upload', $file);
            $contact->img = $file;
        }
        else{
            $contact->img = '';
        }
        $contact->save();
        return redirect()->route('contact.index');
    }

    function destroy($id){
        Contact::where('id', $id)->update([
            'status'    => 0
        ]);
        return response([
            'msg'   => 'ok'
        ], 200);
    }


    function show($id){
        $contact = Contact::find($id);
        return response()->json($contact);
    }
    function update(Request $request, $id){
        DB::beginTransaction();
        try{
            $img = $this->helpMeForFile($request->img)
                ->pathToStore('public/upload')
                ->ok();

            $contact = Contact::find($id);
            $contact->address  = $request->address;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $img == "naf" ? "" : $contact->img = $img;
            if ($contact->save()){
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
