@extends('layouts.app')

@section('title','快递帮取详情')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="breadcrumb breadcrumb-1">
                <h1>快递帮取详情</h1>
                <hr>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                <li><a href="{{ url('transport') }}"><i class="fa fa-archive"></i>快递帮取</a></li>
                <li class="active"><span>快递帮取详情</span></li>
            </div>
            <table class="table table-hover">
                <thead>
                </thead>
                <tbody>
                <tr><td><div class="col-md-2">快递位置:</div><div class="col-md-8">{{ $transport->address }}</div></td></tr>
                <tr><td><div class="col-md-2">送达时间:</div><div class="col-md-8">{{ $transport->time }}</div></td></tr>
                <tr><td><div class="col-md-2">报酬:</div><div class="col-md-8">{{ $transport->reward }}</div></td></tr>
                <tr><td><div class="col-md-2">快递公司:</div><div class="col-md-8">{{ $transport->company }}</div></td></tr>
                <tr><td><div class="col-md-2">快递信息:</div><div class="col-md-8">{{ $transport->info }}</div></td></tr>
                <tr><td><div class="col-md-2">收件人:</div><div class="col-md-8">{{ $transport->consignee }}</div></td></tr>
                <tr><td><div class="col-md-2">收件人手机:</div><div class="col-md-8">{{ $transport->phone }}</div></td></tr>
                <tr><td><div class="col-md-2">收件人住址:</div><div class="col-md-8">{{ $transport->ConsigneeAddress }}</div></td></tr>
                <tr><td><div class="col-md-2">发布用户:</div><div class="col-md-8">{{ $transport->user->username }}</div></td></tr>
                <tr>
                    <td>
                        <div class="col-md-2">状态:</div><div class="col-md-8">
                            <button type="button" class="btn btn-success btn-radius"><i class="fa fa-smile-o"></i>您已接受了该订单</button>
                            <a href="{{ url('transport/cancel/'.$transport->id) }}" class="btn btn-danger btn-radius"><i class="fa fa-close"></i>取消该订单</a>
                        </div>
                    </td>
                </tr>
                <tr><td class="actions-hover actions-fade">
                        <a href="{{ url('transportEdit') }}"><i class="fa fa-pencil"></i>仅发帖者&管理员可见</a>
                        <a href="#"><i class="fa fa-trash-o">仅发帖者&管理员可见</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <hr>
            <a href="{{ url('transport') }}" class="btn btn-danger btn-radius btn-block">返回</a>
        </div>
    </div>
@endsection