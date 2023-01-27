<?php

namespace App\Http\Controllers\Front;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feature;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('id', 'asc')->get();
        $features = Feature::orderBy('id', 'asc')->get();
        return view("front.home", compact('slides', 'features'));
    }
}
