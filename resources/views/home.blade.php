@extends('layouts.master')
@section('title','首頁')
@section('content')
<header>
    <div class="container pt-4 text-center">
        <div class="jumbotron bg-info text-white">
            <h1 class="display-4" style="font-size: 8vmin;">SOKA好聲音</h1></h1>
            <p class="lead" style="font-size: 4vmin;">悠揚樂聲，伴你一生</p>
        </div>
    </div>
</header>
<main>
    <div class=" container text-center">
        <div class="row">
            <div class=" pb-3 col-md-3 col-6">
                <a href="{{route('fraction.index')}}" class="text-decoration-none">
                    <div class="p-5 text-nowrap bg-secondary rounded text-white d-flex align-items-center justify-content-center" style="font-size: 4vmin;">
                        積分版
                    </div>
                </a>
            </div>
            <div class="pb-3 col-md-3 col-6">
                <a href="{{route('teamcall.index')}}" class="text-decoration-none">
                    <div class="p-5 text-nowrap bg-secondary rounded text-white d-flex align-items-center justify-content-center" style="font-size: 4vmin;">
                        <div class="align-items-center">
                            小隊隊呼
                        </div>
                        
                    </div>
                </a>
            </div>
            <div class="pb-3 col-md-3 col-6">
                <a href="{{$photo}}" class="text-decoration-none" target="target">
                    <div class="p-5 text-nowrap bg-secondary rounded text-white d-flex align-items-center justify-content-center" style="font-size: 4vmin;">
                        美好時刻
                    </div>
                </a>
            </div>
            <div class="pb-3 col-md-3 col-6">
                <a href="{{$form}}" class="text-decoration-none" target="target">
                    <div class="p-5 text-nowrap bg-secondary rounded text-white d-flex align-items-center justify-content-center" style="font-size: 4vmin;">
                        回饋問券
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
