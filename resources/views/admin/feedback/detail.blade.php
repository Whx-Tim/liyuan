@extends('layouts.admin-app')

@section('title','意见反馈详情')

@section('breadcrumb')
    <li><a href="{{ url('admin/feedback') }}"><i class="fa fa-archive"></i>意见反馈</a></li>
    <li class="active"><span><i class="fa fa-file"></i>意见反馈详情</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-hover">
            <tbody>
            <tr><td><div class="col-md-3">标题:</div><div class="col-md-9">{{ $feedback->title }}</div></td></tr>
            <tr><td><div class="col-md-3">反馈内容:</div><div class="col-md-9">{{ $feedback->content }}</div></td></tr>
            </tbody>
        </table>
        <hr>
        <div class="col-md-12">
            <a href="{{ url('admin/feedback') }}" class="btn btn-danger btn-radius btn-block">返回</a>
        </div>
    </div>
@endsection