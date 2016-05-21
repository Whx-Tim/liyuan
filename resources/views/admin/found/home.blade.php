@extends('layouts.admin-app')

@section('title','招领管理')

@section('breadcrumb')
    <li class="active"><span><i class="fa fa-archive"></i>招领管理</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>物品名称</th>
            <th>物品类型</th>
            <th>发布用户</th>
            <th>操作</th>
            </thead>
            <tbody>
            @foreach($founds as $found)
                <tr>
                    <td>{{ $found->id }}</td>
                    <td><a href="{{ url('admin/found/detail/'.$found->id) }}">{{ $found->name }}</a></td>
                    <td>{{ $found->type }}</td>
                    <td>{{ $found->user->username }}</td>
                    <td>
                        <a href="{{ url('admin/found/edit/'.$found->id) }}" class="btn btn-primary btn-radius pull-left">编辑</a>
                        <form action="{{ url('admin/found/'.$found->id) }}" method="post" role="form">
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
@endsection