@extends('layouts.app')

@section('title','课程交换详情页')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                        <ul class="breadcrumb breadcrumb-1">
                            <h1>课程交换详情</h1>
                            <hr>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                            <li><a href="{{ url('exchange') }}"><i class="fa fa-archive"></i>课程交换</a></li>
                            <li class="active"><span><i class="fa fa-book"></i>课程交换详情</span></li>
                        </ul>
                        <table class="table table-hover">
                            <thead>
                            <th><h1>{{ $course->name }} 换 {{ $course->want_name }}
                                    @if(Auth::check())
                                        <button type="button" class="btn btn-danger btn-radius btn-lg pull-right" data-toggle="modal" data-target=".exchange-comment-modal">回帖</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-radius btn-lg pull-right" data-toggle="popover" data-trigger="focus" data-content="请先登录" data-placement="top">回帖</button>
                                    @endif
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
                                <tr><td class="actions-hover actions-fade">
                                    @if(Auth::check() && Auth::user()->id == $course->user->id)
                                        <a href="{{ url('exchange/edit/'.$course->id) }}"><i class="fa fa-pencil"></i>发帖人和管理员可见</a>
                                        <a data-id="{{ $course->id }}" href="javascript:;" onclick="Delete($(this))"><i class="fa fa-trash-o"></i>发帖人和管理员可见</a>
                                    @endif
                                </td></tr>
                            </tbody>
                        </table>
                    @if(Auth::check())
                        @include('wanshiwu.exchange.comment_modal')
                    @endif
                    <a href="{{ url('exchange') }}" class="btn btn-danger btn-radius btn-block">返回</a>
                </div>
                @foreach($course->comments as $comment)
                @include('wanshiwu.exchange.comment')
                @endforeach
            </div>
        </div>
    </div>
@endsection

@include('deleteDetail',['url' => 'exchange'])