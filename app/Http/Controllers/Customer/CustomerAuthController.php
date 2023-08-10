<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ];

        if(Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('customer_home');
        } else {
            return redirect()->route('customer_login')->with('error', 'Email and Password not match!');
        }
    }

    public function signup()
    {
        return view('front.signup');
    }

    public function signup_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $token = hash('sha256', time());
        $password = Hash::make($request->password);
        $verification_link = url('/signup/verify/'.$request->email.'/'.$token);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = $password;
        $customer->token = $token;
        $customer->status = 0;
        $customer->save();

        //Send email
        $subject = 'Customer Sign Up Verification.';
        $message = 'Please click on the link below to complete the sign up process:  <br>';
        $message .= '<a href="'.$verification_link.'">';
        $message .= 'Click the link';
        $message .= '</a>';
        
        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        return redirect()->back()->with('success', 'Please check your email address to complete your sign up.');
    }

    public function signup_verify($email, $token)
    {
        $customer = Customer::where('email', $email)->where('token', $token)->first();

        if($customer) {
            $customer->token = '';
            $customer->status = 1;
            $customer->update();

            return redirect()->route('customer_login')->with('success', 'Your account is verified successfully.');
        } else {
            return redirect()->route('customer_login');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login');
    }

    public function forget_password()
    {
        return view('front.forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $customer = Customer::where('email', $request->email)->first();
        if(!$customer) {
            return redirect()->back()->with('error', 'Email not match!');
        }

        $token = hash('sha256', time());
        $customer->token = $token;
        $customer->update();

        $reset_link = url('/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br />';
        $message .= '<a href="'.$reset_link.'">Click Here</a>';

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        return redirect()->route('customer_login')->with('success', 'Please check your email address.');
        
    }

    public function reset_password($token, $email)
    {
        $customer = Customer::where('token', $token)->where('email', $email)->first();
        if(!$customer) {
            return redirect()->route('customer_login');
        }

        return view('front.reset-password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $customer = Customer::where('token', $request->token)->where('email',$request->email)->first();
        
        $customer->password = Hash::make($request->password);
        $customer->token = '';
        $customer->update();

        return redirect()->route('customer_login')->with('success', 'Password is reset successfully.');
    }


}
