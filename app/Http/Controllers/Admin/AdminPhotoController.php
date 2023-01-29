<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('admin.photo.photo-view', compact('photos'));
    }

    public function create()
    {
        return view('admin.photo.photo-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        $ext = $request->file('photo')->extension();
        $final_name = 'photo'.'_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('images/'), $final_name);
        
        $photo = new Photo();
        $photo->photo = $final_name;
        $photo->caption = $request->caption;
        $photo->save();

        return redirect()->back()->with('success', 'Data info created successfully.');
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        return view('admin.photo.photo-edit', compact('photo'));
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);

        if($request->photo) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]); 

            if(file_exists(public_path('images/'.$photo->photo))) {
                unlink(public_path('images/'.$photo->photo));
            }
        
            $ext = $request->file('photo')->extension();
            $final_name = 'photo'.time().'.'.$ext;
            $request->file('photo')->move(public_path('images/'), $final_name);
            $photo->photo = $final_name;
        }

        $photo->caption = $request->caption;
        $photo->update();

        return redirect()->back()->with('success', 'Data info updated successfully.');
    }

    public function delete($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        
        if(file_exists(public_path('images/'.$photo->photo))) {
            unlink(public_path('images/'.$photo->photo));
        }

        return redirect()->back()->with('success','Data info deleted successfully.');
    }
}
