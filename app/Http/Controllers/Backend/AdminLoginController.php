<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    public function index()
    {
        return view('backend.login');
    }

    public function onLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $admin = Admin::where('email', $email)
            ->where(function($query) use ($password) {
                $query->where('password', $password)
                      ->orWhere('password', md5($password));
            })
            ->first();

        if ($admin) {
            if ($admin->status != 1) {
                return redirect('admin/login')->with('error', 'Your account is disabled.');
            }

            session()->put('id', $admin->id);
            session()->put('first_name', $admin->first_name);
            session()->put('last_name', $admin->last_name);
            session()->put('email', $admin->email);

            return redirect('/admin')->with('success', 'Login Success');
        } else {
            return redirect('admin/login')->with('error', 'Invalid Credentials.');
        }
    }

    public function logoutAdmin()
    {

        session()->forget('id');
        session()->forget('first_name');
        session()->forget('last_name');
        session()->forget('email');
        return redirect('/admin/login')->with('success', 'Logout Success');
    }
}
