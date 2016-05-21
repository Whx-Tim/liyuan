@extends('layouts.admin-app')

@section('title','快递帮取详情')

@section('breadcrumb')
    <li><a href="{{ url('admin/transport') }}"><i class="fa fa-archive"></i>快递帮取</a></li>
    <li class="active"><span><i class="fa fa-file"></i>快递帮取详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
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
                        @if($transport->condition)
                            已接受
                        @else
                            未接受
                        @endif
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <hr>
        <div class="col-md-6">
            <a href="{{ url('admin/transport') }}" class="btn btn-danger btn-radius btn-block">返回</a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('admin/transport/edit/'.$transport->id) }}" class="btn btn-primary btn-radius btn-block">编辑</a>
        </div>
    </div>
@endsection