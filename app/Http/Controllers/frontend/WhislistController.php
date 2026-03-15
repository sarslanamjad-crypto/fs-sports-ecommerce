<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\Projectmodel;
use Illuminate\Http\Request;

class whislistcontroller extends Controller
{
    public function whislist(){
        return view('frontend.whislist',['projects'=>Projectmodel ::get()]);
    }
}
