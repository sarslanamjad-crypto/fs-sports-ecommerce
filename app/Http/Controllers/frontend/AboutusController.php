<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class aboutuscontroller extends Controller
{
    public function aboutus(){
        return view('frontend.about-us');
    }
}
