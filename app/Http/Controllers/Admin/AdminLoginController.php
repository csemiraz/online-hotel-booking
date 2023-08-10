<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        /* $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ]; */

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect()->route('admin_home');
        } else {
            return redirect()->route('admin_login')->with('error', 'Email and Password not match!');
        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function forget_password()
    {
        return view('admin.forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if(!$admin) {
            return redirect()->back()->with('error', 'Email not match!');
        }

        $token = hash('sha256', time());
        $admin->token = $token;
        $admin->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br />';
        $message .= '<a href="'.$reset_link.'">Click Here</a>';

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        return redirect()->route('admin_login')->with('success', 'Please check your email address.');
        
    }

    public function reset_password($token, $email)
    {
        $admin = Admin::where('token', $token)->where('email', $email)->first();
        if(!$admin) {
            return redirect()->route('admin_login');
        }

        return view('admin.reset-password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $admin = Admin::where('token', $request->token)->where('email',$request->email)->first();
        
        $admin->password = Hash::make($request->password);
        $admin->token = '';
        $admin->update();

        return redirect()->route('admin_login')->with('success', 'Password is reset successfully.');
    }


}
