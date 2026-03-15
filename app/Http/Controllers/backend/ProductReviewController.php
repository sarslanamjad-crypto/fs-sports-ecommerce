<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index()
    {
        $items = ProductReview::all();
        return view('backend.product-review.index', compact('items'));
    }

    public function create()
    {
        return view('backend.product-review.create');
    }

    public function store(Request $request)
    {
        ProductReview::create($request->all());
        return redirect()->route('admin.product-review.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = ProductReview::findOrFail($id);
        return view('backend.product-review.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ProductReview::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.product-review.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        ProductReview::destroy($id);
        return redirect()->route('admin.product-review.index')->with('success', 'Deleted successfully.');
    }
}
