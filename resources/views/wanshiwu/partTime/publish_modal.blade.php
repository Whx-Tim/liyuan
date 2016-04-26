<div style="left: -80%;margin-left: 40%">
    <button type="button" class="btn btn-primary btn-radius" data-toggle="modal" data-target=".partTime-modal">发布兼职信息</button>
</div>

<div class="modal fade partTime-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content colorAndRadius">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">发布兼职信息</h4>
            </div>
            <form action="#" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-md-4 control-label">标题</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-4 control-label">地址</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" placeholder="请输入地址，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="salary" class="col-md-4 control-label">薪水</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="salary" name="salary" placeholder="请输入薪水的范围，不可为空，可附上面谈">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time" class="col-md-4 control-label">工作时间</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="time" name="time" placeholder="请输入工作时间，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="required" class="col-md-4 control-label">工作要求</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="required" name="required" placeholder="请输入工作要求，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-md-4 control-label">联系电话</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="请输入联系电话，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">电子邮箱</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" placeholder="请输入邮箱，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-md-4 control-label">工作介绍</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="请输入工作内容，可以为空"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                    <button type="submit" class="btn btn-primary">确认发布</button>
                </div>
            </form>
        </div>
    </div>
</div>