@extends('layouts.master')
@section('title','小隊隊呼')
@section('content')
<header>
    <div class="container pt-4 text-center">
        <div class="jumbotron bg-info text-white">
            <h1 class="display-4" style="font-size: 8vmin;">{{$team->name}}</h1>
            <p class="lead" style="font-size: 4vmin;">!!!大聲的喊出來!!!</p>
        </div>
    </div>
</header>
<main class="h-100 container ">
    @Auth
        @if (Auth::user()->type == '1')
        <div class="d-flex justify-content-end pb-2">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editTeam" data-id={{$team->id}} data-name={{$team->name}} data-teamcall="{!! $team->team_call !!}">
                編輯
        </button>
        </div>
        @endif
    @endauth
        
    
   
    <div class="text-center ">
        <div class="row">
                <div class=" pb-3 col-12">
                    <div class="px-5 py-2 text-nowrap border border-secondary rounded d-flex align-items-stretch justify-content-center" style="font-size: 4vmin;height:200px;">
                        {!! $team->team_call !!}
                    </div>
                </div>
            
        </div>
    </div>
    <!--Model-->
    <div class="modal fade" id="editTeam" tabindex="-1" role="dialog" aria-labelledby="editTeamLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editTeamLabel">編輯隊呼</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('teamcall.update',0)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-body m-2" id='edit'>
                    <input type="hidden" class="form-control" id="id" name="id" aria-describedby="emailHelp">

                    <div class="form-group">
                        <label for="name">小隊名稱</label>
                        <input type="string" class="form-control" id="editname" name="name" placeholder="輸入隊名">
                      </div>
                    <div class="form-group">
                        <label for="email">小隊隊呼</label>
                        <textarea class="form-control" id="editteamcall" name="teamcall"></textarea>
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
            $(document).ready(function () {
                $("#editTeam").on("show.bs.modal", function (event) {
                var button = $(event.relatedTarget);
                var id = button.data("id");
                var name = button.data("name");
                var teamcall = button.data("teamcall");
                var modal = $(this);
                modal.find("#edit #editname").val(name);
                modal.find("#edit #editteamcall").text(teamcall);
                modal.find("#edit #id").val(id);
                });
            });
            
</script>
@endsection