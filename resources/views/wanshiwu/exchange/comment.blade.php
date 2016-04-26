<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <th><h4 class="pull-left">{{ $comment->course->user->username }}</h4><p class="pull-right">时间： xx年xx月xx日 xx:xx:xx</p></th>
            </thead>
            <tbody>
            <tr><td><div class="col-md-3">课程号：</div><div class="col-md-6">{{ $comment->course_number }}</div></td></tr>
            <tr><td><div class="col-md-3">课程名称：</div><div class="col-md-6">{{ $comment->name }}</div></td></tr>
            <tr><td><div class="col-md-3">任课老师：</div><div class="col-md-6">{{ $comment->teacher }}</div></td></tr>
            <tr><td><div class="col-md-3">上课时间：</div><div class="col-md-6">{{ $comment->time }}</div></td></tr>
            <tr><td><div class="col-md-3">联系电话：</div><div class="col-md-6">{{ $comment->phone }}</div></td></tr>
            <tr><td><div class="col-md-3">回帖人：</div><div class="col-md-6">{{ $comment->course->user->username }}</div></td></tr>
            <tr><td><div class="col-md-3">回帖时间：</div><div class="col-md-6">{{ $comment->created_at }}</div></td></tr>
            <tr><td><div class="col-md-3">状态：</div><div class="col-md-6">
                        @if($comment->condition)
                            <button type="button" class="btn btn-radius btn-success">已接受</button>
                        @else
                            <button type="button" class="btn btn-radius btn-danger">未接受</button>
                        @endif
                    </div></td></tr>
            <tr><td class="actions-hover actions-fade"><a href="#"><i class="fa fa-trash-o"></i>仅发帖人和管理员可见</a></td></tr>
            </tbody>
        </table>
    </div>
</div>