@extends('layouts.admin-app')

@section('title','课程交换详情')

@section('breadcrumb')
    <li><a href="{{ url('admin/course') }}"><i class="fa fa-archive"></i>课程交换</a></li>
    <li class="active"><span>课程交换详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <table class="table table-hover">
                <thead>
                <th><h1>{{ $course->name }} 换 {{ $course->want_name }}
                    </h1>
                    <ul class="list-inline">
                        <li>浏览次数:</li>
                    </ul></th>
                </thead>
                <tbody>
                <tr><td><div class="col-md-3">课程名称：</div><div class="col-md-6">{{ $course->name }}</div></td></tr>
                <tr><td><div class="col-md-3">课程号：</div><div class="col-md-6">{{ $course->course_number }}</div></td></tr>
                <tr><td><div class="col-md-3">上课时间：</div><div class="col-md-6">{{ $course->time }}</div></td></tr>
                <tr><td><div class="col-md-3">任课老师：</div><div class="col-md-6">{{ $course->teacher }}</div></td></tr>
                <tr><td><div class="col-md-3">想换的课程名称：</div><div class="col-md-6">{{ $course->want_name }}</div></td></tr>
                <tr><td><div class="col-md-3">想换的任课老师：</div><div class="col-md-6">{{ $course->want_teacher }}</div></td></tr>
                <tr><td><div class="col-md-3">联系电话：</div><div class="col-md-6">{{ $course->phone }}</div></td></tr>
                <tr><td><div class="col-md-3">电子邮箱：</div><div class="col-md-6">{{ $course->email }}</div></td></tr>
                <tr><td><div class="col-md-3">发帖人：</div><div class="col-md-6">{{ $course->user->username }}</div></td></tr>
                <tr><td><div class="col-md-3">发帖时间：</div><div class="col-md-6">{{ $course->created_at }}</div></td></tr>
                <tr><td><div class="col-md-3">更新时间：</div><div class="col-md-6">{{ $course->updated_at }}</div></td></tr>
                <tr><td><div class="col-md-3">未换/已换：</div><div class="col-md-6">
                            @if(!$course->condition)
                                <button type="button" class="btn btn-radius btn-success"><i class="fa fa-smile-o"></i>未换</button>
                            @else
                                <button type="button" class="btn btn-radius btn-danger"><i class="fa fa-sad-o"></i>已换</button>
                            @endif
                        </div>
                    </td></tr>
                </tbody>
            </table>
            <hr>
            <div class="col-md-6">
                <a href="{{ url('admin/course') }}" class="btn btn-block btn-danger btn-radius">返回</a>
            </div>
            <div class="col-md-6">
                <a href="{{ url('admin/course/edit/'.$course->id) }}" class="btn btn-block btn-primary btn-radius">编辑</a>
            </div>
        </div>
    </div>
@endsection