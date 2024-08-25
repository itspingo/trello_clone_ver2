<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\button_actions_model;


/* ******************************************************
    This file is generated by SNOOBIX on Jun 01, 2024
    Please visit snoobix.com for more details
****************************************************** */


class Button_Actions extends Controller
{
    public function __construct()
    {
        //if (!Auth::check()) return 'access_denied';
    }
   
    public function index()
    { 
        $data['module_title'] = 'Button Actions';
		$data['rows'] = button_actions_model::orderBy('id', 'desc')->get();
		return view("backend/button_actions_list", $data);
	
    }


    public function create()
    {
        $data['module_title'] = 'Button Actions';
       //$data['row'] = [];
       $data['submit_path'] = 'store';
       $data['module_name'] = 'Button Actions';
       return view("backend/button_actions_addedit", $data);       
    }

   
    public function store(Request $request)
    {
         $data['module_title'] = 'Button Actions';
        /* $request->validate([
            [[validateFieldsArray]]
        ]); */

        /* $record = [
			[[fieldsArray]]
		];
		$iscreated = button_actions_model::create($record); */

        $record = $request->all();
        
        
        
        $savedid = button_actions_model::create($record)->id;
		if($savedid){
			 //return view("backend/button_actions_addedit")->with('flash_success', "Record is saved successfuly");
             return redirect('backend/button_actions/create')->with('flash_success', "Record is saved successfuly");
		}else{
			$data['row'] = $request->all();
			return view("backend/button_actions_addedit", $data)->with('flash_failure', "Record is NOT saved successfuly");
		}
    }

    
    public function show()
    {
        //
    }

    
    public function edit($id)
    {
         $data['module_title'] = 'Button Actions';
        $data['submit_path'] = 'update';
        $recCond = [
			'id' => str2id($id)
		];
		$data['row'] = button_actions_model::where($recCond)->first();
		return view("backend/button_actions_addedit", $data);
    }

   
    public function update(Request $request)
    {
		 $data['module_title'] = 'Button Actions';
        $id = $request->post('id');
        $id = str2id($id);
        $vbutton_actions_model = button_actions_model::find($id);
        
         $record = $request->all();
         
        
        $isaved = $vbutton_actions_model->fill($record)->save();  //this will save record with all fillable items

        if($isaved){
			//return view("backend/button_actions_addedit")->with('flash_success', "Record is updated successfuly");
            return redirect('backend/button_actions')->with('flash_success', "Record is updated successfuly");
		}else{

			//$data['postData'] = $record;
             $data['submit_path'] = 'update';
             $recCond = [
                'id' => $id,
            ];
            $data['row'] = button_actions_model::where($recCond)->first();
			return view("backend/button_actions_addedit", $data)->with('flash_failure', "Record is NOT updated successfuly");
		}		
    }

   
    public function destroy(Request $request)
    {
        $id = $request->post('delid');
        $id = str2id($id);
        $vbutton_actions_model = button_actions_model::find($id);
        $isdeleted = $vbutton_actions_model->delete();
        if($isdeleted ){
            return redirect()->route('backend.button_actions')->with('flash_success','Record is deleted successfuly');
        }else{
            return redirect()->route('backend.button_actions')->with('flash_failure','Record is not deleted, try again later');
        }
    }
}
