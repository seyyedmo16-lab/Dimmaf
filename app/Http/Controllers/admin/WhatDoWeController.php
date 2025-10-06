<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WhatDoWe;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class WhatDoWeController extends Controller
{
    public function index()
    {
        return view('panel.admin.whatDo.index')->with([
            'whatDoes' => WhatDoWe::all(),
        ]);
    }

    public function edit(WhatDoWe $whatDoWe){
        
        return view('panel.admin.whatDo.edit')->with([
            'whatDo' => $whatDoWe,
        ]);
    }

    public function update(Request $request,WhatDoWe $whatDoWe){
        $data=$request->validate([
           'title_en'=>'nullable|max:250|string|required_with:title_fa',
           'title_fa'=>'nullable|max:250|string|required_with:title_en',
           'description_en'=>'nullable|string|required_with:description_fa',
           'description_fa'=>'nullable|string|required_with:description_en',
           'body_en'=>'string|nullable|required_with:body_fa',
           'body_fa'=>'string|nullable|required_with:body_en'
       ]);
       
       if($data['title_en']){
           $data['slug']=SlugService::createSlug(WhatDoWe::class,'slug',$data['title_en']);
       }
       
       $whatDoWe->update($data);
       return redirect()->route('admin.whatDo.index')->with('success', "your what do we offer's item updated susseccfully");
    }
}
