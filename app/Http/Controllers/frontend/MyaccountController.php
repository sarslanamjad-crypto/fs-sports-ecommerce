<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class myaccountcontroller extends Controller
{
    public function myaccount(){
        return view('frontend.my-account');
    }
}
