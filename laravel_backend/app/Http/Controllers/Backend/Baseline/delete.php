<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use Illuminate\Support\Facades\DB;

class delete extends Controller
{
    public function index(){

        $mid = $_GET['mid']; //'10';
        $rid = $_GET['rid']; //'10';

        $mdlsdata = DB::table('dznr_modules')
                ->selectRaw(' * ')
                ->where('id', '=', $mid)
                //->groupBy('status')
                ->get();
        $mdlsid =  $mdlsdata[0]->id;
        $mdltblname =  $mdlsdata[0]->table_name;
        $data['module_info'] =  $mdlsdata[0];

        $mdlfldsdata = DB::table('dznr_module_fields')
                        ->selectRaw(' * ')
                        ->where('dznr_moduleid', '=', $mdlsid)
                        //->groupBy('status')
                        ->get();
        //dd($mdlfldsdata);                
        $data['module_fields'] = $mdlfldsdata;
        $fldName = '';
        foreach($mdlfldsdata as $module_field){
                $fldName .= $module_field->field_name.',';
        }
        $fldName = substr($fldName,0, strlen($fldName)-1);

        pre_delete_functions(['id'=>$rid]);
        $isdel = DB::table($mdltblname)
                         ->where('id', '=', $rid)
                         ->delete();
        if($isdel){
            post_delete_functions(['id'=>$rid]);
        }
        //dd($data_row);
    //    return redirect()->route('/designer/module',['mid'=>$mid]);
       return redirect('/backend/module?mid='.$mid)->with('msg_success','Record is deleted successfuly');;
        //return back()->with('msg_success','Record is deleted successfuly');
    }
}
