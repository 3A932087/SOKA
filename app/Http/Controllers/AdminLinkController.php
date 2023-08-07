<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Link;

class AdminLinkController extends Controller
{
    public function index(){
        $teams=Team::all();
        $links=Link::all();
        $data=[
            'teams'=>$teams,
            'links'=>$links,
        ];
        return view('admins.links.index',$data);
    }
    public function store(Request $request){
        Link::create([
            'name'=>$request->name,
            'URL'=>$request->url,
        ]);
        return redirect()->route('admin.link.index');
    }
    public function update(Request $request,$id){
        $link=Link::find($request->id);
        $link->update([
            'name'=>$request->name,
            'URL'=>$request->url,
        ]);

        return redirect()->route('admin.link.index');

    }
    public function delete(Link $link){
        $link->delete();
        return redirect()->route('admin.link.index');
    }
}
