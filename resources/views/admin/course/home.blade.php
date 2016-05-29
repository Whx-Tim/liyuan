@extends('layouts.admin-app')

@section('title','课程交换')

@section('breadcrumb')
    <li class="active"><i class="fa fa-archive"></i>课程交换</li>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>课程号</th>
            <th>换课</th>
            <th>发布用户</th>
            <th>目前状态</th>
            <th>操作</th>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course_number }}</td>
                    <td><a href="{{ url('admin/course/detail/'.$course->id) }}">{{ $course->name }}换{{ $course->want_name }}</a></td>
                    <td>{{ $course->user->username }}</td>
                    <td>
                        @if($course->condition)
                            已换
                        @else
                            未换
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/course/edit/'.$course->id) }}" class="btn-primary btn-radius btn pull-left">编辑</a>
                        <form action="{{ url('admin/course/'.$course->id) }}" method="post" role="form">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn-danger btn-radius btn pull-left">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="home-pagination">
            {!! $courses->render() !!}
        </div>
    </div>
@endsection