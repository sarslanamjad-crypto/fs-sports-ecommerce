<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StockManagement;
use Illuminate\Http\Request;

class StockManagementController extends Controller
{
    public function index()
    {
        $items = StockManagement::all();
        return view('backend.stock-management.index', compact('items'));
    }

    public function create()
    {
        return view('backend.stock-management.create');
    }

    public function store(Request $request)
    {
        StockManagement::create($request->all());
        return redirect()->route('admin.stock-management.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = StockManagement::findOrFail($id);
        return view('backend.stock-management.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = StockManagement::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.stock-management.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        StockManagement::destroy($id);
        return redirect()->route('admin.stock-management.index')->with('success', 'Deleted successfully.');
    }
}
