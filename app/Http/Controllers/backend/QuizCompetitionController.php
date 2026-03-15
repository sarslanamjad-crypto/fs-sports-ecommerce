<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuizCompetition;
use Illuminate\Http\Request;

class QuizCompetitionController extends Controller
{
    public function index()
    {
        $items = QuizCompetition::all();
        return view('backend.quiz-competition.index', compact('items'));
    }

    public function create()
    {
        return view('backend.quiz-competition.create');
    }

    public function store(Request $request)
    {
        QuizCompetition::create($request->all());
        return redirect()->route('admin.quiz-competition.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = QuizCompetition::findOrFail($id);
        return view('backend.quiz-competition.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = QuizCompetition::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.quiz-competition.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        QuizCompetition::destroy($id);
        return redirect()->route('admin.quiz-competition.index')->with('success', 'Deleted successfully.');
    }
}
