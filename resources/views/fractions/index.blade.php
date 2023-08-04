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
    @auth
        @if (Auth::user()->type == '2')
            <div class="d-flex justify-content-end pb-2">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editTeam">
                        加分/減分
                </button>
            </div> 
        @endif
    @endauth
    

    <table class="table text-center  table-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 50%">名稱</th>
                <th scope="col">分數</th>
            </tr>
        </thead>
        <tbody id="fraction">
            <tr class="fraction-wait-data" style="opacity: 1; color:black">
                <td colspan="2"> loading...</td>
            </tr>
        </tbody>
    </table>

    <!--Model-->
    <div class="modal fade" id="editTeam" tabindex="-1" role="dialog" aria-labelledby="editTeamLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editTeamLabel">加分/減分</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('fraction.update',0)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-body m-2" id='edit'>
                    <div class="form-group">
                        <label for="exampleInputEmail1">小隊名稱</label>
                        <select class="form-control" id="id" name="id">
                            @foreach ($teams as $team)
                                <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">分數調整</label>
                        <input type="number" class="form-control" id="fraction" name="fraction" step="100" value="100" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button   button type="submit" class="btn btn-outline-warning btn-sm">儲存</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script> 
    $(document).ready(function(){
        $.ajax({
            url: "/api/list",
            method: 'GET',
            headers: {
                "Authorization": 'Bearer '+localStorage.getItem('token'),
            },
            success: function(res){
                $(res).each(function(index,data){
                    $('#fraction').append(
                        "<tr data-id="+data.id+">"+
                            "<td id=team-"+data.id+"-name>"+data.name+"</td>"+
                            "<td id=team-"+data.id+"-fraction>loadding....</td>"+
                        +"</tr>" 
                    ); 
                });
            getdata();

            }
        })
    });
    function getdata(){
        $.ajax({
            url: "/api/getdata",
            method: 'GET',
            headers: {
                "Authorization": 'Bearer '+localStorage.getItem('token'),
            },
            success: function(res){
                $('.fraction-wait-data').remove();
                console.log(res);
                $(res).each(function(index,data){
                    $('#team-'+data.id+'-fraction').text(data.fraction);
                });
                getdata();
            },
            error: function(){
                getdata();
            }
        });
    }
</script>
@endsection
