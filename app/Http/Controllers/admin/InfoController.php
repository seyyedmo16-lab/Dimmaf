<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        return view('panel.admin.infoes.index')->with([
            'infoes' => Info::all(),
        ]);
    }

    public function edit(Info $info)
    {
        return view('panel.admin.infoes.edit')->with([
            'info' => $info,
        ]);
    }

    public function update(Request $request, Info $info)
    {
        $request->validate([
            'title_en' => 'nullable|max:250|string|required_with:title_fa',
            'title_fa' => 'nullable|max:250|string|required_with:title_en',
            'body_en' => 'string|nullable|required_with:body_fa',
            'body_fa' => 'string|nullable|required_with:body_en',
            'image' => "mimes:jpg,bmp,png,jgeg|:max:4096"
        ]);
        if ($request->has('image')) {
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/info'), $image_name);
            $image_name = 'images/info/' . $image_name;
        } else {
            $image_name = $info->image_name;
        }
        $info->update([
            'title_en' => $request->title_en,
            'title_fa' => $request->title_fa,
            'body_en' => $request->body_en,
            'body_fa' => $request->body_fa,
            'image' => $image_name
        ]);
        return redirect()->route('admin.info.index')->with('success', 'your info tab updated susseccfully');
    }
}
