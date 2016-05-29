@extends('layouts.admin-app')

@section('title','用户管理')

@section('breadcrumb')
    <li class="active"><span>用户管理</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>用户名</th>
            <th>注册时间</th>
            <th>操作</th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form action="{{ url('admin/user/'.$user->id) }}" method="post" role="form">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-radius">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="home-pagination">
            {!! $users->render() !!}
        </div>
    </div>
@endsection

