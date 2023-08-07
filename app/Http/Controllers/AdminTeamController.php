<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class AdminTeamController extends Controller
{
    public function index(){
        $teams=Team::all();
        $date=[
            'teams'=>$teams
        ];    
        return view('admins.teams.index',$date);
    }
    public function store(Request $request){
        Team::create([
            'name'=>$request->name,
            'team_call'=>$request->teamcall,
        ]);
        return redirect()->route('admin.team.index');
    }
    public function update(Request $request, $id){
        $team=Team::find($request->id);
        $team->update([
            'name'=>$request->name,
            'team_call'=>$request->teamcall,
        ]);
        return redirect()->route('admin.team.index');
    }
    public function destroy(Team $team){
        $team->delete();
        return redirect()->route('admin.team.index');
    }
}
