<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use Illuminate\Support\Facades\DB;

class add extends Controller
{
    public function index(){

        $mid = $_GET['mid']; //'10';
        
        $mdlsdata = DB::table('dznr_modules')
                ->selectRaw(' * ')
                ->where('id', '=', $mid)
                //->groupBy('status')
                ->get();

        $mdlsid =  $mdlsdata[0]->id;
        $mdltblname =  $mdlsdata[0]->table_name;
        $data['module_info'] =  $mdlsdata[0];
        $add_view_file = $mdlsdata[0]->addedit_view_file;
        
        $mdlfldsdata = DB::table('dznr_module_fields')
                        ->selectRaw(' * ')
                        ->where('dznr_moduleid', '=', $mdlsid)
                        ->orderBy('display_seq')
                        ->get();
        //dd($mdlfldsdata);                 
        $data['module_fields'] = $mdlfldsdata;
        $data['action']= 'save?mid='.$mid;
        // $fldName = '';
        // foreach($mdlfldsdata as $module_field){
        //         $fldName .= $module_field->field_name.',';
        // }
        // $fldName = substr($fldName,0, strlen($fldName)-1);

       $empty_data = array();
       $data['row'] = $empty_data;        
       
        if($add_view_file != ''){
                return view('backend/'.$add_view_file, $data);
        }else{
            return view('designer/module_data_add',$data);
        }
        
    }


   


}
