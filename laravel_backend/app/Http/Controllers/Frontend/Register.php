<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Register extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        $data['page_title']="Register";
    
        // dd( session()->get('sess_settings')->site_name);
        return view('frontend/register',$data);
    }
   
}
