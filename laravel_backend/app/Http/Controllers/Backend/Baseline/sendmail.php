<?php

namespace App\Http\Controllers\Backend\Baseline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class sendmail extends Controller
{
    public function index(){
        $params = 'toemail=iqbal.nadem@gmail.com&title=Vehicle is approved&email=your submitted vehicle informatio is approved for auction';
        $resp = Http::get('https://thetatech.org/demo/cartmycar/home/mail?'.$params);

        // $resp = Http::post('https://thetatech.org/demo/cartmycar/home/mail', [
        //     'fullname' => 'Nadeem Iqbal',
        //     'toemail' => 'itspingo@yahoo.com',
        //     'title' => 'vehicl is approved',
        //     'email' => 'your submitted vehicle informatio is approved for auction'
        // ]);

        return $resp;

        // $resp = Http::post('https://reqres.in/api/users?page=1');
        //dd($resp);
        
        // https://thetatech.org/demo/cartmycar/home/email?toemail=iqbal.nadem@gmail.com&title=Vehicle is approved&email=your submitted vehicle informatio is approved for auction

    }


   


}
