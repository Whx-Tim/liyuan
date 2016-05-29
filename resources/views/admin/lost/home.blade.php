@extends('layouts.admin-app')

@section('title','失物管理')

@section('breadcrumb')
    <li class="active"><span><i class="fa fa-archive"></i>失物管理</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>标题</th>
            <th>物品类型</th>
            <th>发布用户</th>
            <th>操作</th>
            </thead>
            <tbody>
            @foreach($losts as $lost)
                <tr>
                    <td>{{ $lost->id }}</td>
                    <td><a href="{{ url('admin/lost/detail/'.$lost->id) }}">{{ $lost->info }}</a></td>
                    <td>{{ $lost->type }}</td>
                    <td>{{ $lost->user->username }}</td>
                    <td>
                        <a href="{{ url('admin/lost/edit/'.$lost->id) }}" class="btn btn-primary btn-radius pull-left">编辑</a>
                        <form action="{{ url('admin/lost/'.$lost->id) }}" method="post" role="form">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-radius btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="home-pagination">
            {!! $losts->render() !!}
        </div>
    </div>
@endsection