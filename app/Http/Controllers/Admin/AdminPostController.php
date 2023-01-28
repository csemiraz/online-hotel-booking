<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.post-view', compact('posts'));
    }

    public function create()
    {
        return view('admin.post.post-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        $ext = $request->file('photo')->extension();
        $final_name = 'post'.'_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('images/'), $final_name);
        
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->views = 1;
        $post->photo = $final_name;
        $post->save();

        return redirect()->back()->with('success', 'Data info created successfully.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.post-edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        if($request->photo) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]); 

            if(file_exists(public_path('images/'.$post->photo))) {
                unlink(public_path('images/'.$post->photo));
            }
        
            $ext = $request->file('photo')->extension();
            $final_name = 'post'.time().'.'.$ext;
            $request->file('photo')->move(public_path('images/'), $final_name);
            $post->photo = $final_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->update();

        return redirect()->back()->with('success', 'Data info updated successfully.');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        if(file_exists(public_path('images/'.$post->photo))) {
            unlink(public_path('images/'.$post->photo));
        }

        return redirect()->back()->with('success','Data info deleted successfully.');
    }


}
