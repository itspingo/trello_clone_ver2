<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users_model;

// use Carbon\Carbon;

class Users extends Controller
{
   
    public function __construct()
    {
        //$this->middleware('auth');
       
    }


    public function index()
    {
        $data['page_title']="Users";
       
        return view('frontend/users',$data);
    }
   
}
