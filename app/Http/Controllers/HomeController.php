<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //首頁
    public function index(){
        $teams=Team::all();
        $photo=Link::where('name','=','photo')->first()->URL??'#';
        $form=Link::where('name','=','form')->first()->URL??'#';
        $data=[
            'teams'=>$teams,
            'photo'=>$photo,
            'form'=>$form
        ];
        return view('home',$data);
    }
    public function admin(){
        return view('admins.index');
    }
}
