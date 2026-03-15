<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $items = SiteSetting::all();
        return view('backend.site-setting.index', compact('items'));
    }

    public function create()
    {
        return view('backend.site-setting.create');
    }

    public function store(Request $request)
    {
        SiteSetting::create($request->all());
        return redirect()->route('admin.site-setting.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = SiteSetting::findOrFail($id);
        return view('backend.site-setting.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = SiteSetting::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.site-setting.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        SiteSetting::destroy($id);
        return redirect()->route('admin.site-setting.index')->with('success', 'Deleted successfully.');
    }
}
