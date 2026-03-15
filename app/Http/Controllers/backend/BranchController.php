<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $items = Branch::all();
        return view('backend.branch.index', compact('items'));
    }

    public function create()
    {
        return view('backend.branch.create');
    }

    public function store(Request $request)
    {
        Branch::create($request->all());
        return redirect()->route('admin.branch.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Branch::findOrFail($id);
        return view('backend.branch.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Branch::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.branch.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Branch::destroy($id);
        return redirect()->route('admin.branch.index')->with('success', 'Deleted successfully.');
    }
}
