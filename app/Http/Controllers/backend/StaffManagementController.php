<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StaffManagement;
use Illuminate\Http\Request;

class StaffManagementController extends Controller
{
    public function index()
    {
        $items = StaffManagement::all();
        return view('backend.staff-management.index', compact('items'));
    }

    public function create()
    {
        return view('backend.staff-management.create');
    }

    public function store(Request $request)
    {
        StaffManagement::create($request->all());
        return redirect()->route('admin.staff-management.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = StaffManagement::findOrFail($id);
        return view('backend.staff-management.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = StaffManagement::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.staff-management.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        StaffManagement::destroy($id);
        return redirect()->route('admin.staff-management.index')->with('success', 'Deleted successfully.');
    }
}
