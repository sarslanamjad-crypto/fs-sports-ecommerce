<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function storeLocator()
    {
        // Query active branches (using the database column 'is_active')
        $branches = Branch::where('is_active', 1)->get();
        
        return view('frontend.store_locator', compact('branches'));
    }
}
