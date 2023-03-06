<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(4);
        return view('front.rooms', compact('rooms'));
    }

    public function room_detail($id)
    {
        $room = Room::find($id);
        return view('front.room-detail', compact('room'));
    }
}
