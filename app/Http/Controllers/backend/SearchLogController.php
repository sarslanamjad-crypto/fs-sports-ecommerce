<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SearchLog;
use Illuminate\Http\Request;

class SearchLogController extends Controller
{
    public function index()
    {
        $items = SearchLog::all();
        return view('backend.search-log.index', compact('items'));
    }

    public function create()
    {
        return view('backend.search-log.create');
    }

    public function store(Request $request)
    {
        SearchLog::create($request->all());
        return redirect()->route('admin.search-log.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = SearchLog::findOrFail($id);
        return view('backend.search-log.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = SearchLog::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.search-log.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        SearchLog::destroy($id);
        return redirect()->route('admin.search-log.index')->with('success', 'Deleted successfully.');
    }
}
