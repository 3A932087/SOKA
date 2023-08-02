@extends('admins.layouts.master')
@section('title','帳號列表')
@section('content')
<main class="container">
    <header class="py-5">
    <h1>帳號列表</h1>
    </header>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#crteateAccount">
        新增
      </button>
    </div>

    
    <!--導覽-->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="energy-tab" data-toggle="tab" href="#energy" role="tab" aria-controls="energy" aria-selected="true">熱力部</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">活動部</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">管理員</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!--熱力部-->
        <div class="col-12 tab-pane fade show active py-3" id="energy" role="tabpanel" aria-labelledby="energy-tab">
             <table class=" table  table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>身分</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @if ($user->type == 0)
                            管理員
                            @elseif ($user->type == 1)
                            熱力部
                            @elseif ($user->type == 2)
                            活動部
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#editAccount" data-type="{{$user->type}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-id="{{$user->id}}" >
                                編輯
                            </button>
                            <form action="{{route('admin.account.destroy',$user->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">刪除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
            <table class=" table  table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>身分</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($energys as $energ)
                    <tr>
                        <td>{{$energ->id}}</td>
                        <td>{{$energ->name}}</td>
                        <td>
                            @if ($energ->type == 0)
                            管理員
                            @elseif ($energ->type == 1)
                            熱力部
                            @elseif ($energ->type == 2)
                            活動部
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#editAccount" data-type="{{$energ->type}}" data-name="{{$energ->name}}" data-email="{{$energ->email}}" data-id="{{$energ->id}}" >
                                編輯
                            </button>
                            <form action="{{route('admin.account.destroy',$energ->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">刪除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
            <table class=" table  table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>身分</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <tr>
                        <td>{{$activity->id}}</td>
                        <td>{{$activity->name}}</td>
                        <td>
                            @if ($activity->type == 0)
                            管理員
                            @elseif ($activity->type == 1)
                            熱力部
                            @elseif ($activity->type == 2)
                            活動部
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#editAccount" data-type="{{$activity->type}}" data-name="{{$activity->name}}" data-email="{{$activity->email}}" data-id="{{$activity->id}}" >
                                編輯
                            </button>
                            <form action="{{route('admin.account.destroy',$activity->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">刪除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>

      <!-- CreateModal -->
        <div class="modal fade" id="crteateAccount" tabindex="-1" role="dialog" aria-labelledby="crteateAccountlLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="crteateAccountLabel">新增帳號</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('admin.account.store')}}" method="post">
                        @csrf
                        @method('post')
                    <div class="modal-body m-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">身分</label>
                            <select class="form-control" id="type" name="type">
                                <option value="0">管理員</option>
                                <option value="1">熱力部</option>
                                <option value="2">活動部</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">使用者名稱</label>
                            <input type="string" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="輸入姓名">
                          </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">電子郵件地址</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="輸入email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
        <div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="editAccountlLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editAccountLabel">編輯帳號</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('admin.account.update',$user->id)}}" method="post">
                        @csrf
                        @method('patch')
                    <div class="modal-body m-2" id="edit">
                        <div class="form-group">
                            <label for="exampleInputEmail1">身分</label>
                            <select class="form-control" id="edtitype" name="type">
                                <option value="0" id="admin">管理員</option>
                                <option value="1">熱力部</option>
                                <option value="2">活動部</option>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="id" name="id" aria-describedby="emailHelp" placeholder="輸入姓名">

                        <div class="form-group">
                            <label for="name">使用者名稱</label>
                            <input type="string" class="form-control" id="edtiname" name="name" aria-describedby="emailHelp" placeholder="輸入姓名">
                          </div>
                        <div class="form-group">
                            <label for="email">電子郵件地址</label>
                            <input type="email" class="form-control" id="edtiemail" name="email" aria-describedby="emailHelp" placeholder="輸入email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="edtipassword" name="password" placeholder="Password">
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
                $("#editAccount").on("show.bs.modal", function (event) {
                
                var button = $(event.relatedTarget);
                var type = button.data("type");
                var name = button.data("name");
                var email = button.data("email");
                var id = button.data("id");
                var modal = $(this);
                if (type ==0){
                    modal.find("#edit option[value=0]").attr('selected','selected');
                }else if (type ==1){
                    modal.find("#edit option[value=1]").attr('selected','selected');
                }else if (type ==2){
                    modal.find("#edit option[value=2]").attr('selected','selected');
                }
                modal.find("#edit #edtiname").val(name);
                modal.find("#edit #edtiemail").val(email);
                modal.find("#edit #id").val(id);
                });
            })
            
        </script>
</main>

@endsection