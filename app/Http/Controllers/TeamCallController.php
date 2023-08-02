<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamCallController extends Controller
{
    public  function index(){
        $teams=Team::all();
        $data=[
            'teams'=>$teams
        ];
        return view('teams.index',$data);
    }
    public function show(Team $team) {
        $teams=Team::all();
        $data=[
            'teams'=>$teams,
            'team'=>$team,
        ];
        
        return view('teams.show',$data);
        }
    
        public function update(Request $request, $id){
            $team=Team::find($request->id);
            $team->update([
                'name'=>$request->name,
                'team_call'=>nl2br($request->teamcall,false),
            ]);
            return redirect()->route('teamcall.show',$request->id);
        }
}
