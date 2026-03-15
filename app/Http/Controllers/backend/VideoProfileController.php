<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VideoProfile;
use Illuminate\Http\Request;

class VideoProfileController extends Controller
{
    public function index()
    {
        $items = VideoProfile::all();
        return view('backend.video-profile.index', compact('items'));
    }

    public function create()
    {
        return view('backend.video-profile.create');
    }

    public function store(Request $request)
    {
        VideoProfile::create($request->all());
        return redirect()->route('admin.video-profile.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = VideoProfile::findOrFail($id);
        return view('backend.video-profile.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = VideoProfile::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.video-profile.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        VideoProfile::destroy($id);
        return redirect()->route('admin.video-profile.index')->with('success', 'Deleted successfully.');
    }
}
