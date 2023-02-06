<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::get();
        return view('admin.room-amenity.amenity-view', compact('amenities'));
    }

    public function create()
    {
        return view('admin.room-amenity.amenity-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $amenity = new Amenity();
        $amenity->name = $request->name;
        $amenity->save();

        return redirect()->back()->with('success', 'Data is created successfully.');
    }

    public function edit($id)
    {
        $amenity = Amenity::find($id);
        return view('admin.room-amenity.amenity-edit', compact('amenity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $amenity = Amenity::find($id);
        $amenity->name = $request->name;
        $amenity->update();

        return redirect()->route('admin_amenity_view')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $amenity = Amenity::find($id);
        $amenity->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');        
    }



}
