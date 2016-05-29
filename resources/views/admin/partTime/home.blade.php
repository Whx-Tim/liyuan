@extends('layouts.admin-app')

@section('title','兼职信息')

@section('breadcrumb')
    <li class="active"><span><i class="fa fa-archive"></i>兼职信息</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <table class="table table-hover">
                <thead>
                <th>ID</th>
                <th>标题</th>
                <th>招募状态</th>
                <th>发布用户</th>
                <th>操作</th>
                </thead>
                <tbody>
                @foreach($partTimes as $partTime)
                    <tr>
                        <td>{{ $partTime->id }}</td>
                        <td><a href="{{ url('admin/partTime/detail/'.$partTime->id) }}">{{ $partTime->title }}</a></td>
                        <td>
                            @if($partTime->condition)
                                招募中
                            @else
                                招募结束
                            @endif
                        </td>
                        <td>{{ $partTime->user->username }}</td>
                        <td>
                            <a href="{{ url('admin/partTime/edit/'.$partTime->id) }}" class="btn btn-primary btn-radius pull-left">编辑</a>
                            <form action="{{ url('admin/partTime/'.$partTime->id) }}" method="post" role="form">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger btn-radius pull-left">删除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="home-pagination">
                {!! $partTimes->render() !!}
            </div>
        </div>
    </div>
@endsection