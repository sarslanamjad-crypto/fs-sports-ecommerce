<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductsInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsInventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductsInventory::query();
        if ($request->query('filter') === 'low_stock') {
            $query->where('current_stock', '<=', 10)->where('is_activated', true);
        }
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }
        $items = $query->get();
        return view('backend.products-inventory.index', compact('items'));
    }

    public function create()
    {
        return view('backend.products-inventory.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        ProductsInventory::create($data);
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
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $item->update($data);
        return redirect()->route('admin.products-inventory.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        $item = ProductsInventory::findOrFail($id);
        // Delete image file
        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return redirect()->route('admin.products-inventory.index')->with('success', 'Deleted successfully.');
    }
}
