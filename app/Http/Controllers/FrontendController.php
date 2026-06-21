<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\ProductsInventory;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function storeLocator()
    {
        // Query active branches (using the database column 'is_active')
        $branches = Branch::where('is_active', 1)->get();
        
        return view('frontend.store_locator', compact('branches'));
    }

    public function productDetails($id)
    {
        // Fetch the product using ProductsInventory::findOrFail($id)
        $product = ProductsInventory::with('category')->findOrFail($id);

        // Fetch active/visible reviews for the product
        $reviews = ProductReview::where('product_id', $id)
            ->where('is_visible', 1)
            ->get();

        return view('frontend.products_details', compact('product', 'reviews'));
    }
}
