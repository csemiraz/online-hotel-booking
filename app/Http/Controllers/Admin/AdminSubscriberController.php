<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminSubscriberController extends Controller
{
    public function view()
    {
        $subscribers = Subscriber::where('status', 1)->get();
        return view('admin.subscriber.subscriber-view', compact('subscribers'));
    }

    public function send_email()
    {
        return view('admin.subscriber.subscriber-send-email');
    }

    public function send_email_submit(Request $request)
    {
        $subject = $request->subject;
        $message = $request->message;

        $subscribers = Subscriber::where('status', 1)->get();

        foreach($subscribers as $subscriber) {
            \Mail::to($subscriber->email)->send(new WebsiteMail($subject, $message));
        }

        return redirect()->back()->with('success', 'Email is sent successfully');
    }
    
}
