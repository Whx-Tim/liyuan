<div class="modal fade exchange-comment-modal" tabindex="-1" aria-labelledby="myLargerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">回复课程交换信息</h4>
            </div>
            <form action="{{ url('exchange/comment') }}" class="form-horizontal" method="post" role="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label"><strong>*</strong>课程名称:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="请输入课程名称,不可为空">
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
                            <input type="text" class="form-control" id="course_number" name="course_number" value="{{ old('course_number') }}" placeholder="请输入课程号，12位，不可为空">
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
                            <input type="text" class="form-control" id="time" name="time" value="{{ old('time') }}" placeholder="请输入上课时间，例如周一3,4节，不可为空">
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
                            <input type="text" class="form-control" id="teacher" name="teacher" value="{{ old('teacher') }}" placeholder="请输入任课老师姓名，不可为空">
                            @if($errors->has('teacher'))
                                <div class="help-block">
                                    <span>{{ $errors->first('teacher') }}</span>
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
                    <div class="form-group{{ $errors->has('notice') ? 'has-error' : '' }}">
                        <label for="notice" class="col-md-4 control-label">备注:</label>
                        <div class="col-md-6">
                            <textarea name="notice" id="notice" class="form-control" cols="30" rows="10">{{ old('notice') }}</textarea>
                            @if($errors->has('notice'))
                                <div class="help-block">
                                    <span>{{ $errors->first('notice') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                    <button type="submit" class="btn btn-primary">回复课程</button>
                </div>
            </form>
        </div>
    </div>
</div>