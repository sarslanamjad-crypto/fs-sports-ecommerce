<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AuditTrail;
use Illuminate\Http\Request;

class AuditTrailController extends Controller
{
    public function index()
    {
        $items = AuditTrail::all();
        return view('backend.audit-trail.index', compact('items'));
    }

    public function create()
    {
        return view('backend.audit-trail.create');
    }

    public function store(Request $request)
    {
        AuditTrail::create($request->all());
        return redirect()->route('admin.audit-trail.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = AuditTrail::findOrFail($id);
        return view('backend.audit-trail.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = AuditTrail::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.audit-trail.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        AuditTrail::destroy($id);
        return redirect()->route('admin.audit-trail.index')->with('success', 'Deleted successfully.');
    }
}
