<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Admin;
use App\Models\Contact;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        return view('front.contact', compact('page_data'));
    }

    public function send_email(Request $request)
    { 
        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if(!$validator->passes()) {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        } 
        
        else {

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->save();
            
            // Send email
            $subject = 'Contact form email';
            $message = 'Visitor email information: <br>';
            $message .= '<br>Name: '.$request->name;
            $message .= '<br>Email: '.$request->email;
            $message .= '<br>Message: '.$request->message;

            $admin_data = Admin::where('id',1)->first();
            $admin_email = $admin_data->email;

            \Mail::to($admin_email)->send(new Websitemail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>'Email is sent successfully']);
        }
    }

}
