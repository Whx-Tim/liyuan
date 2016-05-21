@extends('layouts.admin-app')

@section('title','二手交易详情')

@section('breadcrumb')
    <li><a href="{{ url('admin/sell') }}"><i class="fa fa-archive"></i>二手交易</a></li>
    <li class="active"><span><i class="fa fa-file"></i>二手交易详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <ul class="list-group">
                <li class="list-group-item"><span>物品名称：</span>{{ $sell->name }}</li>
                <li class="list-group-item"><span>物品价格：</span>{{ $sell->price }}</li>
                <li class="list-group-item"><span>联系电话：</span>{{ $sell->phone }}</li>
                <li class="list-group-item"><span>电子邮箱：</span>{{ $sell->email }}</li>
                <li class="list-group-item"><span>发帖人：</span> {{ $sell->user->username }}</li>
                <li class="list-group-item"><span>发帖时间：</span>{{ $sell->created_at }}</li>
                <li class="list-group-item"><span>更新时间：</span>{{ $sell->updated_at }}</li>
                <li class="list-group-item">
                    <span>未完成/已完成：</span>
                    @if($sell->condition)
                        <button type="button" class="btn btn-danger btn-radius"><i class="fa fa-exclamation"></i>已交易</button>
                    @else
                        <button type="button" class="btn btn-success btn-radius"><i class="fa fa-check"></i>未交易</button>
                    @endif
                </li>
                <li class="list-group-item"><span>物品介绍：</span>{{ $sell->content }}</li>
                <li class="list-group-item"><span>图片：</span><img src="{{ $sell->img }}" alt="物品图片" class="img-thumbnail"></li>
            </ul>
            <div class="col-md-6"><a href="{{ url('admin/sell') }}" class="btn btn-danger btn-radius btn-block">返回</a></div>
            <div class="col-md-6"><a href="{{ url('admin/sell/edit/'.$sell->id) }}" class="btn btn-primary btn-radius btn-block">编辑</a></div>
        </div>
    </div>
@endsection