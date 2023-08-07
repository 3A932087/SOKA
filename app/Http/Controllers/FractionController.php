<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Link;
use App\Models\Fraction;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class FractionController extends Controller
{
    public function index(){
        $teams=Team::all();
        $photo=Link::where('name','=','photo')->first()->URL??'#';
        $form=Link::where('name','=','form')->first()->URL??'#';;
        $data=[
            'teams'=>$teams,
            'photo'=>$photo,
            'form'=>$form
        ];
        return view('fractions.index',$data);
    }
    public function list(){
        $array=[];
        $key=0;
        
        $teams=Team::all();
        foreach ($teams as $team) {
            array_push($array, [
                'id'=>$team->id,
                'name'=>$team->name,
            ]);
            $key++;
        }

        $data=response()->json($array);
        return $data;

        //return view('fractions.create');
    }
    public function getdata(){
        
        set_time_limit(0);

        $array=[];
        $key=0;
        $teams=Team::all();
        foreach ($teams as $team) {
            $fraction_sum=0;
            $fractions=$team->fractions()->get();
            foreach ($fractions as $fraction) {
                $fraction_sum+=$fraction->fraction;
                
            };
            array_push($array, [
                    'id'=>$team->id,
                    'fraction'=>$fraction_sum,
                ]);
            $key++;
        }
        sleep(0.5);
        $data=response()->json($array);
        return $data;

    }
    public function update(Request $request){
        Fraction::create([
            'user_id'=>Auth::user()->id,
            'team_id'=>$request->id,
            'fraction'=>$request->edit_fraction,
        ]);
        return redirect()->route('fraction.index');
    }
}
