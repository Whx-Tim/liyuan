<button type="button" class="btn btn-primary btn-block btn-radius" data-toggle="modal" data-target=".publish-modal">发布信息</button>
<div class="modal fade publish-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">发布快递帮取信息</h4>
            </div>
            <form action="{{ url('transport') }}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label"><strong>*</strong>快递位置:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="请输入快递位置，不可为空">
                            @if($errors->has('address'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('time') ? 'has-error' : '' }}">
                        <label for="time" class="col-md-4 control-label"><strong>*</strong>领取时间:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="time" name="time" value="{{ old('time') }}" placeholder="请输入领取时间，不可为空">
                            @if($errors->has('time'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('time') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('reward') ? 'has-error' : '' }}">
                        <label for="reward" class="col-md-4 control-label"><strong>*</strong>报酬:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="reward" name="reward" value="{{ old('reward') }}" placeholder="请输入报酬，不可为空">
                            @if($errors->has('reward'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('reward') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('company') ? 'has-error' : '' }}">
                        <label for="company" class="col-md-4 control-label"><strong>*</strong>快递所属:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}" placeholder="请输入快递所属的公司，不可为空">
                            @if($errors->has('company'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('consignee') ? 'has-error' : '' }}">
                        <label for="consignee" class="col-md-4 control-label"><strong>*</strong>收件人:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="consignee" name="consignee" value="{{ old('consignee') }}" placeholder="请输入收件人姓名，只有领取者才能看到">
                            @if($errors->has('consignee'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('consignee') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label"><strong>*</strong>手机号码:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="请输入手机号码，只有领取者才能看到">
                            @if($errors->has('phone'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('consigneeAddress') ? 'has-error' : '' }}">
                        <label for="consigneeAddress" class="col-md-4 control-label"><strong>*</strong>收件人地址:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="consigneeAddress" name="consigneeAddress" value="{{ old('consigneeAddress') }}" placeholder="请输入收件人地址，只有领取者才能看到">
                            @if($errors->has('consigneeAddress'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('consigneeAddress') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('info') ? 'has-error' : '' }}">
                        <label for="info" class="col-md-4 control-label">快递信息:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="info" name="info" value="{{ old('info') }}" placeholder="请输入快递信息，可以不填">
                            @if($errors->has('info'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('info') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                    <button type="submit" class="btn btn-primary">确认发布</button>
                </div>
            </form>
        </div>
    </div>
</div>