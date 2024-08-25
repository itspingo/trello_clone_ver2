<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use Illuminate\Support\Facades\DB;

class designer_add extends Controller
{
    public function index(){
        $dbname = DB::connection()->getDatabaseName();
        // dd($dbname);
        // DB::enableQueryLog();
        $data['dbtables'] = DB::table('information_schema.tables')
                            ->selectRaw('table_name')
                            ->where('table_schema', '=', $dbname)
                            ->orderBy('table_name')
                            ->get();
        // dd(DB::getQueryLog());
       $data['curnt_table_columns'] = array();
      
       $data['menu_headings'] = DB::table('dznr_modules')
                                    ->selectRaw(' * ')
                                    ->where('active', '=', '1')
                                    ->where('table_name', '=', '')
                                    //->orderBy('menu_seq')
                                    ->get();

        $data['parent_menues'] = DB::table('dznr_modules')
                                    ->selectRaw(' * ')
                                    ->where('active', '1')
                                    ->where('parent_module', '0')
                                    //->orderBy('menu_seq')
                                    ->get();

        //dd($data);

       
        //return view('designer/designer/addedit',$data);
        return view('designer/dznr/addedit',$data); 
    }

    /*
    public function show_sidepanel(){
        return view('backend/designer/designer/sidepanel');
    }

    public function ajax_item_properties(){
        $itemtype = $_GET['itemtype'];
	    $vdivid = $_GET['divid'];
        //echo 'item type: '.$itemtype.' , divid: '.$vdivid;
        $data['itemtype'] = $itemtype;
        $data['vdivid'] = $vdivid;
        return view('designer/designer/ajax_item_properties',$data);
    }
    */

    public function ajax_module_fields(){
        $dbname = DB::connection()->getDatabaseName();
        $tblname = $_GET['tblnam'];

        //  DB::enableQueryLog();
        $data['curnt_table_columns'] = DB::table('information_schema.columns')
                            ->selectRaw('*')
                            ->where('table_schema', '=', $dbname )
                            ->where('table_name', '=',  $tblname )
                            ->whereNotIn('column_name', ['created_at','updated_at','deleted_at','base_lang','client_id','deleted_for'])
                            ->orderBy('ORDINAL_POSITION')
                            ->get();
        // dd(DB::getQueryLog());
        $data['dbtables'] = DB::table('information_schema.tables')
                            ->selectRaw('table_name')
                            ->where('table_schema', '=', $dbname)
                            // ->orderBy('table_name')
                            ->get();

        return view('designer/dznr/ajax_module_fields',$data);                    

    }

    public function ajax_table_fields(){
        $dbname = DB::connection()->getDatabaseName();
        $tblname = $_GET['tblnam'];
        $data['recno'] = $_GET['rno'];
        $data['list_table_columns'] = DB::table('information_schema.columns')
                            ->selectRaw('*')
                            ->where('table_schema', '=', $dbname )
                            ->where('table_name', '=',  $tblname )
                            ->get();
        return view('designer/dznr/ajax_listable_fields',$data);            

    }

    public function save(){
        //$dbname = DB::connection()->getDatabaseName();
        $newModuleInfo = array(
            'module_name' => $_POST['module_name'],
            'module_type' => $_POST['module_type'],
            'module_icon' => $_POST['module_icon'],
            'parent_module' => $_POST['parent_module'],
            'is_hidden' => $_POST['is_hidden'],
            'table_name' => $_POST['module_table']
        );
        $dznrMdlid = DB::table('dznr_modules')
                         ->insertGetId($newModuleInfo);

        $dznrMdlFldid='';
        // dd($_POST);
        // dd(count($_POST['field_name']));
        for($i=0; $i<count($_POST['field_name']); $i++){
            // if($i > 99){
            $newModuleFields = array(
                'dznr_moduleid' => $dznrMdlid,
                'field_name' => $_POST['field_name'][$i],
                'field_label' => $_POST['field_label'][$i],
                'field_type' => $_POST['field_type'][$i],
                'isrequired' => $_POST['isrequired'][$i],
                'display_seq' => $_POST['display_seq'][$i],
                // 'input_length' => ($_POST['input_length'][$i])?$_POST['input_length'][$i]:0,
                'listmodulename' => $_POST['listmodulename'][$i],
                'listmoduleitem' => $_POST['listmoduleitem'][$i],
                'staticlist' => $_POST['staticlist'][$i],
                'onlistpag' => $_POST['onlistpag'][$i]
            );
            // print_r($newModuleFields);
            
             $dznrMdlFldid = DB::table('dznr_module_fields')
                             ->insertGetId($newModuleFields);
            
            //if($dznrMdlFldid){
                // post_insert_functions(['id'=>$dznrMdlFldid]);
            //}
            // }
        }
        // dd(count($_POST['field_name']));
        //return redirect('/backend/designer_add')->with('msg_success','Module info is saved successfuly');;
        // return view('designer/dznr/ajax_module_fields',$data);                    
        
        $this->generate($dznrMdlid);
        return redirect('/backend/designer_add')->with('msg_success','Module info is saved successfuly');
    }

	 public function generate($vdznrMdlid){
        //$dbname = DB::connection()->getDatabaseName();
        
        $this->make_list_page($vdznrMdlid);
        $this->make_addedit_form($vdznrMdlid);
        $this->make_model($vdznrMdlid);
        $this->make_controller( $vdznrMdlid);
        $this->add_route($vdznrMdlid);
       
        //dd(count($_POST['field_name']));
        //return redirect('/backend/designer_add')->with('msg_success','Module info is saved successfuly');
        // return view('designer/dznr/ajax_module_fields',$data);                    
        return true;
    }
	
    public function dznr_delete(){
        $mid = $_GET['mid'];
        $isdel = DB::table('dznr_module_fields')
                         ->where('dznr_moduleid', '=', $mid)
                         ->delete();

        if($isdel){
            $isdel = DB::table('dznr_modules')
                         ->where('id', '=', $mid)
                         ->delete();  
        }
       return redirect('/backend/designer')->with('msg_success','Record is deleted successfuly');;
        
    }


    public function make_list_page($dznrMdlid){
        //dd('vdznrMdlid: '.$dznrMdlid);
        $ardznrMdl = DB::table('dznr_modules')
                    ->where('id', '=', $dznrMdlid)
                    ->get();
        $dznrMdl =  $ardznrMdl[0];
       

        $dznrMdlFlds = DB::table('dznr_module_fields')
                    ->where('dznr_moduleid', '=', $dznrMdlid)
                    ->orderBy('display_seq','asc')
                    ->get();
        
        $table_data_heading = '';
        $table_data_row = '';
        for($i=0; $i<count($dznrMdlFlds); $i++){
            if($dznrMdlFlds[$i]->onlistpag == 'Y'){
                if($dznrMdlFlds[$i]->field_type == 'list_single' && $dznrMdlFlds[$i]->staticlist == ''){
                    $table_data_heading .= '<th>'.$dznrMdlFlds[$i]->field_label.'</th>';
                    $table_data_row .= '<td>{{getfieldval("$row->'.$dznrMdlFlds[$i]->field_name.'","'.$dznrMdlFlds[$i]->listmodulename.'","'.$dznrMdlFlds[$i]->listmoduleitem.'")}}</td>';
                }else{

                    $table_data_heading .= '<th>'.$dznrMdlFlds[$i]->field_label.'</th>';
                    $table_data_row .= '<td> {{ $row->'.$dznrMdlFlds[$i]->field_name.' }}</td>';
                }
            }
        }

        $search_form_data = '';
        for($i=0; $i<count($dznrMdlFlds); $i++){
            if(
                $dznrMdlFlds[$i]->field_type != 'single_image' &&
                $dznrMdlFlds[$i]->field_type != 'muliti_images' &&
                $dznrMdlFlds[$i]->field_type != 'hidden_input' &&
                $dznrMdlFlds[$i]->field_type != 'text_area' &&
                $dznrMdlFlds[$i]->field_type != 'password_input' &&
                $dznrMdlFlds[$i]->field_type != 'single_file' &&
                $dznrMdlFlds[$i]->field_type != 'multi_files' 
            
            ){
                $search_form_data .= $this->get_field_template($dznrMdlFlds[$i]);
                $search_form_data .= "\n\r";
            }
        }

               
        // $fh_list = fopen(asset('templates/viewListTemplate.txt'), 'r');
        // $fh_template = fread($fh_list, 1024*1024);
        // fclose($fh_list);
        
        $moduleRoute = strtolower(str_replace(' ','_',$dznrMdl->module_name));
        $list_filename = 'public/assets/templates/viewListTemplate.txt';
        $list_contents = file_get_contents(base_path($list_filename), true);
        
        //$contents = File::get($filename);
        //$fh_template = file_get_contents(url('assets/templates/viewListTemplate.txt'));
        //dd($contents);
        //dd($dznrMdl);
        $list_contents = str_replace('[[tableFieldsHeading]]',$table_data_heading, $list_contents);
        $list_contents = str_replace('[[tableFieldsData]]',$table_data_row, $list_contents);
        $list_contents = str_replace('[[formSearchFields]]',$search_form_data, $list_contents);
        $list_contents = str_replace('[[moduleRoute]]', $moduleRoute, $list_contents);

       // $fh_list = fopen('./views/'.$dznrMdl->module_name.'.balde.php', 'w');
        $trgtFilename = 'resources/views/backend/'.strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_list.blade.php';
        if(!file_put_contents(base_path($trgtFilename), $list_contents, true)){
            echo "file write error";
        }
    }

    public function make_addedit_form($dznrMdlid){
        
        $ardznrMdl = DB::table('dznr_modules')
                    ->where('id', '=', $dznrMdlid)
                    ->Get();
        $dznrMdl =  $ardznrMdl[0];

        $dznrMdlFlds = DB::table('dznr_module_fields')
                    ->where('dznr_moduleid', '=', $dznrMdlid)
                    ->orderBy('id')
                    ->Get();

        $form_data = '';
        for($i=0; $i<count($dznrMdlFlds); $i++){
            // if($dznrMdlFlds[$i]->onlistpag == 'Y'){
                $form_data .= $this->get_field_template($dznrMdlFlds[$i]);
                $form_data .= "\n\r";
            // }
        }
        

        $moduleRoute = strtolower(str_replace(' ','_',$dznrMdl->module_name));
        $add_filename = 'public/assets/templates/addEditFormTemplate.txt';
        $addform_contents = file_get_contents(base_path($add_filename), true);

        $addform_contents = str_replace('[[moduleRoute]]', $moduleRoute, $addform_contents);
        $addform_contents = str_replace('[[formInputFields]]', $form_data, $addform_contents);
        $addform_contents = str_replace('[[currentDate]]',date('M d, Y'), $addform_contents);

        $trgt_add_Filename = 'resources/views/backend/'.strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_addedit.blade.php';
        if(!file_put_contents(base_path($trgt_add_Filename), $addform_contents, true)){
            echo "add file write error";
        }

    }


    public function make_controller($dznrMdlid){
        
        $dznrMdl = DB::table('dznr_modules')
                    ->where('id', '=', $dznrMdlid)
                    ->first();
        // $dznrMdl =  $ardznrMdl[0];

        $dznrMdlFlds = DB::table('dznr_module_fields')
                    ->where('dznr_moduleid', '=', $dznrMdlid)
                    ->orderBy('display_seq','asc')
                    ->Get();

        // dd($dznrMdlFlds);

        $singleImgFileUpload = '';  $multiImgFileUpload = ''; $multiChoiceList = '';
        foreach($dznrMdlFlds as $dznrMdlFld){
            if($dznrMdlFld->field_type == 'single_image'){
                $singleImgFileUpload .= "if ($"."request->hasFile('".$dznrMdlFld->field_name."')) {"."\n";
                $singleImgFileUpload .= "$"."imgFile = $"."request->file('".$dznrMdlFld->field_name."')->store('public');"."\n";
                $singleImgFileUpload .= "$"."record['".$dznrMdlFld->field_name."'] = $"."imgFile;"."\n";
                $singleImgFileUpload .= "}"."\n";
            }elseif($dznrMdlFld->field_type == 'muliti_images'){
                $multiImgFileUpload .= "if ($"."request->hasFile('".$dznrMdlFld->field_name."')) {"."\n";
                $multiImgFileUpload .= "$"."imagePaths = [];"."\n";
                $multiImgFileUpload .= "foreach ($"."request->file('".$dznrMdlFld->field_name."') as $"."image) {"."\n";
                $multiImgFileUpload .= "$"."imagePath = $"."image->store('public');"."\n";
                $multiImgFileUpload .= "$"."imagePaths[] = $"."imagePath;"."\n";
                $multiImgFileUpload .= "}"."\n";
                $multiImgFileUpload .= "$"."record['".$dznrMdlFld->field_name."'] = implode(',', $"."imagePaths);"."\n";
                $multiImgFileUpload .= "}"."\n";
            }elseif($dznrMdlFld->field_type == 'list_multiple'){
                $multiChoiceList .= "$"."record['".$dznrMdlFld->field_name."'] = implode(',',$"."request->post('".$dznrMdlFld->field_name."'));";
            }
        }
        
        //dd($opt_data);

        $controller_name = ucfirst(str_replace(' ','_',$dznrMdl->module_name));
        $controller_name_lc = strtolower(str_replace(' ','_',$dznrMdl->module_name));
        $controller_filename = 'public/assets/templates/controllerTemplate.txt';
        $file_contents = file_get_contents(base_path($controller_filename), true);
        $file_contents = str_replace('[[useModelLine]]', 'use App\\Models\\'.strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_model;', $file_contents);
        $file_contents = str_replace('[[ControllerName]]',$controller_name, $file_contents);
        $file_contents = str_replace('[[lcControllerName]]',$controller_name_lc, $file_contents);
        $file_contents = str_replace('[[moduleName]]', $dznrMdl->module_name, $file_contents);
        $file_contents = str_replace('[[singleImageFileUpload]]', $singleImgFileUpload, $file_contents);
        $file_contents = str_replace('[[multipleImagesFilesUpload]]', $multiImgFileUpload, $file_contents);
        $file_contents = str_replace('[[multiChoiceList]]', $multiChoiceList, $file_contents);
        //$file_contents = str_replace('[[optListItems]]', $opt_data, $file_contents);
        $file_contents = str_replace('[[currentDate]]',date('M d, Y'), $file_contents);
        $file_contents = str_replace('[[ModelName]]',strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_model', $file_contents);
        $file_contents = str_replace('[[viewListName]]',strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_list', $file_contents);
        $file_contents = str_replace('[[viewFormName]]',strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_addedit', $file_contents);
        //$file_contents = str_replace('[[formInputFields]]', $form_data, $file_contents);

        $trgt_Filename = 'app/Http/Controllers/Backend/'.$controller_name.'.php';
        if(!file_put_contents(base_path($trgt_Filename), $file_contents, true)){
            echo "add file write error";
        }

    }

/*
    public function make_add_form($dznrMdlid){
        
        $ardznrMdl = DB::table('dznr_modules')
                    ->where('id', '=', $dznrMdlid)
                    ->Get();
        $dznrMdl =  $ardznrMdl[0];

        $dznrMdlFlds = DB::table('dznr_module_fields')
                    ->where('dznr_moduleid', '=', $dznrMdlid)
                    ->Get();

        $form_data = '';
        for($i=0; $i<count($dznrMdlFlds); $i++){
            if($dznrMdlFlds[$i]->onlistpag == 'Y'){
                $vfldName = 
                $form_data .= $this->get_field_template($dznrMdlFlds[$i]);
                $form_data .= "\n\r";
            }
        }
        

        $add_filename = 'public/assets/templates/addEditFormTemplate.txt';
        $addform_contents = file_get_contents(base_path($add_filename), true);

        $addform_contents = str_replace('[[controllerName]]', $dznrMdl->module_name, $addform_contents);
        $addform_contents = str_replace('[[formInputFields]]', $form_data, $addform_contents);

        $trgt_add_Filename = 'resources/views/backend/'.strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_addedit.blade.php';
        if(!file_put_contents(base_path($trgt_add_Filename), $addform_contents, true)){
            echo "add file write error";
        }

    }

    public function make_edit_form($dznrMdlid){
        $ardznrMdl = DB::table('dznr_modules')
                    ->where('id', '=', $dznrMdlid)
                    ->Get();
        $dznrMdl =  $ardznrMdl[0];

        $dznrMdlFlds = DB::table('dznr_module_fields')
                    ->where('dznr_moduleid', '=', $dznrMdlid)
                    ->Get();

        $form_data = '';
        for($i=0; $i<count($dznrMdlFlds); $i++){
            if($dznrMdlFlds[$i]->onlistpag == 'Y'){
                $form_data .= $this->get_field_template($dznrMdlFlds[$i]);
                $form_data .= "\n\r";
                
            }
        }
        

        $add_filename = 'public/assets/templates/addEditFormTemplate.txt';
        $addform_contents = file_get_contents(base_path($add_filename.'wdata'), true);

        $addform_contents = str_replace('[[controllerName]]', $dznrMdl->module_name, $addform_contents);
        $addform_contents = str_replace('[[formInputFields]]', $form_data, $addform_contents);

        $trgt_add_Filename = 'resources/views/'.$dznrMdl->module_name.'_addedit.blade.php';
        if(!file_put_contents(base_path($trgt_add_Filename), $addform_contents, true)){
            echo "add file write error";
        }
        
    }
*/
   

    public function make_model($dznrMdlid){
        //$dznrMdlid = '40'; //$_GET('mid');
        $dznrMdl = DB::table('dznr_modules')
                        ->where('id', '=', $dznrMdlid)
                        ->first();
        // $dznrMdl =  $ardznrMdl[0];

        $dznrMdlFlds = DB::table('dznr_module_fields')
                ->where('dznr_moduleid', '=', $dznrMdlid)
                ->orderBy('display_seq','asc')
                ->Get();

        //DD($dznrMdlFlds);
        $fillable_fields='';
        for($i=0; $i<count($dznrMdlFlds); $i++){
            if($dznrMdlFlds[$i]->field_name != 'id' && 
            $dznrMdlFlds[$i]->field_name != 'created_at' &&
            $dznrMdlFlds[$i]->field_name != 'updated_at' &&
            $dznrMdlFlds[$i]->field_name != 'deleted_at' &&
            $dznrMdlFlds[$i]->field_name != 'deleted_for' 
            ){
                //$form_data .= $this->get_field_template($dznrMdlFlds[$i]); 
                $fillable_fields .= "'".$dznrMdlFlds[$i]->field_name."',";
            }
        }


        $model_filename = 'public/assets/templates/modelTemplate.txt';
        $modelpage_contents = file_get_contents(base_path($model_filename), true);

        $modelpage_contents = str_replace('[[tableName]]', $dznrMdl->table_name, $modelpage_contents);
        $modelpage_contents = str_replace('[[fillableFields]]', $fillable_fields, $modelpage_contents);
        $modelpage_contents = str_replace('[[ModelName]]',strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_model', $modelpage_contents);

        $model_name = str_replace(' ','_', strtoupper(substr($dznrMdl->module_name,0,1)).strtolower(substr($dznrMdl->module_name,1)));
        
        $trgt_FilePath = 'app/Models/'.strtolower(str_replace(' ','_',$dznrMdl->module_name)).'_model.php';
        if(!file_put_contents(base_path($trgt_FilePath), $modelpage_contents, true)){
            echo "file write error";
        }
    }

    
    public function add_route($dznrMdlid){
        //$dznrMdlid = '40'; //$_GET('mid');
        $dznrMdl = DB::table('dznr_modules')
                        ->where('id', '=', $dznrMdlid)
                        ->first();
        // $dznrMdl =  $ardznrMdl[0];
        $controler_name = ucfirst(str_replace(' ','_',$dznrMdl->module_name));
        $controler_name_lc = strtolower(str_replace(' ','_',$dznrMdl->module_name));

        $route_filename = 'routes/web.php';
        $routefile_contents = file_get_contents(base_path($route_filename), true);

        $routefile_contents = str_replace("/*[[useControllerLine]]*/", "use App\\Http\\Controllers\\Backend\\".$controler_name.";"."\n"." /*[[useControllerLine]]*/ ", $routefile_contents);
        $routefile_contents = str_replace("/*[[routeResouceLine]]*/",         
        "Route::get('backend/".$controler_name_lc."', [".$controler_name."::class, 'index'])->middleware(['auth'])->name('backend.".$controler_name_lc."');"."\n".
        "Route::get('backend/".$controler_name_lc."/create', [".$controler_name."::class, 'create'])->middleware(['auth'])->name('backend.".$controler_name_lc.".create');"."\n".
        "Route::post('backend/".$controler_name_lc."', [".$controler_name."::class, 'store'])->middleware(['auth'])->name('backend.".$controler_name_lc.".store');"."\n".
        "Route::get('backend/".$controler_name_lc."/{id}', [".$controler_name."::class, 'show'])->middleware(['auth'])->name('backend.".$controler_name_lc.".show');"."\n".
        "Route::get('backend/".$controler_name_lc."/{id}/edit', [".$controler_name."::class, 'edit'])->middleware(['auth'])->name('backend.".$controler_name_lc.".edit');"."\n".
        "Route::post('backend/".$controler_name_lc."/update', [".$controler_name."::class, 'update'])->middleware(['auth'])->name('backend.".$controler_name_lc.".update');"."\n".
        "Route::post('backend/".$controler_name_lc."/delete', [".$controler_name."::class, 'destroy'])->middleware(['auth'])->name('backend.".$controler_name_lc.".delete');"."\n\r".
        "/*[[routeResouceLine]]*/", $routefile_contents);
        $trgt_Filename = 'routes/web.php';
        if(!file_put_contents(base_path($trgt_Filename), $routefile_contents, true)){
            echo "add file write error";
        }

        $dznrMdlCtrl = DB::table('dznr_modules')
                            ->where('id', '=', $dznrMdlid)
                            ->update(['controller_file'=>strtolower(str_replace(' ','_',$dznrMdl->module_name))]);
        return true;                    
    }







    public function get_field_template($fieldInfo){

        if($fieldInfo->field_type == 'list_single' && $fieldInfo->staticlist != ''){
            // dd($fieldInfo);
            $field_template_name = 'public/assets/templates/static_list_single_wvalue.txt';
            $field_template = file_get_contents(base_path($field_template_name), true);

        }else if($fieldInfo->field_type == 'list_multiple' && $fieldInfo->staticlist != ''){
            // dd($fieldInfo);
            $field_template_name = 'public/assets/templates/static_list_multiple_wvalue.txt';
            $field_template = file_get_contents(base_path($field_template_name), true);

        }else if($fieldInfo->field_type == 'radio_button' && $fieldInfo->staticlist != ''){
            // dd($fieldInfo);
            $field_template_name = 'public/assets/templates/static_radio_button_wvalue.txt';
            $field_template = file_get_contents(base_path($field_template_name), true);

        }else{

            $field_template_name = 'public/assets/templates/'.$fieldInfo->field_type.'_wvalue.txt';
            $field_template = file_get_contents(base_path($field_template_name), true);
        }

        $field_template = str_replace('[[staticList]]', $fieldInfo->staticlist, $field_template);
        $field_template = str_replace('[[field_label]]', $fieldInfo->field_label, $field_template);
        $field_template = str_replace('[[field_name]]', $fieldInfo->field_name, $field_template);

        $field_template = str_replace('[[ref_table_name]]', $fieldInfo->listmodulename, $field_template);
        $field_template = str_replace('[[ref_column_name]]', $fieldInfo->listmoduleitem, $field_template);
    
        //$field_template = str_replace('[[input_length]]', $fieldInfo->input_length, $field_template);

        if($fieldInfo->isrequired == 'Y'){
            $field_template = str_replace('[[isrequired]]', 'required', $field_template);
        }else{
            $field_template = str_replace('[[isrequired]]', '', $field_template);
        }
        
        return $field_template;
    }

}
