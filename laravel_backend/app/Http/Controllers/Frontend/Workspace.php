<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\boards_model;

// use Carbon\Carbon;

class Workspace extends Controller
{
   
    public function __construct()
    {
        //$this->middleware('auth');
       
    }


    public function index()
    {
        $data['page_title']="Workspace";
       
        return view('frontend/workspace',$data);
    }
   
}
