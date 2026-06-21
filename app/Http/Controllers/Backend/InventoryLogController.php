<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\InventoryLog;
use Illuminate\Http\Request;

class InventoryLogController extends Controller
{
    public function index()
    {
        $items = InventoryLog::all();
        return view('backend.inventory-log.index', compact('items'));
    }

    public function create()
    {
        return view('backend.inventory-log.create');
    }

    public function store(Request $request)
    {
        InventoryLog::create($request->all());
        return redirect()->route('admin.inventory-log.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = InventoryLog::findOrFail($id);
        return view('backend.inventory-log.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = InventoryLog::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.inventory-log.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        InventoryLog::destroy($id);
        return redirect()->route('admin.inventory-log.index')->with('success', 'Deleted successfully.');
    }
}
