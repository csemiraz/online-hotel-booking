<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\RoomPhoto;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::get();
        return view('admin.room.room-view', compact('rooms'));
    }

    public function create()
    {
        $amenities = Amenity::get();
        return view('admin.room.room-create', compact('amenities'));
    }

    public function store(Request $request)
    {
        $amenities = '';
        //1,2,3
        $i = 0;
        if(isset($request->arr_amenities)) {
            foreach($request->arr_amenities as $item) {
                $i++;
                if($i == 1) {
                    $amenities .= $item;
                } else {
                    $amenities .= ','.$item;
                }  
            }
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required',
            'featured_photo' => 'required|image|mimes: jpg,png,jpeg,gif',
        ]);

        
        $ext = $request->file('featured_photo')->extension();
        $final_name = 'room'.'_'.time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('images/'), $final_name);
        
        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->total_rooms = $request->total_rooms;
        $room->amenities = $amenities;
        $room->size = $request->size;
        $room->total_beds = $request->total_beds;
        $room->total_bathrooms = $request->total_bathrooms;
        $room->total_guests = $request->total_guests;
        $room->total_balconies = $request->total_balconies;
        $room->featured_photo = $final_name;
        $room->video_id = $request->video_id;
        $room->save();

        return redirect()->back()->with('success', 'Data info created successfully.');

    }

    public function edit($id)
    {
        $amenities = Amenity::get();  
        $room = Room::find($id);

        $existing_amenities = array();
        if($room->amenities != '') {
            $existing_amenities = explode(',', $room->amenities);
        }
     
        return view('admin.room.room-edit', compact('amenities', 'room', 'existing_amenities'));
    }

    public function update(Request $request, $id)
    {
        $amenities = '';
        //1,2,3
        $i = 0;
        if(isset($request->arr_amenities)) {
            foreach($request->arr_amenities as $item) {
                $i++;
                if($i == 1) {
                    $amenities .= $item;
                } else {
                    $amenities .= ','.$item;
                }  
            }
        }
       
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required',
        ]);

        $room = Room::find($id);

        if($request->hasFile('featured_photo')){
            $request->validate([
                'featured_photo' => 'image|mimes: jpg,png,jpeg,gif',
            ]);

            if(file_exists(public_path('images/'.$room->featured_photo))) {
                unlink(public_path('images/'.$room->featured_photo));
            }

            $ext = $request->file('featured_photo')->extension();
            $final_name = 'room'.'_'.time().'.'.$ext;
            $request->file('featured_photo')->move(public_path('images/'), $final_name);
            $room->featured_photo = $final_name;
        }
        
        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->total_rooms = $request->total_rooms;
        $room->amenities = $amenities;
        $room->size = $request->size;
        $room->total_beds = $request->total_beds;
        $room->total_bathrooms = $request->total_bathrooms;
        $room->total_guests = $request->total_guests;
        $room->total_balconies = $request->total_balconies;
        $room->video_id = $request->video_id;
        $room->save();

        return redirect()->back()->with('success', 'Data info updated successfully.');
    }

    public function delete($id)
    {
        $room = Room::find($id);
        unlink(public_path('images/'.$room->featured_photo));
        $room->delete();

        $room_photos = RoomPhoto::where('room_id', $id)->get();
        foreach($room_photos as $item) {
            unlink(public_path('images/'.$item->photo));
            $item->delete();
        }

        return redirect()->back()->with('success', 'Data info deleted successfully.');
    }

    public function gallery($id)
    {
        $room = Room::find($id);
        $room_photos = RoomPhoto::where('room_id', $id)->get();
        return view('admin.room.room-gallery', compact('room','room_photos'));
    }

    public function gallery_store(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = 'room_gallery'.'_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('images/'), $final_name);

        $room_photo = new RoomPhoto();
        $room_photo->photo = $final_name;
        $room_photo->room_id = $id;
        $room_photo->save();

        return redirect()->back()->with('success', 'Data info created successfully.');

    }

    public function gallery_delete($id)
    {
        $room_photo = RoomPhoto::find($id);
        unlink(public_path('images/'.$room_photo->photo));
        $room_photo->delete();
        return redirect()->back()->with('success', 'Data info deleted successfully.');
    }


}
