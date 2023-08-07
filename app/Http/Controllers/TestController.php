<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $password=User::find(6)->password;
        return Hash::check('password', $password);
        //return redirect()->route('register');
        //return view('API-test');
    }
    public function api(){
        $data='1212583';
        return response()->json(["data"=>$data]);
    }
}
