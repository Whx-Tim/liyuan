@extends('layouts.admin-app')

@section('title','快递帮取')

@section('breadcrumb')
    <li class="active"><span><i class="fa fa-archive"></i>快递帮取</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>地点</th>
            <th>公司</th>
            <th>报酬</th>
            <th>发布用户</th>
            <th>状态</th>
            <th>操作</th>
            </thead>
            <tbody>
            @foreach($transports as $transport)
                <tr>
                    <td>{{ $transport->id }}</td>
                    <td><a href="{{ url('admin/transport/detail/'.$transport->id) }}">{{ $transport->address }}</a></td>
                    <td>{{ $transport->company }}</td>
                    <td>{{ $transport->reward }}</td>
                    <td>{{ $transport->user->username }}</td>
                    <td>
                        @if($transport->condition)
                            已接受
                        @else
                            未接受
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/transport/edit/'.$transport->id) }}" class="btn btn-primary btn-radius pull-left">编辑</a>
                        <form action="{{ url('admin/transport/'.$transport->id) }}" method="post" role="form">
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