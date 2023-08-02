<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function index(){
        $users=User::all();
        $energys=User::where('type','1')->get();
        $activities=User::where('type','2')->get();
        $data=[
            'users'=>$users,
            'energys'=>$energys,
            'activities'=>$activities
            
        ];
        return view('admins.accounts.index', $data);
    }

    public function store(Request $request){

        User::create([
            'type'=>$request->type,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->Password),
        ]);
        return redirect()->route('admin.account.index');
    }
    public function update(Request $request){
        $user=User::find($request->id);
        if($request->password==null){
            $password=$user->password;
        }else{
            $password=Hash::make($request->password);
        }
        $user->update([
            'type'=>$request->type,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
        ]);
        return redirect()->route('admin.account.index');
    }
    public function destroy(User $user){
        User::destroy($user->id);
        return redirect()->route('admin.account.index');
    }

}
