<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\music_files_model;


/* ******************************************************
    This file is generated by SNOOBIX on May 28, 2024
    Please visit snoobix.com for more details
****************************************************** */


class Music_Files extends Controller
{
    public function __construct()
    {
        //if (!Auth::check()) return 'access_denied';
    }
   
    public function index()
    { 
        $data['module_title'] = 'Music Files';
		$data['rows'] = music_files_model::orderBy('id', 'desc')->get();
		return view("backend/music_files_list", $data);
	
    }


    public function create()
    {
        $data['module_title'] = 'Music Files';
       //$data['row'] = [];
       $data['submit_path'] = 'store';
       $data['module_name'] = 'Music Files';
       return view("backend/music_files_addedit", $data);       
    }

   
    public function store(Request $request)
    {
         $data['module_title'] = 'Music Files';
        /* $request->validate([
            [[validateFieldsArray]]
        ]); */

        /* $record = [
			[[fieldsArray]]
		];
		$iscreated = music_files_model::create($record); */

        $record = $request->all();
        if ($request->hasFile('music_file')) {
            $music_file = $request->file('music_file')->store('public');
            $record['music_file'] = $music_file;
        }
        
        $savedid = music_files_model::create($record)->id;
		if($savedid){
			 //return view("backend/music_files_addedit")->with('flash_success', "Record is saved successfuly");
             return redirect('backend/music_files/create')->with('flash_success', "Record is saved successfuly");
		}else{
			$data['row'] = $request->all();
			return view("backend/music_files_addedit", $data)->with('flash_failure', "Record is NOT saved successfuly");
		}
    }

    
    public function show()
    {
        //
    }

    
    public function edit($id)
    {
         $data['module_title'] = 'Music Files';
        $data['submit_path'] = 'update';
        $recCond = [
			'id' => str2id($id)
		];
		$data['row'] = music_files_model::where($recCond)->first();
		return view("backend/music_files_addedit", $data);
    }

   
    public function update(Request $request)
    {
        dd(ini_get('upload_max_filesize'));
		 $data['module_title'] = 'Music Files';
        $id = $request->post('id');
        $id = str2id($id);
        $vmusic_files_model = music_files_model::find($id);
        
         $record = $request->all();
         if ($request->hasFile('music_file')) {


            $file = $request->file('music_file');

            // Debugging information
            dd([
                'is_valid' => $file->isValid(),
                'file_size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
                'error' => $file->getError(),
                'error_message' => $file->getErrorMessage(),
            ]);



            $music_file = $request->file('music_file')->store('public');
            $record['music_file'] = $music_file;
        }
        dd($record);
        $isaved = $vmusic_files_model->fill($record)->save();  //this will save record with all fillable items

        if($isaved){
			//return view("backend/music_files_addedit")->with('flash_success', "Record is updated successfuly");
            return redirect('backend/music_files')->with('flash_success', "Record is updated successfuly");
		}else{

			//$data['postData'] = $record;
             $data['submit_path'] = 'update';
             $recCond = [
                'id' => $id,
            ];
            $data['row'] = music_files_model::where($recCond)->first();
			return view("backend/music_files_addedit", $data)->with('flash_failure', "Record is NOT updated successfuly");
		}		
    }

   
    public function destroy(Request $request)
    {
        $id = $request->post('delid');
        $id = str2id($id);
        $vmusic_files_model = music_files_model::find($id);
        $isdeleted = $vmusic_files_model->delete();
        if($isdeleted ){
            return redirect()->route('backend.music_files')->with('flash_success','Record is deleted successfuly');
        }else{
            return redirect()->route('backend.music_files')->with('flash_failure','Record is not deleted, try again later');
        }
    }
}
