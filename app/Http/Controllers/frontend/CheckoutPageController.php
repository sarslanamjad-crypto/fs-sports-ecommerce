<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkoutpagecontroller extends Controller
{
    public function checkoutpage(){
        return view('frontend.checkout-page');
    }
}
