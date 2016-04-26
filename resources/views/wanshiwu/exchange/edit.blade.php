@extends('layouts.app')

@section('title','课程信息修改页')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <ul class="breadcrumb breadcrumb-1">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                        <li><a href="{{ url('exchange') }}"><i class="fa fa-archive"></i>课程交换</a></li>
                        <li><a href="{{ url('exchangeDetail') }}"><i class="fa fa-archive"></i>课程交换详情</a></li>
                        <li class="active"><span><i class="fa fa-book"></i>课程交换修改</span></li>
                    </ul>
                    <div class="panel-body">
                        <form action="#" class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">课程名称</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" value="原来的">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id" class="col-md-4 control-label">课程号</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="id" name="id" value="原来的">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-md-4 control-label">上课时间</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="time" name="time" value="原来的">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="teacher" class="col-md-4 control-label">任课老师</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="teacher" name="teacher" value="原来的">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="want-name" class="col-md-4 control-label">想换的课程</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="want-name" name="want-name" value="原来的">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="want-teacher" class="col-md-4 control-label">想换的任课老师</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="want-teacher" name="teacher" value="原来的">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">联系电话</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="phone" name="phone" value="原来的">
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                                <a href="#" class="btn btn-danger btn-radius">返回</a>
                                <input type="submit" class="btn btn-primary btn-radius pull-right" value="确认修改">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection