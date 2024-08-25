<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\envelop_inside_images_model;


/* ******************************************************
    This file is generated by SNOOBIX on May 16, 2024
    Please visit snoobix.com for more details
****************************************************** */


class Envelop_inside_images extends Controller
{
    public function __construct()
    {
        //if (!Auth::check()) return 'access_denied';
    }
   
    public function index()
    { 
        $data['module_title'] = 'Envelop inside images';
		$data['rows'] = envelop_inside_images_model::orderBy('id', 'desc')->get();
		return view("backend/envelop_inside_images_list", $data);
	
    }


    public function create()
    {
        $data['module_title'] = 'Envelop inside images';
       //$data['row'] = [];
       $data['submit_path'] = 'store';
       $data['module_name'] = 'Envelop inside images';
       return view("backend/envelop_inside_images_addedit", $data);       
    }

   
    public function store(Request $request)
    {
         $data['module_title'] = 'Envelop inside images';
        /* $request->validate([
            [[validateFieldsArray]]
        ]); */

        /* $record = [
			[[fieldsArray]]
		];
		$iscreated = envelop_inside_images_model::create($record); */

        $record = $request->all();
        if ($request->hasFile('main_image')) {$imgFile = $request->file('main_image')->store('public');$record['main_image'] = $imgFile;}
        if ($request->hasFile('more_images')) {$imagePaths = [];foreach ($request->file('more_images') as $image) {$imagePath = $image->store('public');$imagePaths[] = $imagePath;}$record['more_images'] = implode(',', $imagePaths);}
        $savedid = envelop_inside_images_model::create($record)->id;
		if($savedid){
			 //return view("backend/envelop_inside_images_addedit")->with('flash_success', "Record is saved successfuly");
             return redirect('backend/envelop_inside_images/create')->with('flash_success', "Record is saved successfuly");
		}else{
			$data['row'] = $request->all();
			return view("backend/envelop_inside_images_addedit", $data)->with('flash_failure', "Record is NOT saved successfuly");
		}
    }

    
    public function show()
    {
        //
    }

    
    public function edit($id)
    {
         $data['module_title'] = 'Envelop inside images';
        $data['submit_path'] = 'update';
        $recCond = [
			'id' => str2id($id)
		];
		$data['row'] = envelop_inside_images_model::where($recCond)->first();
		return view("backend/envelop_inside_images_addedit", $data);
    }

   
    public function update(Request $request)
    {
		 $data['module_title'] = 'Envelop inside images';
        $id = $request->post('id');
        $id = str2id($id);
        $venvelop_inside_images_model = envelop_inside_images_model::find($id);
        
         $record = $request->all();
         if ($request->hasFile('main_image')) {$imgFile = $request->file('main_image')->store('public');$record['main_image'] = $imgFile;}
        if ($request->hasFile('more_images')) {$imagePaths = [];foreach ($request->file('more_images') as $image) {$imagePath = $image->store('public');$imagePaths[] = $imagePath;}$record['more_images'] = implode(',', $imagePaths);}
        $isaved = $venvelop_inside_images_model->fill($record)->save();  //this will save record with all fillable items

        if($isaved){
			//return view("backend/envelop_inside_images_addedit")->with('flash_success', "Record is updated successfuly");
            return redirect('backend/envelop_inside_images')->with('flash_success', "Record is updated successfuly");
		}else{

			//$data['postData'] = $record;
             $data['submit_path'] = 'update';
             $recCond = [
                'id' => $id,
            ];
            $data['row'] = envelop_inside_images_model::where($recCond)->first();
			return view("backend/envelop_inside_images_addedit", $data)->with('flash_failure', "Record is NOT updated successfuly");
		}		
    }

   
    public function destroy(Request $request)
    {
        $id = $request->post('delid');
        $id = str2id($id);
        $venvelop_inside_images_model = envelop_inside_images_model::find($id);
        $isdeleted = $venvelop_inside_images_model->delete();
        if($isdeleted ){
            return redirect()->route('backend.envelop_inside_images')->with('flash_success','Record is deleted successfuly');
        }else{
            return redirect()->route('backend.envelop_inside_images')->with('flash_failure','Record is not deleted, try again later');
        }
    }
}
