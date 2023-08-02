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
        return redirect()->route('team.index');
        }
}
