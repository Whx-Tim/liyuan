@extends('layouts.app')

@section('title','万事屋--课程交换')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>课程交换</h1>
                        <h4>万事屋</h4>
                    </div>
                    <div class="panel-body">
                        <form action="#" class="form-horizontal" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="请输入标题或是课程名称（关键字）">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                            <th>发布时间</th>
                            <th>课程名称 换 想换的课程名称</th>
                            <th>楼主</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->created_at }}</td>
                                <td><a href="{{ url('exchangeDetail/'.$course->id) }}">{{ $course->name }} 换 {{ $course->want_name }}</a></td>
                                <td>{{ $course->user->username }}</td>
                                <td class="actions-hover actions-fade"><a href="#delete"><i class="fa fa-trash-o"></i>仅管理员可见</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('pagination')
                        @include('wanshiwu.exchange.publish_modal')
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection