<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $items = Customer::all();
        return view('backend.customer.index', compact('items'));
    }

    public function create()
    {
        return view('backend.customer.create');
    }

    public function store(Request $request)
    {
        Customer::create($request->all());
        return redirect()->route('admin.customer.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Customer::findOrFail($id);
        return view('backend.customer.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Customer::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.customer.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->route('admin.customer.index')->with('success', 'Deleted successfully.');
    }
}
