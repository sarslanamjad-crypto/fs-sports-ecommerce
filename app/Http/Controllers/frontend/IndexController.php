<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\Projectmodel;
use App\Models\frontend\Registration;
use Illuminate\Http\Request;

class indexcontroller extends Controller
{
    public function index()
    {
        return view('frontend.index', ['projects' => Projectmodel::get()]);
    }

    public function submit(Request $request)
    {

        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required',
            ]
        );

        $register = new Registration();

        $register->first_name = $request->first_name;
        $register->last_name = $request->last_name;
        $register->email = $request->email;
        $register->password = $request->password;
        $register->save();
        // return back()->withSuccess("Welcome!");
        return redirect('/');
    }
}
