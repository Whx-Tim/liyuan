<div class="modal fade accept{!! $transport->id !!}-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">确认接收</h4>
            </div>
            <div class="modal-body">
                    @if(Auth::check())
                        <h4>是否确认接受该订单？</h4>
                    @else
                        <h4>请您先登录！</h4>
                    @endif
            </div>
            <div class="modal-footer">
                @if(Auth::check())
                    <div class="col-md-6">
                        <button type="button" class="btn btn-default btn-block btn-radius" data-dismiss="modal">返回</button>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ url('transport/detail/'.$id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                            <button type="submit" class="btn btn-primary btn-block btn-radius">确认接受</button>
                        </form>
                    </div>
                @else
                    <div class="col-md-12">
                        <button type="button" class="btn btn-default btn-block btn-radius" data-dismiss="modal">返回</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>