<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Link;


class TeamCallController extends Controller
{
    public  function index(){
        $teams=Team::all();
        $photo=Link::where('name','=','photo')->first()->URL??'#';
        $form=Link::where('name','=','form')->first()->URL??'#';
        $data=[
            'teams'=>$teams,
            'photo'=>$photo,
            'form'=>$form
        ];
        return view('teams.index',$data);
    }
    public function show(Team $team) {
        $teams=Team::all();
        $photo=Link::where('name','=','photo')->first()->URL??'#';
        $form=Link::where('name','=','form')->first()->URL??'#';
        $data=[
            'teams'=>$teams,
            'team'=>$team,
            'photo'=>$photo,
            'form'=>$form
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
