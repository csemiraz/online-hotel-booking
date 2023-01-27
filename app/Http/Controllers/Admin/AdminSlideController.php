<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slide::latest()->get();
        return view('admin.slide.slide-view', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide.slide-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif'
        ]);
        $ext = $request->file('photo')->extension();
        $final_name = 'slide'.'_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('images/'), $final_name);
        
        $slide = new Slide();
        $slide->photo = $final_name;
        $slide->heading = $request->heading;
        $slide->text = $request->text;
        $slide->button_text = $request->button_text;
        $slide->button_url = $request->button_url;
        $slide->save();

        return redirect()->back()->with('success', 'Data info created successfully.');
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.slide-edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $slide = Slide::find($id);

        if($request->photo) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);

            if(file_exists(public_path('images/'.$slide->photo))) {
                unlink(public_path('images/'.$slide->photo));
            }
        
            $ext = $request->file('photo')->extension();
            $final_name = 'slide_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('images/'), $final_name);
            $slide->photo = $final_name;
        }

        $slide->heading = $request->heading;
        $slide->text = $request->text;
        $slide->button_text = $request->button_text;
        $slide->button_url = $request->button_url;
        $slide->update();

        return redirect()->route('admin_slide_view')->with('success', 'Data info updated successfully.');
    }

    public function delete($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        unlink(public_path('images/'.$slide->photo));

        return redirect()->back()->with('success','Data info deleted successfully.');
    }


}
