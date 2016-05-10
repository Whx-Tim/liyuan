@extends('layouts.app')

@section('title','操场')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>操场</h1>
                            </div>
                            <div class="panel-body">
                                <form action="#" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="请输入标题（关键字）">
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
                                    <th>标题</th>
                                    <th>楼主</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->created_at }}</td>
                                        <td><a href="{{ url('playground/detail/'.$post->id) }}">{{ $post->title }}</a></td>
                                        <td>{{ $post->user->username }}</td>
                                        <td class="actions-hover actions-fade"><a href="{{ url('playground/delete/'.$post->id) }}"><i class="fa fa-trash-o"></i>仅管理员可见</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12" style="text-align: center">
                                    {!! $posts->render() !!}
                                </div>
                                @if(Auth::check())
                                    @include('playground.publish_modal')
                                @else
                                    <button type="button" class="btn btn-primary btn-radius btn-block" data-toggle="popover" data-trigger="focus" data-content="登录后才能发布" data-placement="top">发布新帖</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection