<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductsInventory;
use Illuminate\Http\Request;

class ProductsInventoryController extends Controller
{
    public function index()
    {
        $items = ProductsInventory::all();
        return view('backend.products-inventory.index', compact('items'));
    }

    public function create()
    {
        return view('backend.products-inventory.create');
    }

    public function store(Request $request)
    {
        ProductsInventory::create($request->all());
        return redirect()->route('admin.products-inventory.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = ProductsInventory::findOrFail($id);
        return view('backend.products-inventory.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ProductsInventory::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.products-inventory.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        ProductsInventory::destroy($id);
        return redirect()->route('admin.products-inventory.index')->with('success', 'Deleted successfully.');
    }
}
