@extends('layouts.app')

@section('title','兼职信息详情')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <ul class="breadcrumb breadcrumb-1">
                        <li><a href="{{ url('wsw') }}"><i class="fa fa-home"></i>首页</a></li>
                        <li><a href="{{ url('partTime') }}"><i class="fa fa-archive"></i>兼职信息</a></li>
                        <li class="active"><span><i class="fa fa-book"></i>兼职信息详情</span></li>
                    </ul>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <th>
                                <h1>我是标题
                                    <button type="button" class="btn btn-danger btn-radius btn-lg pull-right" data-toggle="modal" data-target=".partTime-comment-modal">回帖</button>
                                </h1>
                                <h4>浏览次数：</h4>
                            </th>
                            </thead>
                            <tbody>
                            <tr><td><div class="col-md-3">地址：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">薪水：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">工作时间：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">工作要求：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">联系电话：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">电子邮箱：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">工作介绍：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">发帖人：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">发帖时间：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">更新时间：</div><div class="col-md-6">我是某某某</div></td></tr>
                            <tr><td><div class="col-md-3">未完成/已完成</div><div class="col-md-6"><a href="#" class="btn btn-success btn-radius"><i class="fa fa-smile-o"></i>完成</a></div></td></tr>
                            <tr><td class="actions-hover actions-fade">
                                    <a href="{{ url('partTimeEdit') }}"><i class="fa fa-pencil"></i>发帖人&管理员</a>
                                    <a href="#"><i class="fa fa-trash-o"></i>发帖人&管理员</a>
                                </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('wanshiwu.partTime.comment')
                @include('wanshiwu.partTime.comment_modal')
            </div>
        </div>
    </div>
@endsection