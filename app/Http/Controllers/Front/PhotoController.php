<?php

namespace App\Http\Controllers\Front;

use App\Models\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->paginate(8);
        return view('front.photo-gallery', compact('photos'));
    }
}
