<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Team extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
       
    }


    public function index()
    {
        $data['page_title']="Team";
    
        // dd( session()->get('sess_settings')->site_name);
        return view('frontend/team',$data);
    }
   
}
