@extends('layouts.master')
@section('title','首頁')
@section('content')
<header>
    <div class="container pt-4 text-center">
        <div class="jumbotron bg-info text-white">
            <h1 class="display-4" style="font-size: 8vmin;">{{$team->name}}</h1>
            <p class="lead" style="font-size: 4vmin;">!!!大聲的喊出來!!!</p>
        </div>
    </div>
</header>
<main class="h-100">
    <div class=" container text-center ">
        <div class="row">
                <div class=" pb-3 col-12">
                    <div class="px-5 py-2 text-nowrap border border-secondary rounded d-flex align-items-stretch justify-content-center" style="font-size: 4vmin;height:200px;">
                        {!!$team->team_call!!}
                    </div>
                </div>

            
        </div>
    </div>
</main>
@endsection
