<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //首頁
    public function index(){
        return view('home');
    }
    public function admin(){
        return view('admins.index');
    }
}
