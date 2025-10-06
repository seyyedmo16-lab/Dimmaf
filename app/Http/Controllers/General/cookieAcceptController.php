<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class cookieAcceptController extends Controller
{
    
    public function store(Request $request){

        if($request['accept'] == 'yes'){
            Cookie::queue('accept', 'yes', 60 * 24 * 365); // 1 year
        }
        return redirect()->back();
    }
}
