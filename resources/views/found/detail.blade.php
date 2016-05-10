@extends('layouts.app')

@section('title','招领详情')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="breadcrumb breadcrumb-1">
                <h2>招领详情</h2>
                <hr>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                <li><a href="{{ url('found') }}"><i class="fa fa-archive"></i>招领信息</a></li>
                <li class="active"><span>招领详情</span></li>
            </div>
            <table class="table table-hover">
                <thead></thead>
                <tbody>
                <tr><td><div class="col-md-2">物品名称:</div><div class="col-md-8">{{ $found->name }}</div></td></tr>
                <tr><td><div class="col-md-2">物品类型:</div><div class="col-md-8">{{ $found->type }}</div></td></tr>
                <tr><td><div class="col-md-2">物品详情:</div><div class="col-md-8">{{ $found->info }}</div></td></tr>
                <tr><td><div class="col-md-2">物品图片:</div><div class="col-md-8"><img src="{{ $found->img }}" alt="物品图片" class="img-thumbnail"></div></td></tr>
                <tr><td><div class="col-md-2">拾获地点:</div><div class="col-md-8">{{ $found->address }}</div></td></tr>
                <tr><td><div class="col-md-2">放置地点:</div><div class="col-md-8">{{ $found->location }}</div></td></tr>
                <tr><td><div class="col-md-2">联系电话:</div><div class="col-md-8">{{ $found->phone }}</div></td></tr>
                <tr><td><div class="col-md-2">发布用户:</div><div class="col-md-8">{{ $found->user->username }}</div></td></tr>
                </tbody>
            </table>
            <hr>
            <a href="{{ url('found') }}" class="btn btn-danger btn-radius btn-block">返回</a>
        </div>
    </div>
@endsection