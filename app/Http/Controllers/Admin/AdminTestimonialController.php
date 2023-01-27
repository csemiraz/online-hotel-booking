<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.testimonial-view', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.testimonial-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required'
        ]);
        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial'.'_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('images/'), $final_name);
        
        $testimonial = new Testimonial();
        $testimonial->photo = $final_name;
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        return redirect()->back()->with('success', 'Data info created successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.testimonial-edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required'
        ]);

        if($request->photo) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]); 

            if(file_exists(public_path('images/'.$testimonial->photo))) {
                unlink(public_path('images/'.$testimonial->photo));
            }
        
            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('images/'), $final_name);
            $testimonial->photo = $final_name;
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->update();

        return redirect()->back()->with('success', 'Data info updated successfully.');
    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        
        if(file_exists(public_path('images/'.$testimonial->photo))) {
            unlink(public_path('images/'.$testimonial->photo));
        }

        return redirect()->back()->with('success','Data info deleted successfully.');
    }
}
