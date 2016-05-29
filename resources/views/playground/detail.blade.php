@extends('layouts.app')

@section('title',$post->title)

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-success">
            <div class="breadcrumb breadcrumb-1">
                <h1>{{ $post->title }}</h1>
                <h4>浏览次数:{{ $post->count }}</h4>
                <hr>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                <li><a href="{{ url('playground') }}"><i class="fa fa-archive"></i>操场</a></li>
                <li class="active"><span>帖子</span></li>
            </div>
            <div class="panel-body">
                <small class="pull-left">{{ $post->user->username }}</small>
                <small class="pull-right">{{ $post->created_at }}</small>
                <hr>
                <p>{{ $post->content }}</p>
                <hr>
                @if(Auth::check())
                    @include('playground.comment_modal')
                @else
                    <button type="button" class="btn btn-primary btn-block btn-radius" data-toggle="popover" data-trigger="focus" data-content="请先登录后才能回帖" data-placement="top">回帖</button>
                @endif
            </div>
            @foreach($post->replies as $reply)
                <div class="panel-heading">
                    <small class="pull-left">{{ $reply->user->username }}</small>
                    <small class="pull-right">{{ $reply->created_at }}</small>
                </div>
                <div class="panel-body">
                    <hr>
                    <p>{{ $reply->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection