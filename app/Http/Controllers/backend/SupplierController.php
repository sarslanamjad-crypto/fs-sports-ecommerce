<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $items = Supplier::all();
        return view('backend.supplier.index', compact('items'));
    }

    public function create()
    {
        return view('backend.supplier.create');
    }

    public function store(Request $request)
    {
        Supplier::create($request->all());
        return redirect()->route('admin.supplier.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Supplier::findOrFail($id);
        return view('backend.supplier.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Supplier::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.supplier.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect()->route('admin.supplier.index')->with('success', 'Deleted successfully.');
    }
}
