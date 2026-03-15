<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class services01controller extends Controller
{
    public function services01(){
        return view('frontend.services-01');
    }
}
