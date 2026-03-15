<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\FAQs;
use Illuminate\Http\Request;

class AdminFaqsController extends Controller
{

    public function index()
    {
        $Name = session('first_name') . " " . session('last_name');
        return view('backend.faq', ['faqs' => FAQs::get(), 'Name' => $Name]);
    }

    public function addFAQ()
    {
        $Name = session('first_name') . " " . session('last_name');
        return view('backend.faq-add', ['Name' => $Name]);
    }


    public function submitFaqRecord(Request $request)
    {
        $request->validate(
            [
                'question' => 'required',
                'answer' => 'required'
            ]
        );
        $FAQ_STATUS = 1;
        $faqs = new FAQs();
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->status = $FAQ_STATUS;
        $faqs->save();
        return back()->withSuccess('FAQ Record Added Successfully');
    }

    public function editFAQ($id)
    {
        $Name = session('first_name') . " " . session('last_name');
        $faqs = FAQs::where('id', $id)->first();
        return view('backend.faq-edit', ['faqs' => $faqs, 'Name' => $Name]);
    }

    public function updateFAQ(Request $request, $id)
    {

        $request->validate(
            [
                'question' => 'required',
                'answer' => 'required'
            ]
        );

        $faqs = FAQs::where('id', $id)->first();
        $FAQ_STATUS = 1;

        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->status = $FAQ_STATUS;
        $faqs->save();
        return back()->withSuccess('Member Record Updated Successfully');
    }


    public function deleteFAQ($id)
    {
        $team = FAQs::where('id', $id)->first();
        $team->delete();
        return back()->withSuccess('Member Record Deleted Successfully');
    }
}
