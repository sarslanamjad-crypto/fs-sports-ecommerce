<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingDetail;
use Illuminate\Http\Request;

class ShippingDetailController extends Controller
{
    public function index()
    {
        $items = ShippingDetail::all();
        return view('backend.shipping-detail.index', compact('items'));
    }

    public function create()
    {
        return view('backend.shipping-detail.create');
    }

    public function store(Request $request)
    {
        ShippingDetail::create($request->all());
        return redirect()->route('admin.shipping-detail.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = ShippingDetail::findOrFail($id);
        return view('backend.shipping-detail.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ShippingDetail::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.shipping-detail.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        ShippingDetail::destroy($id);
        return redirect()->route('admin.shipping-detail.index')->with('success', 'Deleted successfully.');
    }
}
