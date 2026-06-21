<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Faq;
use App\Models\Team;
use App\Models\ProductsInventory;
use App\Models\Customer;
use App\Models\OrdersTransaction;
use App\Models\Contact;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use App\Models\Project;
use App\Models\WhatsappClick;
use App\Models\Supplier;
use App\Models\Branch;
use App\Models\ManufacturingPartner;

class AdminHomeController extends Controller
{

    public function index()
    {
        if(session()->has('email')){
            $Name = session('first_name') . " " . session('last_name');
            $TotalAdmins       = Admin::count();
            $TotalTeam         = Team::count();
            $TotalFAQs         = Faq::count();
            $TotalProducts     = ProductsInventory::count();
            $TotalCustomers    = Customer::count();
            $TotalOrders       = OrdersTransaction::count();
            $TotalContacts     = Contact::count();
            $TotalSubscribers  = NewsletterSubscriber::count();
            $TotalUsers        = User::count();
            $TotalProjects     = Project::count();
            $whatsappJoiningsCount = WhatsappClick::count();
            $TotalSuppliers    = Supplier::count();
            $TotalBranches     = Branch::count();
            $TotalManufacturers = ManufacturingPartner::count();
            return view('backend.index', compact(
                'Name', 'TotalAdmins', 'TotalTeam', 'TotalFAQs',
                'TotalProducts', 'TotalCustomers', 'TotalOrders',
                'TotalContacts', 'TotalSubscribers', 'TotalUsers', 'TotalProjects', 'whatsappJoiningsCount',
                'TotalSuppliers', 'TotalBranches', 'TotalManufacturers'
            ));

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
        $admin = new Admin();
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

    public function showAdminRecord(Request $request)
    {
        // if (session()->has('id')) {
        $query = Admin::query();
        if ($request->filled('search')) {
            $query->where('email', 'LIKE', '%' . $request->search . '%');
        }
        $admins = $query->get();
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
        $data  = Admin::find($id);
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
        $admin = Admin::find($id);
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

        $admin = Admin::find($id);
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

    public function changePassword()
    {
        $Name = session('first_name') . " " . session('last_name');
        return view('backend.change-password', compact('Name'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4',
            'confirm_password' => 'required|same:new_password',
        ]);

        $admin = Admin::find(session('id'));
        if (!$admin) {
            return redirect('/admin/login');
        }

        $currentPass = $request->input('current_password');
        if ($admin->password !== $currentPass && $admin->password !== md5($currentPass)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.'])->withInput();
        }

        $admin->password = md5($request->input('new_password'));
        $admin->save();

        return redirect('/admin')->with('success', 'Password updated successfully.');
    }
}
