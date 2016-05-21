@extends('layouts.admin-app')

@section('title','招领管理详情')

@section('breadcrumb')
    <li><a href="{{ url('admin/found') }}"><i class="fa fa-archive"></i>招领管理</a></li>
    <li class="active"><span><i class="fa fa-file"></i>招领管理详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
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
        <div class="col-md-6">
            <a href="{{ url('admin/found') }}" class="btn btn-danger btn-radius btn-block">返回</a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('admin/found/edit/'.$found->id) }}" class="btn btn-primary btn-radius btn-block">编辑</a>
        </div>
    </div>
@endsection