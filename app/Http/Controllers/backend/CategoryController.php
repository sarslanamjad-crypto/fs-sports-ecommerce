<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Category::all();
        return view('backend.category.index', compact('items'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Category::findOrFail($id);
        return view('backend.category.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Category::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.category.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.category.index')->with('success', 'Deleted successfully.');
    }
}
