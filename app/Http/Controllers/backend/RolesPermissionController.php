<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RolesPermission;
use Illuminate\Http\Request;

class RolesPermissionController extends Controller
{
    public function index()
    {
        $items = RolesPermission::all();
        return view('backend.roles-permission.index', compact('items'));
    }

    public function create()
    {
        return view('backend.roles-permission.create');
    }

    public function store(Request $request)
    {
        RolesPermission::create($request->all());
        return redirect()->route('admin.roles-permission.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = RolesPermission::findOrFail($id);
        return view('backend.roles-permission.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = RolesPermission::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.roles-permission.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        RolesPermission::destroy($id);
        return redirect()->route('admin.roles-permission.index')->with('success', 'Deleted successfully.');
    }
}
