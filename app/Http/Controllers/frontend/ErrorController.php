<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class errorcontroller extends Controller
{
    public function error(){
        return view('frontend.error');
    }
}
