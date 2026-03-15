<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::all();
        return view('backend.cart.index', compact('items'));
    }

    public function create()
    {
        return view('backend.cart.create');
    }

    public function store(Request $request)
    {
        Cart::create($request->all());
        return redirect()->route('admin.cart.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Cart::findOrFail($id);
        return view('backend.cart.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Cart::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.cart.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('admin.cart.index')->with('success', 'Deleted successfully.');
    }
}
