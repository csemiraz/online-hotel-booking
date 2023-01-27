<?php

namespace App\Http\Controllers\Front;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::latest()->get();
        return view("front.home", compact('slides'));
    }
}
