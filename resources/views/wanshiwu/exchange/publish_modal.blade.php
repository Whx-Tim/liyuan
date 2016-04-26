<div style="left: -80%;margin-left: 40%;">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".exchange-publish-modal">发布新帖</button>
</div>

<div class="modal fade exchange-publish-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">课程交换信息发布</h4>
            </div>
            <form action="{{ url('exchange') }}" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exchange-name" class="col-md-4 control-label">课程名称</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="exchange-name" name="name" placeholder="请输入课程名称，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exchange-id" class="col-md-4 control-label">课程号</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="exchange-id" name="course_id" placeholder="请输入课程号，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exchange-time" class="col-md-4 control-label">上课时间</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="exchange-time" name="time" placeholder="请输入上课时间，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exchange-teacher" class="col-md-4 control-label">任课老师</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="exchange-teacher" name="teacher" placeholder="请输入任课老师姓名，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="want-name" class="col-md-4 control-label">想换的课程</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="want-name" name="want_name" placeholder="请输入想换的课程名称，可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="want-teacher" class="col-md-4 control-label">想换的任课老师</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="want-teacher" id="want_teacher" placeholder="请输入想换的任课老师的姓名，可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-md-4 control-label">联系电话</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="请输入联系电话，不可为空">
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