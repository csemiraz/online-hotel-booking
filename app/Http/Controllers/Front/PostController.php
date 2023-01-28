<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('front.posts', compact('posts'));
    }

    public function post_detail($id)
    {
        $post = Post::find($id);
        $post->views = $post->views + 1;
        $post->update();

        return view('front.post-detail', compact('post'));
    }

}
