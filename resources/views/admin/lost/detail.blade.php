@extends('layouts.admin-app')

@section('title','失物管理详情')

@section('breadcrumb')
    <li><a href="{{ url('admin/lost') }}"><i class="fa fa-archive"></i>失物管理</a></li>
    <li class="active"><span><i class="fa fa-file"></i>失物管理详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-hover">
            <tbody>
            <tr><td><div class="col-md-2">失物信息:</div><div class="col-md-8">{{ $lost->info }}</div></td></tr>
            <tr><td><div class="col-md-2">失物类型:</div><div class="col-md-8">{{ $lost->type }}</div></td></tr>
            <tr><td><div class="col-md-2">失物详情:</div><div class="col-md-8">{{ $lost->content }}</div></td></tr>
            <tr><td><div class="col-md-2">遗失地点:</div><div class="col-md-8">{{ $lost->address }}</div></td></tr>
            <tr><td><div class="col-md-2">联系电话:</div><div class="col-md-8">{{ $lost->phone }}</div></td></tr>
            <tr><td><div class="col-md-2">发布用户:</div><div class="col-md-8">{{ $lost->user->username }}</div></td></tr>
            <tr><td><div class="col-md-2">发布时间:</div><div class="col-md-8">{{ $lost->created_at }}</div></td></tr>
            </tbody>
        </table>
        <hr>
        <div class="col-md-6">
            <a href="{{ url('admin/lost') }}" class="btn btn-danger btn-radius btn-block">返回</a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('admin/lost/edit/'.$lost->id) }}" class="btn btn-primary btn-radius btn-block">编辑</a>
        </div>
    </div>
@endsection