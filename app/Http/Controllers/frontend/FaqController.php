<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\FAQsModel;
use Illuminate\Http\Request;

class faqcontroller extends Controller
{
    public function faq(){
        return view('frontend.faq', ['faqs'=>FAQsModel::get()]);
    }
}
