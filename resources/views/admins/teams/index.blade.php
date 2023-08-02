@extends('admins.layouts.master')
@section('title','小隊列表')
@section('content')
<main class="container">
    <header class="py-5">
    <h1>小隊列表</h1>
    </header>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#crteateTeam">
        新增
      </button>
    </div>
    <table class=" table  table-hover text-center m-2">
        <thead>
            <tr>
                <th>#</th>
                <th>小隊名稱</th>
                <th>功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <td>{{$team->id}}</td>
                <td>{{$team->name}}</td>
                <td>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#editTeam" data-id={{$team->id}} data-name={{$team->name}} data-teamcall="{!! $team->team_call !!}">
                        編輯
                    </button>
                    <form action="{{route('admin.team.destroy',$team->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">刪除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

      <!-- CreateModal -->
        <div class="modal fade" id="crteateTeam" tabindex="-1" role="dialog" aria-labelledby="crteateTeamLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="crteateTeamLabel">新增小隊</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('admin.team.store')}}" method="post">
                        @csrf
                        @method('post')
                    <div class="modal-body m-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">小隊名稱</label>
                            <input type="string" class="form-control" id="name" name="name" placeholder="輸入隊名">
                          </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">小隊隊呼</label>
                            <textarea class="form-control" id="teamcall" name="teamcall" placeholder="輸入隊呼"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button   button type="submit" class="btn btn-outline-success btn-sm">新增</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

        <!-- EditModal -->
        <div class="modal fade" id="editTeam" tabindex="-1" role="dialog" aria-labelledby="editTeamLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editTeamLabel">編輯帳號</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('admin.team.update',0)}}" method="post">
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
            })
            
        </script>
</main>

@endsection