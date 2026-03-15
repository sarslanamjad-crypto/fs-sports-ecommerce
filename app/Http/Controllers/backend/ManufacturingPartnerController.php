<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ManufacturingPartner;
use Illuminate\Http\Request;

class ManufacturingPartnerController extends Controller
{
    public function index()
    {
        $items = ManufacturingPartner::all();
        return view('backend.manufacturing-partner.index', compact('items'));
    }

    public function create()
    {
        return view('backend.manufacturing-partner.create');
    }

    public function store(Request $request)
    {
        ManufacturingPartner::create($request->all());
        return redirect()->route('admin.manufacturing-partner.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = ManufacturingPartner::findOrFail($id);
        return view('backend.manufacturing-partner.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ManufacturingPartner::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.manufacturing-partner.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        ManufacturingPartner::destroy($id);
        return redirect()->route('admin.manufacturing-partner.index')->with('success', 'Deleted successfully.');
    }
}
