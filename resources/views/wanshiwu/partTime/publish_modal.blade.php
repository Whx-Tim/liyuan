<button type="button" class="btn btn-primary btn-radius btn-block" data-toggle="modal" data-target=".partTime-modal">发布兼职信息</button>


<div class="modal fade partTime-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content colorAndRadius">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">发布兼职信息</h4>
            </div>
            <form action="{{ url('partTime') }}" method="post" class="form-horizontal" role="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label"><strong>*</strong>标题:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="请输入标题，不可为空">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label"><strong>*</strong>地址:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="请输入地址，不可为空">
                            @if($errors->has('address'))
                                <div class="help-block">
                                    <span>{{ $errors->first('address') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('salary') ? 'has-error' : '' }}">
                        <label for="salary" class="col-md-4 control-label"><strong>*</strong>薪水:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary') }}" placeholder="请输入薪水范围，可附上面议，不可为空">
                            @if($errors->has('salary'))
                                <div class="help-block">
                                    <span>{{ $errors->first('salary') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('time') ? 'has-error' : '' }}">
                        <label for="time" class="col-md-4 control-label"><strong>*</strong>工作时间:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="time" name="time" value="{{ old('time') }}" placeholder="请输入工作时间，不可为空">
                            @if($errors->has('time'))
                                <div class="help-block">
                                    <span>{{ $errors->first('time') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label"><strong>*</strong>联系电话:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="请输入联系电话，不可为空">
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
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="请输入电子邮箱，不可为空">
                            @if($errors->has('email'))
                                <div class="help-block">
                                    <span>{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('required') ? 'has-error' : '' }}">
                        <label for="required" class="col-md-4 control-label">工作要求:</label>
                        <div class="col-md-6">
                            <textarea name="required" id="required" class="form-control" cols="30" rows="10" placeholder="请输入工作要求，可以不填">{{ old('required') }}</textarea>
                            @if($errors->has('required'))
                                <div class="help-block">
                                    <span>{{ $errors->first('required') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-4 control-label">工作介绍:</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="请输入工作介绍，可以不填">{{ old('content') }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
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