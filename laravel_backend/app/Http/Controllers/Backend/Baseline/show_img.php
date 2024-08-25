<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use Illuminate\Support\Facades\DB;

class show_img extends Controller{
    public function index(){

    $data['img_file'] = 'FFRXOPPC6wciQNr7vpFwMvfetVI1xdUKf8xvkEkz.png'; //$_GET['img']; 
    //$path = storage_public('images/' . $filename);

    return view('backend/designer/view_img',$data);
    }
}