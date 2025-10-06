<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('panel.admin.profile.index')->with([
            'user' => User::find(1)
        ]);
    }

    public function update(ProfileAdminRequest $request)
    {
        User::find(1)->update([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return view('panel.admin.profile.verify')->with([
            'page' => '/admin/index',
        ]);
    }

    public function verify(ProfileAdminRequest $request)
    {
      
        if($request->email == User::find(1)->email && Hash::check($request->password , User::find(1)->password))
        {
            return view('panel.admin.profile.create');
        }else{
            return redirect()->back()->with('success' , 'wrong email or password');
        }
    }
}
