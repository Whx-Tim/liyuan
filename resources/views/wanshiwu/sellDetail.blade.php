@extends('layouts.app')

@section('title','二手交易详情页')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <ul class="breadcrumb breadcrumb-1">
                            <li><a href="{{ url('wsw') }}"><i class="fa fa-home"></i>首页</a></li>
                            <li><a href="{{ url('second_hand') }}"><i class="fa fa-archive"></i>二手交易</a></li>
                            <li class="active"><span><i class="fa fa-book"></i>二手交易详情</span></li>
                        </ul>
                        <div class="page-header">
                            <h1>我是标题
                                <button type="button" class="btn btn-danger btn-radius btn-lg pull-right" data-toggle="modal" data-target=".modal-comment">回帖</button>
                            </h1>
                            <ul class="list-inline">
                                <li>时间: xx年xx月xx日 xx:xx:xx</li>
                                <li>浏览次数:</li>
                            </ul>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item"><span>物品名称：</span>{{ $sell->name }}</li>
                            <li class="list-group-item"><span>物品价格：</span>{{ $sell->price }}</li>
                            <li class="list-group-item"><span>物品介绍：</span>{{ $sell->content }}</li>
                            <li class="list-group-item"><span>联系电话：</span>{{ $sell->phone }}</li>
                            <li class="list-group-item"><span>电子邮箱：</span>{{ $sell->email }}</li>
                            <li class="list-group-item"><span>发帖人：</span> {{ $sell->user->username }}</li>
                            <li class="list-group-item"><span>发帖时间：</span>{{ $sell->created_at }}</li>
                            <li class="list-group-item"><span>更新时间：</span>{{ $sell->updated_at }}</li>
                            <li class="list-group-item"><span>未完成/已完成：</span></li>
                            <li class="list-group-item"><span>图片：</span></li>
                            <li class="list-group-item">
                                <a href="{{ url('sellEdit') }}" class="btn btn-primary btn-radius ">编辑</a>
                                <a href="#sellDelete" class="btn btn-danger btn-radius">删除</a>
                            </li>
                        </ul>
                        @include('wanshiwu.sellComment_modal')
                    </div>
                </div>
                @include('wanshiwu.sellComment')
            </div>
        </div>
    </div>
@endsection