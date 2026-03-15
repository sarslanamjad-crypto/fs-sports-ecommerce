<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Team;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index(Request $request)
    {
        $Name = session('first_name') . " " . session('last_name');
        return view('backend.team', ['team' => Team::get(), 'Name' => $Name]);
    }


    public function registerTeam()
    {
        $Name = session('first_name') . " " . session('last_name');
        return view('backend.team-add', ['Name' => $Name]);
    }

    public function submitTeamRecord(Request $request)
    {
        // dd($request->all());

        $request->validate(
            [
                'fullname' => 'required|min:3',
                'email' => 'required|email',
                'designation' => 'required|min:3',
                'shortintro' => 'required|min:10',
                'longintro' => 'required|min:20',
                'linkedin' => 'required|min:6',
                'insta' => 'required|min:6',
                'twitter' => 'required|min:6',
                'facebook' => 'required|min:6',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
            ]
        );
        $ADMIN_STATUS = 1;
        $ImageName = 'fs_team_' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('backend/images/team'), $ImageName);
        $team = new Team;
        $team->fullname = $request->fullname;
        $team->email = $request->email;
        $team->designation = $request->designation;
        $team->shortintro = $request->shortintro;
        $team->longintro = $request->longintro;
        $team->linkedin = $request->linkedin;
        $team->insta = $request->insta;
        $team->twitter = $request->twitter;
        $team->facebook = $request->facebook;
        $team->image = $ImageName;
        $team->status = $ADMIN_STATUS;
        $team->save();
        return back()->withSuccess('Member Record Added Successfully');
    }

    public function editTeam($id)
    {
        $Name = session('first_name') . " " . session('last_name');

        $team = Team::where('id', $id)->first();

        return view('backend.team-edit', ['team' => $team, 'Name' => $Name]);
    }

    public function updateTeam(Request $request, $id)
    {

        $request->validate(
            [
                'fullname' => 'required|min:3',
                'email' => 'required|email',
                'designation' => 'required|min:3',
                'shortintro' => 'required|min:10',
                'longintro' => 'required|min:20',
                'linkedin' => 'required|min:6',
                'insta' => 'required|min:6',
                'twitter' => 'required|min:6',
                'facebook' => 'required|min:6',
                'image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
            ]
        );

        $team = Team::where('id', $id)->first();
        $MEMBER_STATUS = 1;
        if (isset($request->image)) {
            $ImageName = 'fs_team_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/team'), $ImageName);
            $team->image = $ImageName;
        }
        $team->fullname = $request->fullname;
        $team->email = $request->email;
        $team->designation = $request->designation;
        $team->shortintro = $request->shortintro;
        $team->longintro = $request->longintro;
        $team->linkedin = $request->linkedin;
        $team->insta = $request->insta;
        $team->twitter = $request->twitter;
        $team->facebook = $request->facebook;
        $team->status = $MEMBER_STATUS;
        $team->save();
        return back()->withSuccess('Member Record Updated Successfully');
    }


    public function deleteTeam($id)
    {
        $team = Team::where('id', $id)->first();
        $team->delete();
        return back()->withSuccess('Member Record Deleted Successfully');
    }

    public function showTeamMember($id)
    {
        $Name = session('first_name') . " " . session('last_name');
        $team = Team::where('id', $id)->first();
        return view('backend.team-member-details', ['team' => $team, 'Name' => $Name]);
    }
}
