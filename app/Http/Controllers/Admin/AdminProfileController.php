<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function edit_profile()
    {
        $admin = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.edit-profile', compact('admin'));
    }

    public function edit_profile_submit(Request $request)
    {
        $admin = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        
        if($request->password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $admin->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            $ext = $request->file('photo')->extension();
            $final_name = 'admin'.'.'.$ext;
            if(file_exists(public_path('images/'.$admin->photo))) {
                unlink(public_path('images/'.$admin->photo));
            }
            $request->file('photo')->move(public_path('images/'), $final_name);
            $admin->photo = $final_name;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->back()->with('success', 'Profile info updated successfully.');
    }

}
