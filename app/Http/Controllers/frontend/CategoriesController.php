<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoriescontroller extends Controller
{
    public function categories(){
        return view('frontend.categories');
    }
}
