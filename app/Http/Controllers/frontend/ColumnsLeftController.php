<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class columnsleftcontroller extends Controller
{
    public function columnsleft(){
        return view('frontend.1columns-left');
    }
}
