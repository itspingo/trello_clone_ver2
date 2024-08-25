<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
// use Illuminate\Support\Facades\DB;



class test_email extends Controller
{
    public function index(){
        $details = array(
                'to_email' => 'nadeem@thetatech.org',
                'title' => 'Mail from cartmycar2.com',
                'body' => 'This is for testing email using laravel'
            );
        
            \Mail::to('nadeem@thetatech.org')->send(new \App\Mail\MyTestMail($details));
            dd("Email is Sent.");

    }

}

?>


