<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //首頁
    public function index(){
        $teams=Team::all();
        $data=[
            'teams'=>$teams
        ];
        return view('home',$data);
    }
    public function admin(){
        return view('admins.index');
    }
}
