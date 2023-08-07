<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Fraction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminFractionController extends Controller
{
    public function index(){
        $teams=Team::all();
        $data=[
            'teams'=>$teams
        ];
        return view('admins.fractions.index',$data);
    }
    public function show(){

    }
    public function update(Request $request){
        Fraction::create([
            'user_id'=>Auth::user()->id,
            'team_id'=>$request->id,
            'fraction'=>$request->edit_fraction,
        ]);
        return redirect()->route('admin.fraction.index');
    }
    public function delete(){
        $fractions=Fraction::all();
        foreach($fractions as $fraction){
            $fraction->delete();
        }
        $teams=Team::all();
        foreach($teams as $team){
            Fraction::create([
                'user_id'=>Auth::user()->id,
                'team_id'=>$team->id,
                'fraction'=>0,
            ]);
        }
        return redirect()->route('admin.fraction.index');
    }
}
