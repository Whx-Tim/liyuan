@extends('layouts.admin-app')

@section('title','兼职信息详情')

@section('breadcrumb')
    <li><a href="{{ url('admin/partTime') }}"><i class="fa fa-archive"></i>兼职信息</a></li>
    <li class="active"><span><i class="fa fa-file"></i>兼职信息详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <table class="table table-hover">
                <thead>
                <th>
                    <h1>{{ $partTime->title }}</h1>
                    <h4>浏览次数：{{ $partTime->count }}</h4>
                </th>
                </thead>
                <tbody>
                <tr><td><div class="col-md-3">工作地点：</div><div class="col-md-6">{{ $partTime->address }}</div></td></tr>
                <tr><td><div class="col-md-3">薪水：</div><div class="col-md-6">{{ $partTime->salary }}</div></td></tr>
                <tr><td><div class="col-md-3">工作时间：</div><div class="col-md-6">{{ $partTime->time }}</div></td></tr>
                <tr><td><div class="col-md-3">工作要求：</div><div class="col-md-6">{{ $partTime->required }}</div></td></tr>
                <tr><td><div class="col-md-3">联系电话：</div><div class="col-md-6">{{ $partTime->phone }}</div></td></tr>
                <tr><td><div class="col-md-3">电子邮箱：</div><div class="col-md-6">{{ $partTime->email }}</div></td></tr>
                <tr><td><div class="col-md-3">工作介绍：</div><div class="col-md-6">{{ $partTime->content }}</div></td></tr>
                <tr><td><div class="col-md-3">发帖人：</div><div class="col-md-6">{{ $partTime->user->username }}</div></td></tr>
                <tr><td><div class="col-md-3">发帖时间：</div><div class="col-md-6">{{ $partTime->created_at }}</div></td></tr>
                <tr><td><div class="col-md-3">更新时间：</div><div class="col-md-6">{{ $partTime->updated_at }}</div></td></tr>
                <tr><td>
                        <div class="col-md-3">招募状态：</div>
                        <div class="col-md-6">
                            @if($partTime->condition)
                                <button type="button" class="btn btn-success btn-radius"><i class="fa fa-smile-o"></i>招募中</button>
                            @else
                                <button type="button" class="btn btn-danger btn-radius"><i class="fa fa-exclamation"></i>招募完成</button>
                            @endif
                        </div></td></tr>
                </tbody>
            </table>
            <hr>
            <div class="col-md-6"><a href="{{ url('admin/partTime') }}" class="btn btn-danger btn-block btn-radius">删除</a></div>
            <div class="col-md-6"><a href="{{ url('admin/partTime/edit/'.$partTime->id) }}" class="btn btn-primary btn-block btn-radius">编辑</a></div>
        </div>
    </div>
@endsection