<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Info;
use App\Models\State;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing')->with([
            'states' => State::activeStates(),
            'faqs' => Faq::all(),
            'infoes' => Info::where([['title_en', '<>', null], ['body_en', '<>', null]])->get(),
        ]);
    }
}
