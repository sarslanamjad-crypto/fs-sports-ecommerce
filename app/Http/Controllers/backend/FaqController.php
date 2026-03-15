<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $items = Faq::all();
        return view('backend.faq.index', compact('items'));
    }

    public function create()
    {
        return view('backend.faq.create');
    }

    public function store(Request $request)
    {
        Faq::create($request->all());
        return redirect()->route('admin.faq.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Faq::findOrFail($id);
        return view('backend.faq.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Faq::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.faq.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Faq::destroy($id);
        return redirect()->route('admin.faq.index')->with('success', 'Deleted successfully.');
    }
}
