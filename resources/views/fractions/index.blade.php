@extends('layouts.master')
@section('title','積分版')
@section('content')
<header>
    <div class="container pt-4 text-center">
        <div class="jumbotron bg-info text-white">
            <h1 class="display-4" style="font-size: 8vmin;">SOKA積分版</h1>
            <p class="lead" style="font-size: 4vmin;">分數是什麼呢?</p>
        </div>
    </div>
</header>
<main class="container">
    <table class="table text-center  table-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 50%">名稱</th>
                <th scope="col">分數</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>超級瑪利歐</td>
                <td id="fraction-one">fraction</td>
            </tr>
            <tr>
                <td>咒術迴戰 領域展開</td>
                <td id="fraction-two">fraction</td>
            </tr>
            <tr>
                <td>無所畏懼小小兵</td>
                <td id="fraction-three">fraction</td>
            </tr>
            <tr>
                <td>名偵探柯南</td>
                <td id="fraction-four">fraction</td>
            </tr>
        </tbody>
    </table>
</main>
@endsection
