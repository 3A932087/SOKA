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
}
