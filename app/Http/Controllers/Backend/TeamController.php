<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $items = Team::all();
        return view('backend.team.index', compact('items'));
    }

    public function create()
    {
        return view('backend.team.create');
    }

    public function store(Request $request)
    {
        Team::create($request->all());
        return redirect()->route('admin.team.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = Team::findOrFail($id);
        return view('backend.team.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Team::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.team.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        Team::destroy($id);
        return redirect()->route('admin.team.index')->with('success', 'Deleted successfully.');
    }
}
