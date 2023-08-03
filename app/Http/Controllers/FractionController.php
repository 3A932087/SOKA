<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;


class FractionController extends Controller
{
    public function index(){
        $teams=Team::all();
        $data=[
            'teams'=>$teams
        ];
        return view('fractions.index',$data);
    }
}
