<div style="left: -80%;margin-left: 40%;">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".playground-publish-modal">发布新帖</button>
</div>
<div class="modal fade playground-publish-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">操场帖子发布</h4>
            </div>
            <form action="#" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="playground-title" class="col-md-4 control-label">标题</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="playground-title" name="name" placeholder="请输入标题，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="playground-content" class="col-md-4 control-label">内容</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="content" id="playground-content" placeholder="请输入内容，不可为空"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="U_id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                    <button type="submit" class="btn btn-primary">确认发布</button>
                </div>
            </form>

        </div>
    </div>
</div>