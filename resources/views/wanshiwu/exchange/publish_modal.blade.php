<button type="button" class="btn btn-primary btn-lg btn-radius btn-block" data-toggle="modal" data-target=".exchange-publish-modal">发布新帖</button>

<div class="modal fade exchange-publish-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">课程交换信息发布</h4>
            </div>
            <form action="{{ url('exchange') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label"><strong>*</strong>课程名称:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="请输入课程名称">
                            @if($errors->has('name'))
                                <div class="help-block">
                                    <span>{{ $errors->first('name') }}</span>
                                </div>

                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('course_number') ? 'has-error' : '' }}">
                        <label for="course_number" class="col-md-4 control-label"><strong>*</strong>课程号:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="course_number" name="course_number" value="{{ old('course_number') }}" placeholder="请输入课程号">
                            @if($errors->has('course_number'))
                                <div class="help-block">
                                    <span>{{ $errors->first('course_number') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('time') ? 'has-error' : '' }}">
                        <label for="time" class="col-md-4 control-label"><strong>*</strong>上课时间:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="time" name="time" value="{{ old('time') }}" placeholder="请输入上课时间">
                            @if($errors->has('time'))
                                <div class="help-block">
                                    <span>{{ $errors->first('time') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('teacher') ? 'has-error' : '' }}">
                        <label for="teacher" class="col-md-4 control-label"><strong>*</strong>任课老师:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="teacher" name="teacher" value="{{ old('teacher') }}" placeholder="请输入任课老师的姓名">
                            @if($errors->has('teacher'))
                                <div class="help-block">
                                    <span>{{ $errors->first('teacher') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label"><strong>*</strong>电子邮箱:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="请输入电子邮箱">
                            @if($errors->has('email'))
                                <div class="help-block">
                                    <span>{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">联系电话:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="请输入联系的电话号码">
                            @if($errors->has('phone'))
                                <div class="help-block">
                                    <span>{{ $errors->first('phone') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('want_name') ? 'has-error' : '' }}">
                        <label for="want_name" class="col-md-4 control-label">想换的课程:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="want_name" name="want_name" value="{{ old('want_name') }}" placeholder="请输入想换的课程名称">
                            @if($errors->has('want_name'))
                                <div class="help-block">
                                    <span>{{ $errors->first('want_name') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('want_teacher') ? 'has-error' : '' }}">
                        <label for="want_teacher" class="col-md-4 control-label">想换的任课老师：</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="want_teacher" name="want_teacher" value="{{ old('want_teacher') }}" placeholder="请输入想换的任课老师的姓名">
                            @if($errors->has('want_teacher'))
                                <div class="help-block">
                                    <span>{{ $errors->first('want_teacher') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                    <button type="submit" class="btn btn-primary">确认发布</button>
                </div>
            </form>
        </div>
    </div>
</div>