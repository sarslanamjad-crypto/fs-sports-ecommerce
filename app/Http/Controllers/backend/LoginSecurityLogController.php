<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LoginSecurityLog;
use Illuminate\Http\Request;

class LoginSecurityLogController extends Controller
{
    public function index()
    {
        $items = LoginSecurityLog::all();
        return view('backend.login-security-log.index', compact('items'));
    }

    public function create()
    {
        return view('backend.login-security-log.create');
    }

    public function store(Request $request)
    {
        LoginSecurityLog::create($request->all());
        return redirect()->route('admin.login-security-log.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = LoginSecurityLog::findOrFail($id);
        return view('backend.login-security-log.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = LoginSecurityLog::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.login-security-log.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        LoginSecurityLog::destroy($id);
        return redirect()->route('admin.login-security-log.index')->with('success', 'Deleted successfully.');
    }
}
