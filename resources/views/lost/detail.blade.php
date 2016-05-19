@extends('layouts.app')

@section('title','失物信息详情')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="breadcrumb breadcrumb-1">
                <h1>失物详情</h1>
                <hr>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                <li><a href="{{ url('lost') }}"><i class="fa fa-archive"></i>失物信息</a></li>
                <li class="active"><span>失物信息详情</span></li>
            </div>
            <table class="table table-hover">
                <tbody>
                <tr><td><div class="col-md-2">失物信息:</div><div class="col-md-8">{{ $lost->info }}</div></td></tr>
                <tr><td><div class="col-md-2">失物类型:</div><div class="col-md-8">{{ $lost->type }}</div></td></tr>
                <tr><td><div class="col-md-2">失物详情:</div><div class="col-md-8">{{ $lost->content }}</div></td></tr>
                <tr><td><div class="col-md-2">遗失地点:</div><div class="col-md-8">{{ $lost->address }}</div></td></tr>
                <tr><td><div class="col-md-2">联系电话:</div><div class="col-md-8">{{ $lost->phone }}</div></td></tr>
                <tr><td><div class="col-md-2">发布用户:</div><div class="col-md-8">{{ $lost->user->username }}</div></td></tr>
                <tr><td><div class="col-md-2">发布时间:</div><div class="col-md-8">{{ $lost->created_at }}</div></td></tr>
                @if(Auth::check() && (Auth::user()->id == $lost->user->id || auth()->user()->isAdmin()))
                    <tr><td class="actions-hover actions-fade"><a data-id="{{ $lost->id }}" href="javascript:;" onclick="Delete($(this))"><i class="fa fa-trash-o"></i>删除</a></td></tr>
                @endif
                </tbody>
            </table>
            <hr>
            <a href="{{ url('lost') }}" class="btn btn-danger btn-radius btn-block">返回</a>
        </div>
    </div>
@endsection

@include('deleteDetail',['url' => 'lost'])