<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;

class save extends Controller{
    public function index(Request $req){

    $mid = $_GET['mid']; //'10';

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
    $fldName = ''; $sfile_name=''; $mfile_name='';
    foreach($mdlfldsdata as $module_field){
            $fldName .= $module_field->field_name.',';
            if( $module_field->field_type == 'list_multiple'){
                //dd($req[$module_field->field_name]);
                $updt_data[$module_field->field_name] = implode(',',$req[$module_field->field_name]);
            }else if( $module_field->field_type == 'check_box'){
                if (isset($req[$module_field->field_name])) {
                    $updt_data[$module_field->field_name] = $req[$module_field->field_name];
                } else {
                    // Checkbox not checked, set a default value
                    $updt_data[$module_field->field_name] = ''; // Or false, depending on your preference
                }
            }else{ 
                if( $module_field->field_name != 'id' && $module_field->field_name != 'recdate' && $module_field->field_name != 'create_date'
                    && $module_field->field_type != 'single_image' && $module_field->field_type != 'single_file'
                    && $module_field->field_type != 'muliti_images'  && $module_field->field_type != 'multi_files'  
                ){
                    $updt_data[$module_field->field_name] = $_POST[$module_field->field_name];
                }
            }


            if( $module_field->field_type == 'single_image' || 
                $module_field->field_type == 'single_file' ){
                    $sfile_name .= $module_field->field_name.',';
            }
            
            if( $module_field->field_type == 'muliti_images' || 
                $module_field->field_type == 'multi_files' ){
                    $mfile_name .= $module_field->field_name.',';
            }

            if($module_field->field_name == 'email_template' ){
                $emailTemplate = htmlspecialchars($req['email_template']);
                $updt_data[$module_field->field_name] = $emailTemplate;
            }
           
    }

    $updt_data['client_id']=Auth::user()->client_id;
    $updt_data['user_id']=Auth::user()->user_id;

    $sfile_name = substr($sfile_name,0, strlen($sfile_name)-1);
    $mfile_name = substr($mfile_name,0, strlen($mfile_name)-1);
    $fldName = substr($fldName,0, strlen($fldName)-1);

    //dd($sfile_name);

    $empty_data = array();
    $data['row'] = $empty_data;
    pre_insert_functions($_POST);
     $recid = DB::table($mdltblname)
    //                 //->selectRaw('*')
    //                 //->where('id', '=', '-10')
    //                 //->groupBy('status')
                     ->insertGetId($updt_data);
    post_insert_functions($_POST, $recid);
    //dd($recid);
    if($recid){
        $rid = $recid;
        // single file or image upload
        if(strlen($sfile_name) > 2){
            $arsfiles = explode(',',$sfile_name);
            for($i=0; $i < count($arsfiles); $i++){
              if($req->hasfile($arsfiles[$i])){
                  //dd($req->file($arsfiles[$i]));
                $upldfile = $req->file($arsfiles[$i])->store('public');
                //dd($upldfile);
                if($upldfile){
                    $upldata[$arsfiles[$i]] = str_replace('public/','',$upldfile);
                    $fileaved = DB::table($mdltblname)
                    //                 //->selectRaw('*')
                                     ->where('id', '=', $rid)
                    //                 //->groupBy('status')
                                     ->update($upldata);

                    // make copies of resized images like product image size, small_image, thumbnail, medium_image etc.
                }
                //dd($fileaved);
              }
            }
        }

        //multiple files or images upload 
        $upldfiles='';
        if(strlen($mfile_name) > 2){
            $arsfiles = explode(',',$mfile_name);
            //print_r($arsfiles);
            for($i=0; $i < count($arsfiles); $i++){
              if($req->hasfile($arsfiles[$i])){
                foreach($req->file($arsfiles[$i]) as $key => $file){
                    $mupldfile1 = $file->store('public');
                    $upldfiles .= $mupldfile1.',';
                }
                $upldfiles = substr($upldfiles,0, strlen($upldfiles)-1);

                //dd( $upldfile);
                 if(strlen($upldfiles)>20){
                        $mupldata[$arsfiles[$i]] =  str_replace('public/','',$upldfiles); 
                        $fileaved = DB::table($mdltblname)
                        //                 //->selectRaw('*')
                                        ->where('id', '=', $rid)
                        //                 //->groupBy('status')
                                        ->update($mupldata);
                    }
              }
              //else{ echo $arsfiles[$i].' is not a file element'; }

            }
        }
    }

    //return \Redirect::route('/designer/module',['mid'=>$mid])->with('msg_success','Record is saved successfuly');
    return redirect('/backend/add?mid='.$mid)->with('msg_success','Record is saved successfuly');;
    }
}