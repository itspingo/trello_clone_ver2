<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use App\helper;
use Illuminate\Support\Facades\DB;

class module extends Controller
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
        $mdlfilter =  $mdlsdata[0]->filter;
        
        // dd($mdltblname);  
       
       
        $data['module_info'] =  $mdlsdata[0];

        $mdlfldsdata = DB::table('dznr_module_fields')
                        ->selectRaw(' * ')
                        ->where('dznr_moduleid', '=', $mdlsid)
                        //->groupBy('status')
                        ->orderby('display_seq')
                        ->get();
        //dd($mdlfldsdata);
        $data['module_fields'] = $mdlfldsdata;
        $fldName = '';
        foreach($mdlfldsdata as $module_field){
            if($module_field->onlistpag == 'Y'){
                //$vtable_headings .= $module_field->field_label.',';
                $fldName .= $module_field->field_name.',';
                //echo $module_field['field_name'];
            }    
        }
        $fldName = substr($fldName,0, strlen($fldName)-1);

        $fltr_col = ''; $fltr_opr=''; $fltr_val='';
        if(strlen($mdlfilter)>3){
            $armdlfilter = explode(',',$mdlfilter);

            // dd($armdlfilter);
            $fltr_col = $armdlfilter[0];
            $fltr_opr = $armdlfilter[1];
            $fltr_val = $armdlfilter[2];
        }


        $data_rows = DB::table($mdltblname)
                        ->selectRaw($fldName);
        // dd($data_rows);  
        if(strlen($mdlfilter)>3){
            $data_rows = $data_rows->where($fltr_col, $fltr_opr, $fltr_val);
        }                
        $data_rows = $data_rows->simplePaginate(50);

                        //->where('dznr_moduleid', '=', $mdlsid)
                        //->groupBy('status')                        
                        //->get()
                        
                        
        $data_rows->appends(['mid'=>$mid])->links();
        $data['rows'] = $data_rows;
        //die();
       
        return view('designer/modules_data_list',$data);
    }


}
