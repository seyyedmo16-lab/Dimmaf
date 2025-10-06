<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class cookieLanguageController extends Controller
{
    public function store(Request $request, $lang){
        if($lang == 'fa' || $lang == 'en'){
            // Set session lang
            session()->put('lang', $lang);
        }
        
        // Return to previous page or home if no referer
        return redirect()->back();
    }
    public function show(Request $request){
        if ($request->cookie('lang') == 'fa'){
            return redirect()->route('home');
        }elseif($request->cookie('lang') == 'en'){
            return redirect()->route('home');
        }else{ //default is english
            return redirect()->route('home');
        }
    }
}
