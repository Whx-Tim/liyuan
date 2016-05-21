@extends('layouts.admin-app')

@section('title','操场管理')

@section('breadcrumb')
    <li class="active"><span><i class="fa fa-archive"></i>操场管理</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>标题</th>
            <th>发布用户</th>
            <th>操作</th>
            </thead>
            <tbody>
            @foreach($playgrounds as $playground)
                <tr>
                    <td>{{ $playground->id }}</td>
                    <td><a href="{{ url('admin/playground/detail/'.$playground->id) }}">{{ $playground->title }}</a></td>
                    <td>{{ $playground->user->username }}</td>
                    <td>
                        <form action="{{ url('admin/playground/'.$playground->id) }}" method="post" role="form">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-radius">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection