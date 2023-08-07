@extends('admins.layouts.master')
@section('title','分數管理')
@section('content')
<main class="container">
    <header class="py-5">
    <h1>分數管理</h1>
    </header>
        <div class="d-flex justify-content-end pb-2">
            <button type="button" class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#editTeam">
                加分/減分
            </button>
            <button type="button" class="btn btn-outline-danger mx-2" data-toggle="modal" data-target="#reset">
                重置
        </button>
        </div>
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

      <!--Edit Model-->
    <div class="modal fade" id="editTeam" tabindex="-1" role="dialog" aria-labelledby="editTeamLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editTeamLabel">加分/減分</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('admin.fraction.update',0)}}" method="post">
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
                        <div class="input-group">
                            <div class="input-group-prepend" id="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="reduce">-</button>
                                
                            </div>
                            <input type="number" class="form-control" id="edit_fraction" name="edit_fraction" step="100" value="100" required aria-describedby="button-addon2">
                            <div class="input-group-append" id="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="add">+</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button   button type="submit" class="btn btn-outline-warning btn-sm">儲存</button>
                </div>
            </form>
        </div>
        </div>
    </div>

     <!--Reset Model-->
     <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="resetLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="resetLabel">警告!</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" id='edit'>
                    <div class="form-group">
                        <h4 for="exampleInputEmail1">確認重置所有小隊的分數?</h4>
                    </div>
                </div>
            <form action="{{route('admin.fraction.destroy')}}" method="post">
                @csrf
                @method('delete')
                <div class="modal-footer">
                    <button   button type="submit" class="btn btn-outline-danger btn-sm">重置</button>
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
        });
        $('#add').click(function(){
            var fraction = parseInt($('#edit_fraction').val());
            $('#edit_fraction').val(fraction + 100);
        });
        $('#reduce').click(function(){
            var fraction = parseInt($('#edit_fraction').val());
            $('#edit_fraction').val(fraction - 100);
        });
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