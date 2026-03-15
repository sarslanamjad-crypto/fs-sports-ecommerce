<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FinanceReport;
use Illuminate\Http\Request;

class FinanceReportController extends Controller
{
    public function index()
    {
        $items = FinanceReport::all();
        return view('backend.finance-report.index', compact('items'));
    }

    public function create()
    {
        return view('backend.finance-report.create');
    }

    public function store(Request $request)
    {
        FinanceReport::create($request->all());
        return redirect()->route('admin.finance-report.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = FinanceReport::findOrFail($id);
        return view('backend.finance-report.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = FinanceReport::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.finance-report.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        FinanceReport::destroy($id);
        return redirect()->route('admin.finance-report.index')->with('success', 'Deleted successfully.');
    }
}
