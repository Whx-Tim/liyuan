<div style="left: -80%;margin-left: 40%;">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">发布新帖</button>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">交易信息发布</h4>
            </div>
            <form action="{{ url('sell') }}" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-md-4 control-label">标题</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" placeholder="请输入您的物品的简短介绍，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">物品名称</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="请输入物品名称，50字以内">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-md-4 control-label">物品价格</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="price" name="price" placeholder="请输入物品价格，不可为空">
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
                            <input type="text" class="form-control" id="email" name="email" placeholder="请输入您的电子邮箱，不可为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="detail" class="col-md-4 control-label">物品介绍</label>
                        <div class="col-md-6">
                            <textarea id="detail" name="detail" class="form-control" placeholder="请输入物品介绍，可以为空"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img" class="col-md-4 control-label">物品图片</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="img">
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