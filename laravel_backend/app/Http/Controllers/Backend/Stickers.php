<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\stickers_model;


/* ******************************************************
    This file is generated by SNOOBIX on May 21, 2024
    Please visit snoobix.com for more details
****************************************************** */


class Stickers extends Controller
{
    public function __construct()
    {
        //if (!Auth::check()) return 'access_denied';
    }
   
    public function index()
    { 
        $data['module_title'] = 'Stickers';
		$data['rows'] = stickers_model::orderBy('id', 'desc')->get();
		return view("backend/stickers_list", $data);
	
    }


    public function create()
    {
        $data['module_title'] = 'Stickers';
       //$data['row'] = [];
       $data['submit_path'] = 'store';
       $data['module_name'] = 'Stickers';
       return view("backend/stickers_addedit", $data);       
    }

   
    public function store(Request $request)
    {
         $data['module_title'] = 'Stickers';
        /* $request->validate([
            [[validateFieldsArray]]
        ]); */

        /* $record = [
			[[fieldsArray]]
		];
		$iscreated = stickers_model::create($record); */

        $record = $request->all();
        if ($request->hasFile('main_image')) {$imgFile = $request->file('main_image')->store('public');$record['main_image'] = $imgFile;}
        if ($request->hasFile('more_images')) {$imagePaths = [];foreach ($request->file('more_images') as $image) {$imagePath = $image->store('public');$imagePaths[] = $imagePath;}$record['more_images'] = implode(',', $imagePaths);}
        $savedid = stickers_model::create($record)->id;
		if($savedid){
			 //return view("backend/stickers_addedit")->with('flash_success', "Record is saved successfuly");
             return redirect('backend/stickers/create')->with('flash_success', "Record is saved successfuly");
		}else{
			$data['row'] = $request->all();
			return view("backend/stickers_addedit", $data)->with('flash_failure', "Record is NOT saved successfuly");
		}
    }

    
    public function show()
    {
        //
    }

    
    public function edit($id)
    {
         $data['module_title'] = 'Stickers';
        $data['submit_path'] = 'update';
        $recCond = [
			'id' => str2id($id)
		];
		$data['row'] = stickers_model::where($recCond)->first();
		return view("backend/stickers_addedit", $data);
    }

   
    public function update(Request $request)
    {
		 $data['module_title'] = 'Stickers';
        $id = $request->post('id');
        $id = str2id($id);
        $vstickers_model = stickers_model::find($id);
        
         $record = $request->all();
         if ($request->hasFile('main_image')) {$imgFile = $request->file('main_image')->store('public');$record['main_image'] = $imgFile;}
        if ($request->hasFile('more_images')) {$imagePaths = [];foreach ($request->file('more_images') as $image) {$imagePath = $image->store('public');$imagePaths[] = $imagePath;}$record['more_images'] = implode(',', $imagePaths);}
        $isaved = $vstickers_model->fill($record)->save();  //this will save record with all fillable items

        if($isaved){
			//return view("backend/stickers_addedit")->with('flash_success', "Record is updated successfuly");
            return redirect('backend/stickers')->with('flash_success', "Record is updated successfuly");
		}else{

			//$data['postData'] = $record;
             $data['submit_path'] = 'update';
             $recCond = [
                'id' => $id,
            ];
            $data['row'] = stickers_model::where($recCond)->first();
			return view("backend/stickers_addedit", $data)->with('flash_failure', "Record is NOT updated successfuly");
		}		
    }

   
    public function destroy(Request $request)
    {
        $id = $request->post('delid');
        $id = str2id($id);
        $vstickers_model = stickers_model::find($id);
        $isdeleted = $vstickers_model->delete();
        if($isdeleted ){
            return redirect()->route('backend.stickers')->with('flash_success','Record is deleted successfuly');
        }else{
            return redirect()->route('backend.stickers')->with('flash_failure','Record is not deleted, try again later');
        }
    }
}
