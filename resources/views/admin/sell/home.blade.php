@extends('layouts.admin-app')

@section('title','二手交易')

@section('breadcrumb')
    <li class="active"><span><i class="fa fa-archive"></i>二手交易</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <table class="table table-hover">
                <thead>
                <th>ID</th>
                <th>标题</th>
                <th>目前状态</th>
                <th>发布用户</th>
                <th>操作</th>
                </thead>
                <tbody>
                @foreach($sells as $sell)
                    <tr>
                        <td>{{ $sell->id }}</td>
                        <td><a href="{{ url('admin/sell/detail/'.$sell->id) }}">{{ $sell->title }}</a></td>
                        <td>
                            @if($sell->condition)
                                已交易
                            @else
                                未交易
                            @endif
                        </td>
                        <td>{{ $sell->user->username }}</td>
                        <td>
                            <a href="{{ url('admin/sell/edit/'.$sell->id) }}" class="btn btn-primary btn-radius pull-left">编辑</a>
                            <form action="{{ url('admin/sell/'.$sell->id) }}" method="post" role="form">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger btn-radius pull-left">删除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection