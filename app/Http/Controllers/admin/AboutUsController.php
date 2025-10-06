<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function show()
    {
        return view('panel.admin.aboutUs.show')->with([
            'about'=> AboutUs::find(1),
        ]);
    }

    public function update(Request $request)
    {
        $about=AboutUs::find(1);
        $request->validate([
            'body_en'=>'nullable|string|required_with:title_fa',
            'body_fa'=>'nullable|string|required_with:title_en',
            'image'=>"mimes:jpg,bmp,png,jgeg|:max:4096"
        ]);
        if ($request->has('image')) {
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/about-us'), $image_name);
            $image_name = 'images/about-us/' . $image_name;
        } else {
            $image_name = $about->image_name;
        }
        
        $about->update([
         'body_en'=>$request->body_en,
         'body_fa'=>$request->body_fa,
         'image'=>$image_name
        ]);
        return redirect()->back()->with('success', 'your about-us page updated susseccfully');
    }
}
