@extends('layouts.admin-app')

@section('title','公告信息详情')

@section('breadcrumb')
    <li><a href="{{ url('admin/info') }}"><i class="fa fa-archive"></i>公告信息</a></li>
    <li class="active"><span><i class="fa fa-file"></i>公告信息详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h1>{{ $information->title }}</h1>
                <small class="pull-left">浏览次数：{{ $information->count }}</small>
                <small class="pull-right">{{ $information->created_at }}</small>
                <small class="pull-right">{{ $information->type }}</small>&nbsp;
            </div>
            <div class="panel-body">
                <p>
                    {{ $information->content }}
                </p>
            </div>
        </div>
    </div>
@endsection