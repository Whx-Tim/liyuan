@extends('layouts.admin-app')

@section('title','意见反馈')

@section('breadcrumb')
    <li class="active"><span><i class="fa fa-archive"></i>意见反馈</span></li>
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
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td><a href="{{ url('admin/feedback/detail/'.$feedback->id) }}">{{ $feedback->title }}</a></td>
                    <td>{{ $feedback->user->username }}</td>
                    <td>
                        <form action="{{ url('admin/feedback/'.$feedback->id) }}" method="post" role="form">
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
            {!! $feedbacks->render() !!}
        </div>
    </div>
@endsection
