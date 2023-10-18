<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDatewiseController extends Controller
{
    public function index()
    {
        return view('admin.datewise-rooms');
    }

    public function datewise_submit(Request $request)
    {
        $request->validate([
            'selected_date' => 'required',
        ]);

        $check_selected_date = $request->selected_date;
        $rooms = Room::get();
        return view('admin.datewise-rooms-detail', compact('rooms', 'check_selected_date'));
    }
}
