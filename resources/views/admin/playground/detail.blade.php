@extends('layouts.admin-app')

@section('title','操场管理')

@section('breadcrumb')
    <li><a href="{{ url('admin/playground') }}"><i class="fa fa-archive"></i>操场管理</a></li>
    <li class="active"><span><i class="fa fa-file"></i>操场管理详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <small class="pull-left">{{ $post->user->username }}</small>
                <small class="pull-right">{{ $post->created_at }}</small>
                <hr>
                <p>{{ $post->content }}</p>
                <hr>
                <a href="{{ url('admin/playground') }}" class="btn btn-danger btn-radius btn-block">返回</a>
            </div>
        </div>
    </div>
@endsection