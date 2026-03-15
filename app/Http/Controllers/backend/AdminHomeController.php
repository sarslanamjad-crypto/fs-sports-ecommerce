<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Admins;
use App\Models\backend\FAQs;
use App\Models\backend\Team;

class AdminHomeController extends Controller
{

    public function index()
    {
        if(session()->has('email')){
            $Name = session('first_name') . " " . session('last_name');
            $TotalAdmins = Admins::count();
            $TotalTeam = Team::count();
            $TotalFAQs = FAQs::count();
            return view('backend.index', compact('Name','TotalAdmins', 'TotalTeam', 'TotalFAQs'));

        } else {
            return view('backend.login');
        }
    }

    public function registerAdmin()
    {
        // if (session()->has('email')) {
        $Name = session('first_name') . " " . session('last_name');
        $url = url('/admin/register');
        $data = compact('url', 'Name');
        return view('backend.admin-add')->with($data);
        // } else {
        //     return view('backend.login');
        // }
    }

    public function submitAdminRecord(Request $request)
    {
        // if (session()->has('email')) {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email', 
                'password' => 'required',
                'confirm_password' => 'required',
                'contact' => 'required'
            ]
        );
        $admin = new Admins();
        $admin->first_name = $request['first_name'];
        $admin->last_name = $request['last_name'];
        $admin->email = $request['email'];
        $admin->contact = $request['contact'];
        // $admin->password = $request['password'];
        $admin->password = md5($request['password']);
        $admin->status = 1;
        $admin->save();
        return redirect('/admin/admins-list');
        // } else {
        //     return view('backend.login');
        // }
    }

    public function showAdminRecord()
    {
        // if (session()->has('id')) {
        $admins = Admins::all();
        // Calling the helper function for testing data
        //testData($admins);

        //     echo "<pre>";
        //     print_r($admins->toArray()); //toArry runs only when we have some data in DB
        //    echo  "</pre>";
        //     die;
        $Name = session('first_name') . " " . session('last_name');
        $data = compact('admins', 'Name');
        return view('backend/admins-list')->with($data);
        // } else {
        //     return view('backend.login');
        // }
    }

    public function deleteAdminRecord(string $id)
    {
        // if (session()->has('email')) {
        $data  = Admins::find($id);
        if (!is_null($data)) {
            $data->delete();
        }
        return redirect('/admin/admins-list');
        // } else {
        //     return view('backend.login');
        // }
    }

    public function editAdminRecord($id)
    {
        // if (session()->has('email')) {
        $Name = session('first_name') . " " . session('last_name');
        $admin = Admins::find($id);
        if (is_null($admin)) {
            return redirect('/admin/admins-list');
        } else {
            $url = url('/admin/update') . "/" . $id;
            return view('backend.admin-add', compact('admin', 'url', 'Name'));
        }
        // } else {
        //     return view('backend.login');
        // }
    }

    public function updateAdminRecord(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required'
        ]);

        $admin = Admins::find($id);
        if (!is_null($admin)) {
            $admin->first_name = $request['first_name'];
            $admin->last_name = $request['last_name'];
            $admin->email = $request['email'];
            $admin->contact = $request['contact'];
            
            if (!empty($request['password'])) {
                if ($request['password'] === $request['confirm_password']) {
                    $admin->password = md5($request['password']);
                } else {
                    return back()->withErrors(['confirm_password' => 'Passwords do not match.'])->withInput();
                }
            }
            
            $admin->save();
        }
        
        return redirect('/admin/admins-list');
    }
}
