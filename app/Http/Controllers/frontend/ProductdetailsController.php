<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productdetailscontroller extends Controller
{
    public function productdetails(){
        return view('frontend.product-details');
    }
}
