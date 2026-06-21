<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\ProductsInventory;
use App\Models\ProductReview;
use App\Models\SiteSetting;
use App\Models\Team;
use App\Models\Faq;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $categories = Category::where('is_active', 1)->get();

        $featuredProducts = ProductsInventory::where('is_activated', 1)
            ->with('category')
            ->orderByRaw('discount_percentage DESC')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('frontend.homepage', compact('categories', 'featuredProducts'));
    }

    public function faqs()
    {
        $faqs = Faq::active()->get();
        return view('frontend.faqs', compact('faqs'));
    }

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

    public function shop(Request $request)
    {
        // Fetch active categories (is_active = 1)
        $categories = Category::where('is_active', 1)->get();

        // Fetch active products (mapped status = 1 to actual DB column is_activated = 1)
        $query = ProductsInventory::where('is_activated', 1)->with('category');

        // Apply category filter if active
        if ($request->filled('category')) {
            $cats = is_array($request->category) ? $request->category : [$request->category];
            if (in_array('discount', $cats)) {
                $query->where('discount_percentage', '>', 0);
            } else {
                $query->whereIn('category_id', $cats);
            }
        }

        // Apply price range filter
        if ($request->filled('price')) {
            $maxPrice = (float)$request->price;
            $query->where(function ($q) use ($maxPrice) {
                $q->where(function ($sub) use ($maxPrice) {
                    $sub->whereNotNull('discounted_price')
                        ->where('discounted_price', '<=', $maxPrice);
                })->orWhere(function ($sub) use ($maxPrice) {
                    $sub->whereNull('discounted_price')
                        ->where('price', '<=', $maxPrice);
                });
            });
        }

        // Apply Brand Heritage checkbox (in-house brand only)
        if ($request->filled('in_house')) {
            $query->where('is_in_house_brand', 1);
        }

        // Paginate by 12 products per page, appending active query string variables
        $products = $query->orderByRaw('discount_percentage DESC')
            ->paginate(12)
            ->withQueryString();

        return view('frontend.shop_page', compact('categories', 'products'));
    }

    public function aboutUs()
    {
        // Fetch the site settings (SiteSetting::first())
        $settings = SiteSetting::first();

        // Fetch active team members (Team::where('status', 1)->get())
        $team = Team::where('status', 1)->get();

        return view('frontend.about_us', compact('settings', 'team'));
    }
}
