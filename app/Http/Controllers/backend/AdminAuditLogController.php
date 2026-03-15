<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdminAuditLog;
use Illuminate\Http\Request;

class AdminAuditLogController extends Controller
{
    public function index()
    {
        $items = AdminAuditLog::all();
        return view('backend.admin-audit-log.index', compact('items'));
    }

    public function create()
    {
        return view('backend.admin-audit-log.create');
    }

    public function store(Request $request)
    {
        AdminAuditLog::create($request->all());
        return redirect()->route('admin.admin-audit-log.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = AdminAuditLog::findOrFail($id);
        return view('backend.admin-audit-log.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = AdminAuditLog::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.admin-audit-log.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        AdminAuditLog::destroy($id);
        return redirect()->route('admin.admin-audit-log.index')->with('success', 'Deleted successfully.');
    }
}
