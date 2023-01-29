<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.video.video-view', compact('videos'));
    }

    public function create()
    {
        return view('admin.video.video-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required',
        ]);

        $video = new Video();
        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        $video->save();

        return redirect()->back()->with('success', 'Data info created successfully.');
    }

    public function edit($id)
    {
        $video = Video::find($id);
        return view('admin.video.video-edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        $request->validate([
            'video_id' => 'required'
        ]);
        
        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        $video->update();

        return redirect()->back()->with('success', 'Data info updated successfully.');
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $video->delete();

        return redirect()->back()->with('success','Data info deleted successfully.');
    }

}
