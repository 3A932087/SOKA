<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('API-test');
    }
    public function api(){
        $data='1212583';
        return response()->json(["data"=>$data]);
    }
}
