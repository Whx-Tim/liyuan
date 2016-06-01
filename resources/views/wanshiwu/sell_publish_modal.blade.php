<button type="button" class="btn btn-primary btn-lg btn-radius btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">发布新帖</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">交易信息发布</h4>
            </div>
            <form action="{{ url('sell') }}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label"><strong>*</strong>标题:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="请输入物品的简短介绍">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label"><strong>*</strong>物品名称:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="请输入物品的名称">
                            @if($errors->has('name'))
                                <div class="help-block">
                                    <span>{{ $errors->first('name') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('price') ? 'has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label"><strong>*</strong>物品价格:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="请输入物品的价格">
                            @if($errors->has('price'))
                                <div class="help-block">
                                    <span>{{ $errors->first('price') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label"><strong>*</strong>联系电话:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="请输入联系电话">
                            @if($errors->has('phone'))
                                <div class="help-block">
                                    <span>{{ $errors->first('phone') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label"><strong>*</strong>电子邮箱:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="请输入常用的电子邮箱">
                            @if($errors->has('email'))
                                <div class="help-block">
                                    <span>{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-4 control-label">物品介绍:</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="请输入物品的详细介绍">{{ old('content') }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('img') ? 'has-error' : '' }}">
                        <label for="img" class="col-md-4 control-label">物品图片:</label>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="img" id="img" accept="image/gif,image/jpeg,image/png,image/jpg">
                            @if($errors->has('img'))
                                <div class="help-block">
                                    <span>{{ $errors->first('img') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                    <button type="submit" class="btn btn-primary">确认发布</button>
                </div>
            </form>
        </div>
    </div>
</div>