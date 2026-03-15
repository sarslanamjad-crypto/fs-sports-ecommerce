<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function index()
    {
        $items = QuizResult::all();
        return view('backend.quiz-result.index', compact('items'));
    }

    public function create()
    {
        return view('backend.quiz-result.create');
    }

    public function store(Request $request)
    {
        QuizResult::create($request->all());
        return redirect()->route('admin.quiz-result.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = QuizResult::findOrFail($id);
        return view('backend.quiz-result.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = QuizResult::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.quiz-result.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        QuizResult::destroy($id);
        return redirect()->route('admin.quiz-result.index')->with('success', 'Deleted successfully.');
    }
}
