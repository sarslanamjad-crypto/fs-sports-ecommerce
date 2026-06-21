<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $items = Registration::all();
        return view('backend.registration.index', compact('items'));
    }

    public function create()
    {
        return view('backend.registration.create');
    }

    public function store(Request $request)
    {
        Registration::create($request->all());
        return redirect()->route('admin.registration.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Registration::findOrFail($id);
        return view('backend.registration.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Registration::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.registration.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Registration::destroy($id);
        return redirect()->route('admin.registration.index')->with('success', 'Deleted successfully.');
    }
}
