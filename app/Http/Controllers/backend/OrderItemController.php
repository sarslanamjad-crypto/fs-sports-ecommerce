<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $items = OrderItem::all();
        return view('backend.order-item.index', compact('items'));
    }

    public function create()
    {
        return view('backend.order-item.create');
    }

    public function store(Request $request)
    {
        OrderItem::create($request->all());
        return redirect()->route('admin.order-item.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = OrderItem::findOrFail($id);
        return view('backend.order-item.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = OrderItem::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.order-item.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        OrderItem::destroy($id);
        return redirect()->route('admin.order-item.index')->with('success', 'Deleted successfully.');
    }
}
