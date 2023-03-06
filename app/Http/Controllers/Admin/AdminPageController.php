<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function about()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_about', compact('page_data'));
    }

    public function about_update(Request $request)
    {
        $request->validate([
            'about_heading' => 'required',
            'about_content' => 'required',
            'about_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->about_heading = $request->about_heading;
        $page_data->about_content = $request->about_content;
        $page_data->about_status = $request->about_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function terms()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_terms', compact('page_data'));
    }

    public function terms_update(Request $request)
    {
        $request->validate([
            'terms_heading' => 'required',
            'terms_content' => 'required',
            'terms_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->terms_heading = $request->terms_heading;
        $page_data->terms_content = $request->terms_content;
        $page_data->terms_status = $request->terms_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function privacy()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_privacy', compact('page_data'));
    }

    public function privacy_update(Request $request)
    {
        $request->validate([
            'privacy_heading' => 'required',
            'privacy_content' => 'required',
            'privacy_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->privacy_heading = $request->privacy_heading;
        $page_data->privacy_content = $request->privacy_content;
        $page_data->privacy_status = $request->privacy_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function disclaimer()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_disclaimer', compact('page_data'));
    }

    public function disclaimer_update(Request $request)
    {
        $request->validate([
            'disclaimer_heading' => 'required',
            'disclaimer_content' => 'required',
            'disclaimer_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->disclaimer_heading = $request->disclaimer_heading;
        $page_data->disclaimer_content = $request->disclaimer_content;
        $page_data->disclaimer_status = $request->disclaimer_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function contact()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_contact', compact('page_data'));
    }

    public function contact_update(Request $request)
    {
        $request->validate([
            'contact_heading' => 'required',
            'contact_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->contact_heading = $request->contact_heading;
        $page_data->contact_map = $request->contact_map;
        $page_data->contact_status = $request->contact_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function photo_gallery()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_photo-gallery', compact('page_data'));
    }

    public function photo_gallery_update(Request $request)
    {
        $request->validate([
            'photo_gallery_heading' => 'required',
            'photo_gallery_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->photo_gallery_heading = $request->photo_gallery_heading;
        $page_data->photo_gallery_status = $request->photo_gallery_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function video_gallery()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_video-gallery', compact('page_data'));
    }

    public function video_gallery_update(Request $request)
    {
        $request->validate([
            'video_gallery_heading' => 'required',
            'video_gallery_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->video_gallery_heading = $request->video_gallery_heading;
        $page_data->video_gallery_status = $request->video_gallery_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function faq()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_faq', compact('page_data'));
    }

    public function faq_update(Request $request)
    {
        $request->validate([
            'faq_heading' => 'required',
            'faq_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->faq_heading = $request->faq_heading;
        $page_data->faq_status = $request->faq_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function blog()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_blog', compact('page_data'));
    }

    public function blog_update(Request $request)
    {
        $request->validate([
            'blog_heading' => 'required',
            'blog_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->blog_heading = $request->blog_heading;
        $page_data->blog_status = $request->blog_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function room()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_room', compact('page_data'));
    }

    public function room_update(Request $request)
    {
        $request->validate([
            'room_heading' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->room_heading = $request->room_heading;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function cart()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_cart', compact('page_data'));
    }

    public function cart_update(Request $request)
    {
        $request->validate([
            'cart_heading' => 'required',
            'cart_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->cart_heading = $request->cart_heading;
        $page_data->cart_status = $request->cart_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function checkout()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_checkout', compact('page_data'));
    }

    public function checkout_update(Request $request)
    {
        $request->validate([
            'checkout_heading' => 'required',
            'checkout_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->checkout_heading = $request->checkout_heading;
        $page_data->checkout_status = $request->checkout_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function payment()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_payment', compact('page_data'));
    }

    public function payment_update(Request $request)
    {
        $request->validate([
            'payment_heading' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->payment_heading = $request->payment_heading;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function signup()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_signup', compact('page_data'));
    }

    public function signup_update(Request $request)
    {
        $request->validate([
            'signup_heading' => 'required',
            'signup_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->signup_heading = $request->signup_heading;
        $page_data->signup_status = $request->signup_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }

    public function signin()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_signin', compact('page_data'));
    }

    public function signin_update(Request $request)
    {
        $request->validate([
            'signin_heading' => 'required',
            'signin_status' => 'required'
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->signin_heading = $request->signin_heading;
        $page_data->signin_status = $request->signin_status;
        $page_data->update();
        
        return redirect()->back()->with('success', 'Page info updated successfully.');
    }



}
