<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\WhatDoWe;
use Illuminate\Http\Request;

class WhatDoWeOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.guest.whatdoweoffer.index')->with([
            'whatDoWeOffers' => WhatDoWe::active()->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(WhatDoWe $whatDoWe)
    {
        return view('panel.guest.whatdoweoffer.show')->with([
            'whatDoWe' => $whatDoWe
        ]);
    }
}