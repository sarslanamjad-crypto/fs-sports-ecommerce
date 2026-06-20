<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class AdminProjectsController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }
        $project = $query->get();
        return view('backend.projects', ['project' => $project, 'Name' => session('first_name') . " " . session('last_name')]);
    }

    public function addProject()
    {
        $Name = session('first_name') . " " . session('last_name');
        return view('backend.project-add', ['Name' => $Name]);
    }

    public function submitProjectRecord(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'title' => 'required|min:3',
                'price' => 'required|min:1',
                'details' => 'required|min:10',
                'link' => 'required|min:3',
                'category' => 'required|min:3',
                'technology' => 'required|min:3',
                'client' => 'required|min:3',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
            ]
            );
        $PROJECT_STATUS = 1;
        $ImageName = 'project_' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('backend/images/projects'), $ImageName);
        // dd($ImageName);
        $projects = new Project();
        $projects->title = $request->title;
        $projects->price = $request->price;
        $projects->details = $request->details;
        $projects->link = $request->link;
        $projects->category = $request->category;
        $projects->technology = $request->technology;
        $projects->client = $request->client;
        $projects->image = $ImageName;
        $projects->status = $PROJECT_STATUS;
        $projects->save();
        return back()->withSuccess('Project Record Added Successfully');
    }

    public function editProject($id)
    {
        // dd($id);
        $project = Project::where('id', $id)->first();
        $Name = session('first_name') . " " . session('last_name');
        return view('backend.project-edit', ['project' => $project], ['Name' => $Name] );

    }

    public function updateProject(Request $request, $id)
    {

        $request->validate(
            [
                'title' => 'required|min:3',
                'details' => 'required|min:10',
                'link' => 'required|min:3',
                'category' => 'required|min:3',
                'technology' => 'required|min:3',
                'client' => 'required|min:3',
                'image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
            ]
            );

        $team = Project::where('id', $id)->first();
        $PROJECT_STATUS = 1;
        if(isset($request->image))
        {
            $ImageName = 'fs_team_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/projects'), $ImageName);
            $team->image = $ImageName;
        }
        $team->title = $request->title;
        $team->details = $request->details;
        $team->link = $request->link;
        $team->category = $request->category;
        $team->technology = $request->technology;
        $team->client = $request->client;
        $team->status = $PROJECT_STATUS;
        $team->save();
        return back()->withSuccess('Project Record Updated Successfully');
    }


    public function deleteProject($id)
    {
        $project = Project::where('id', $id)->first();
        $project->delete();
        return back()->withSuccess('Member Record Deleted Successfully');
    }

    // public function showTeamMember($id)
    // {
    //     $team = Project::where('id', $id)->first();
    //     return view('backend.team-member-details', ['team' => $team]);
    // }


}
