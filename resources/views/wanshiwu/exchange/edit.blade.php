@extends('layouts.app')

@section('title','课程信息修改页')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <ul class="breadcrumb breadcrumb-1">
                        <h1>编辑课程交换信息</h1>
                        <hr>
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                        <li><a href="{{ url('exchange') }}"><i class="fa fa-archive"></i>课程交换</a></li>
                        <li><a href="{{ url('exchange/detail/'.$course->id) }}"><i class="fa fa-archive"></i>课程交换详情</a></li>
                        <li class="active"><span><i class="fa fa-book"></i>课程交换修改</span></li>
                    </ul>
                    <div class="panel-body">
                        <form action="{{ url('exchange/'.$course->id) }}" class="form-horizontal" method="post" role="form">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">课程名称:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}">
                                    @if($errors->has('name'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('name') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('course_number') ? 'has-error' : '' }}">
                                <label for="course_number" class="col-md-4 control-label">课程号:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="course_number" name="course_number" value="{{ $course->course_number }}">
                                    @if($errors->has('course_number'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('course_number') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('time') ? 'has-error' : '' }}">
                                <label for="time" class="col-md-4 control-label">上课时间:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="time" name="time" value="{{ $course->time }}">
                                    @if($errors->has('time'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('time') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('teacher') ? 'has-error' : '' }}">
                                <label for="teacher" class="col-md-4 control-label">任课老师:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="teacher" name="teacher" value="{{ $course->teacher }}">
                                    @if($errors->has('teacher'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('teacher') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('want_name') ? 'has-error' : '' }}">
                                <label for="want_name" class="col-md-4 control-label">想换的课程:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="want_name" name="want_name" value="{{ $course->want_name }}">
                                    @if($errors->has('want_name'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('want_name') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('want_teacher') ? 'has-error' : '' }}">
                                <label for="want_teacher" class="col-md-4 control-label">想换的老师:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="want_teacher" name="want_teacher" value="{{ $course->want_teacher }}">
                                    @if($errors->has('want_teacher'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('want_teacher') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">联系电话:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $course->phone }}">
                                    @if($errors->has('phone'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('phone') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-4 col-md-offset-2">
                                <a href="{{ url('exchange/detail/'.$course->id) }}" class="btn btn-danger btn-radius btn-block">返回</a>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary btn-radius btn-block" value="确认修改">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection