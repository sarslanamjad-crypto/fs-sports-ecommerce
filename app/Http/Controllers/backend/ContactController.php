<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $items = Contact::all();
        return view('backend.contact.index', compact('items'));
    }

    public function create()
    {
        return view('backend.contact.create');
    }

    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('admin.contact.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Contact::findOrFail($id);
        return view('backend.contact.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Contact::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.contact.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->route('admin.contact.index')->with('success', 'Deleted successfully.');
    }
}
