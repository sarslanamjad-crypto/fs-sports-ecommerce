<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GroupPurchase;
use Illuminate\Http\Request;

class GroupPurchaseController extends Controller
{
    public function index()
    {
        $items = GroupPurchase::all();
        return view('backend.group-purchase.index', compact('items'));
    }

    public function create()
    {
        return view('backend.group-purchase.create');
    }

    public function store(Request $request)
    {
        GroupPurchase::create($request->all());
        return redirect()->route('admin.group-purchase.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = GroupPurchase::findOrFail($id);
        return view('backend.group-purchase.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = GroupPurchase::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.group-purchase.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        GroupPurchase::destroy($id);
        return redirect()->route('admin.group-purchase.index')->with('success', 'Deleted successfully.');
    }
}
