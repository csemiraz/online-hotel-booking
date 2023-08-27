<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerProfileController extends Controller
{
    public function edit_profile()
    {
        $customer = Customer::where('email', Auth::guard('customer')->user()->email)->first();
        return view('customer.edit-profile', compact('customer'));
    }

    public function edit_profile_submit(Request $request)
    {
        $customer = Customer::where('email', Auth::guard('customer')->user()->email)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        
        if($request->password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $customer->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            $ext = $request->file('photo')->extension();
            $final_name = 'customer_'.time().'.'.$ext;
            if(file_exists(public_path('images/'.$customer->photo) && !empty($customer->photo))) {
                unlink(public_path('images/'.$customer->photo));
            }
            $request->file('photo')->move(public_path('images/'), $final_name);
            $customer->photo = $final_name;
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->country = $request->country;
        $customer->address = $request->address;
        $customer->state = $request->state;
        $customer->city = $request->city;
        $customer->zip = $request->zip;
        $customer->update();

        return redirect()->back()->with('success', 'Profile info updated successfully.');
    }
}
