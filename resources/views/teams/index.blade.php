@extends('layouts.master')
@section('title','首頁')
@section('content')
<header>
    <div class="container pt-4 text-center">
        <div class="jumbotron bg-info text-white">
            <h1 class="display-4" style="font-size: 8vmin;">參賽者列表</h1>
            <p class="lead" style="font-size: 4vmin;">今年的參賽者看起來真多啊~~</p>
        </div>
    </div>
</header>
<main>
    <div class=" container text-center">
        <div class="row">
            @foreach ($teams as $team)
                <div class=" pb-3 col-md-3 col-12">
                <a href="{{route('teamcall.show',$team->id)}}" class="text-decoration-none">
                    <div class="px-5 py-2 text-nowrap bg-secondary rounded text-white d-flex align-items-center justify-content-center" style="font-size: 4vmin;">
                        {{$team->name}}
                    </div>
                </a>
                </div>
            @endforeach
            
        </div>
    </div>
</main>
@endsection
