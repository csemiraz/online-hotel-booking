<?php

namespace App\Http\Controllers\Front;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;

class SubscriberController extends Controller
{
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email',
        ]);
        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else
        {
            $token = hash('sha256', time());

            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 0;
            $subscriber->save();

            // Send email
            $verification_link = url('subscriber/verify/'.$request->email.'/'.$token);
            $subject = 'Subscriber Verification';
            $message = 'Please click in the link below:<br/>';
            $message.= '<a href="'.$verification_link.'">';
            $message.=  $verification_link;
            $message.= '</a>';

            \Mail::to($request->email)->send(new WebsiteMail($subject, $message));
            return response()->json(['code'=>1,'success_message'=>'Please check your email to confirm subscription.']);
        }
        
    }

    public function verify($email, $token)
    {
        $subscriber = Subscriber::where('email', $email)->where('token', $token)->first();
        
        if(!$subscriber)
        {
            return redirect()->route('home'); //To avoid reclick the verification link after verification..
        }
        $subscriber->token = '';
        $subscriber->status = 1;
        $subscriber->update();

        return redirect()->route('home')->with('success', 'You are now verified subscriber.');
     }

}
