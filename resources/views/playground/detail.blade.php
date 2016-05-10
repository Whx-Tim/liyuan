@extends('layouts.app')

@section('title',$post->title)

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
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
                <button type="button" class="btn btn-primary btn-block btn-radius" data-toggle="modal" data-target=".replie-modal">回帖</button>
            </div>
        </div>
    </div>
@endsection