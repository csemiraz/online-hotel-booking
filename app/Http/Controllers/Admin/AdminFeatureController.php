<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->get();
        return view('admin.feature.feature-view', compact('features'));
    }

    public function create()
    {
        return view('admin.feature.feature-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required'
        ]);
        
        $feature = new Feature();
        $feature->icon = $request->icon;
        $feature->heading = $request->heading;
        $feature->text = $request->text;
        $feature->save();

        return redirect()->back()->with('success', 'Data info created successfully.');
    }

    public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.feature.feature-edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required'
        ]);

        $feature = Feature::find($id);
        $feature->icon = $request->icon;
        $feature->heading = $request->heading;
        $feature->text = $request->text;
        $feature->update();

        return redirect()->back()->with('success', 'Data info updated successfully.');
    }

    public function delete($id)
    {
        $feature = Feature::find($id);
        $feature->delete();

        return redirect()->back()->with('success','Data info deleted successfully.');
    }
}
