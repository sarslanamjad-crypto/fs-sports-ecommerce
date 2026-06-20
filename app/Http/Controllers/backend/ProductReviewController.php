<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductReview::query();
        if ($request->filled('search')) {
            $query->where('product_id', 'LIKE', '%' . $request->search . '%');
        }
        $items = $query->get();
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

    public function toggleVisibility($id)
    {
        $item = ProductReview::findOrFail($id);
        $item->is_visible = !$item->is_visible;
        // manually execute query since timestamps are false and update() might complain or try to update timestamp
        DB::table('product_reviews')->where('id', $id)->update(['is_visible' => $item->is_visible]);
        return back()->with('success', 'Review visibility toggled successfully.');
    }

    public function destroy($id)
    {
        // ... handled below
        ProductReview::destroy($id);
        return redirect()->route('admin.product-review.index')->with('success', 'Deleted successfully.');
    }
}
