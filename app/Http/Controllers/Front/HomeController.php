<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Room;
use App\Models\Slide;
use App\Models\Feature;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('id', 'asc')->get();
        $features = Feature::orderBy('id', 'asc')->get();
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->limit(3)->get();
        $rooms = Room::limit(4)->get();
        return view("front.home", compact('slides', 'features', 'testimonials', 'posts', 'rooms'));
    }
}
