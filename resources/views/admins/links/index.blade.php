@extends('admins.layouts.master')
@section('title','連結列表')
@section('content')
<main class="container">
    <header class="py-5">
    <h1>連結列表</h1>
    </header>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#crteateLink">
        新增
      </button>
    </div>
    <table class=" table  table-hover text-center m-2">
        <thead>
            <tr>
                <th>#</th>
                <th>連結名稱</th>
                <th>連結</th>
                <th>功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
            <tr>
                <td>{{$link->id}}</td>
                <td>{{$link->name}}</td>
                <td>
                    <a href="{{$link->URL}}" class="btn btn-sm btn-outline-primary" target="_blank">測試</a>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#editLink" data-id="{{$link->id}}" data-name="{{$link->name}}" data-url="{{$link->URL}}">
                        編輯
                    </button>
                    <form action="{{route('admin.link.destroy',$link->id)}}" method="post" class="d-inline">
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
        <div class="modal fade" id="crteateLink" tabindex="-1" role="dialog" aria-labelledby="crteateLinkLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="crteateLinkLabel">新增連結</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('admin.link.store')}}" method="post">
                        @csrf
                        @method('post')
                    <div class="modal-body m-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">連結名稱</label>
                            <input type="string" class="form-control" id="name" name="name" placeholder="輸入名稱">
                          </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL</label>
                            <textarea class="form-control" id="url" name="url" placeholder="輸入URL"></textarea>
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
        <div class="modal fade" id="editLink" tabindex="-1" role="dialog" aria-labelledby="editLinkLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editLinkLabel">編輯連結</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('admin.link.update',0)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-body m-2" id='edit'>
                        <input type="hidden" class="form-control" id="id" name="id" aria-describedby="emailHelp">

                        <div class="form-group">
                            <label for="name">連結名稱</label>
                            <input type="string" class="form-control" id="editname" name="name" placeholder="輸入隊名">
                          </div>
                        <div class="form-group">
                            <label for="email">URL</label>
                            <textarea class="form-control" id="editurl" name="url"></textarea>
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
                $("#editLink").on("show.bs.modal", function (event) {
                var button = $(event.relatedTarget);
                var id = button.data("id");
                var name = button.data("name");
                var url = button.data("url");
                var modal = $(this);
                modal.find("#edit #editname").val(name);
                modal.find("#edit #editurl").text(url);
                modal.find("#edit #id").val(id);
                });
            })
            
        </script>
@endsection