<?php

namespace App\Http\Controllers\Backend\Baseline;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Adminpanel extends Controller
{
    public function index()
    {
        return view('backend/adminpanel');
    }
}
