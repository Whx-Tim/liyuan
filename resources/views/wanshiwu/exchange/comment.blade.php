<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <th><h4 class="pull-left">{{ $comment->course->user->username }}</h4><p class="pull-right">时间： {{ $comment->created_at }}</p></th>
            </thead>
            <tbody>
            <tr><td><div class="col-md-3">课程号：</div><div class="col-md-6">{{ $comment->course_number }}</div></td></tr>
            <tr><td><div class="col-md-3">课程名称：</div><div class="col-md-6">{{ $comment->name }}</div></td></tr>
            <tr><td><div class="col-md-3">任课老师：</div><div class="col-md-6">{{ $comment->teacher }}</div></td></tr>
            <tr><td><div class="col-md-3">上课时间：</div><div class="col-md-6">{{ $comment->time }}</div></td></tr>
            <tr><td><div class="col-md-3">联系电话：</div><div class="col-md-6">{{ $comment->phone }}</div></td></tr>
            <tr><td><div class="col-md-3">回帖人：</div><div class="col-md-6">{{ $comment->user->username }}</div></td></tr>
            <tr><td><div class="col-md-3">回帖时间：</div><div class="col-md-6">{{ $comment->created_at }}</div></td></tr>
            <tr><td><div class="col-md-3">状态：</div><div class="col-md-6">
                        @if($comment->accepted)
                            <button type="button" class="btn btn-radius btn-danger"><i class="fa fa-exclamation"></i>已接受</button>
                        @else
                            @if(Auth::check() && !$comment->course->condition && $comment->course->user->id == Auth::user()->id)
                                <a href="{{ url('exchange/comment/'.$comment->id) }}" class="btn btn-radius btn-success"><i class="fa fa-check"></i>未接受</a>
                            @else
                                <button type="button" class="btn btn-radius btn-success"><i class="fa fa-check"></i>未接受</button>
                            @endif
                        @endif
                    </div></td></tr>
            <tr><td class="actions-hover actions-fade">
                    @if(Auth::check() && auth()->user()->isAdmin())
                        <a data-id="{{ $comment->id }}" href="javascript:;" onclick="DeleteComment($(this))"><i class="fa fa-trash-o"></i>仅发帖人和管理员可见</a>
                    @endif
                </td></tr>
            </tbody>
        </table>
    </div>
</div>

@if(Auth::check())
    <script type="text/javascript">
        function DeleteComment(el) {
            if(confirm("确定要删除该条信息吗？")){
                $.ajax({
                    url: "{{ url('exchange/comment') }}" + "/" + el.attr('data-id'),
                    type: "DELETE",
                    data: {_token: "{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (json) {
                        if(json.status == "success") {
                            alert('删除成功！');
                            window.location.href = "{{ url()->current() }}";
                        } else {
                            alert('删除失败，请重试');
                        }
                    }
                })
            }
        }
    </script>
@endif