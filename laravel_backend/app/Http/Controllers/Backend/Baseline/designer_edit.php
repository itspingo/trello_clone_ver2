<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use Illuminate\Support\Facades\DB;

class designer_edit extends Controller
{
    public function index(){
        $dbname = DB::connection()->getDatabaseName();
        $mid = $_GET['mid'];

        $data['dbtables'] = DB::table('information_schema.tables')
                            ->selectRaw('table_name')
                            ->where('table_schema', '=', $dbname)
                            ->orderBy('table_name')
                            ->get();

        $data['dznr_module'] = DB::table('dznr_modules')
                            ->selectRaw('*')
                            ->where('id', '=', $mid )
                            ->get();

        $data['menu_headings'] = DB::table('dznr_modules')
                            ->selectRaw(' * ')
                            ->where('active', '=', 'Y')
                            ->where('table_name', '=', '')
                            //->orderBy('menu_seq')
                            ->get();

        $dznr_fields = DB::table('dznr_module_fields')
                            ->selectRaw('*')
                            ->where('dznr_moduleid', '=',  $mid )
                            ->get();
        $data['dznr_fields'] = $dznr_fields;

        $arlistTblCols = array();
        foreach($dznr_fields as $dznr_field){
            if($dznr_field->listmodulename != ''){
                //echo 'listmodulename: '.$dznr_field->listmodulename.'<br>';
                //array_push($arlistTblCols,['list_table_name'=>$dznr_field->listmodulename]);
                //$sqltblname = array('table_name'=>$dznr_field->listmodulename);
                $tblCols =DB::table('information_schema.columns')
                                        ->select('table_name','COLUMN_NAME')
                                        ->where('table_schema', '=', $dbname )
                                        ->where('table_name', '=',  $dznr_field->listmodulename )
                                        ->get();
                array_push($arlistTblCols,$tblCols);
                // echo '<pre>';
                // print_r($tblCols);
                // echo '</pre>';
                
                
            }
        }
        $data['listTblCols'] = $arlistTblCols;
        
      
       
        return view('designer/dznr/addedit',$data);
    }

    /* public function ajax_module_fields(){
         $dbname = DB::connection()->getDatabaseName();
        $tblname = $_GET['tblnam'];
        $data['curnt_table_columns'] = DB::table('information_schema.columns')
                            ->selectRaw('*')
                            ->where('table_schema', '=', $dbname )
                            ->where('table_name', '=',  $tblname )
                            ->get();

        $data['dbtables'] = DB::table('information_schema.tables')
                            ->selectRaw('table_name')
                            ->where('table_schema', '=', $dbname)
                            ->orderBy('table_name')
                            ->get();

        return view('designer/dznr/ajax_module_fields',$data);                    

    } */

    /*public function ajax_table_fields(){
         $dbname = DB::connection()->getDatabaseName();
        $tblname = $_GET['tblnam'];
        $data['recno'] = $_GET['rno'];
        $data['list_table_columns'] = DB::table('information_schema.columns')
                            ->selectRaw('*')
                            ->where('table_schema', '=', $dbname )
                            ->where('table_name', '=',  $tblname )
                            ->get();
        return view('designer/dznr/ajax_listable_fields',$data);            

    } */

    public function update(){
        
        $newModuleInfo = array(
            'module_name' => $_POST['module_name'],
            'module_type' => $_POST['module_type'],
            'module_icon' => $_POST['module_icon'],
            'parent_module' => $_POST['parent_module'],
            'is_hidden' => $_POST['is_hidden'],
            'table_name' => $_POST['module_table']
        );
        $dznrMdlid = DB::table('dznr_modules')
                         ->where('id','=',$_POST['module_id'])
                         ->update($newModuleInfo);

        $dznrMdlFldid='';
        for($i=0; $i<count($_POST['field_name']); $i++){
            $newModuleFields = array(
                'field_name' => $_POST['field_name'][$i],
                'field_label' => $_POST['field_label'][$i],
                'field_type' => $_POST['field_type'][$i],
                'isrequired' => $_POST['isrequired'][$i],
                'display_seq' => $_POST['display_seq'][$i],
                'input_length' => ($_POST['input_length'][$i])?$_POST['input_length'][$i]:0,
                'listmodulename' => $_POST['listmodulename'][$i],
                'listmoduleitem' => $_POST['listmoduleitem'][$i],
                'staticlist' => $_POST['staticlist'][$i],
                'onlistpag' => $_POST['onlistpag'][$i]
            );
            //print_r($newModuleFields);
            
             $dznrMdlFldid = DB::table('dznr_module_fields')
                             ->where('id','=',$_POST['field_id'][$i])
                             ->update($newModuleFields);
            //echo '------- recid: '.$dznrMdlFldid.' ------'.'<hr>';
        }
        //dd(count($_POST['field_name']));
        return redirect('backend/designer')->with('msg_success','Module info is updated successfuly');;
        // return view('designer/dznr/ajax_module_fields',$data);                    

    }

 



}
