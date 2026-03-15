<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $items = Wishlist::all();
        return view('backend.wishlist.index', compact('items'));
    }

    public function create()
    {
        return view('backend.wishlist.create');
    }

    public function store(Request $request)
    {
        Wishlist::create($request->all());
        return redirect()->route('admin.wishlist.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Wishlist::findOrFail($id);
        return view('backend.wishlist.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Wishlist::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.wishlist.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Wishlist::destroy($id);
        return redirect()->route('admin.wishlist.index')->with('success', 'Deleted successfully.');
    }
}
