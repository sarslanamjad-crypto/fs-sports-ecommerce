<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class columnsrightcontroller extends Controller
{
    public function columnsright(){
        return view('frontend.1columns-right');
    }
}
