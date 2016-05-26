@extends('layouts.app')

@section('title','万事屋--兼职信息')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>兼职信息</h1>
                        <h4>万事屋</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('partTime/search') }}" class="form-horizontal" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="key" placeholder="请输入标题关键字">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-success btn-radius"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-hover">
                            <thead>
                            <th>发布时间</th>
                            <th>标题</th>
                            <th>楼主</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($partTimes as $partTime)
                            <tr>
                                <td>{{ $partTime->created_at }}</td>
                                <td><a href="{{ url('partTime/detail/'.$partTime->id) }}">{{ $partTime->title }}</a></td>
                                <td>{{ $partTime->user->username }}</td>
                                @if(Auth::check() && auth()->user()->isAdmin())
                                    <td class="actions-hover actions-fade">
                                        <a data-id="{{ $partTime->id }}" href="javascript:;" onclick="Delete($(this))"><i class="fa fa-trash-o"></i>发帖人&管理员可见</a>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="home-pagination">
                            {!! $partTimes->render() !!}
                        </div>
                        @if(Auth::check())
                            @include('wanshiwu.partTime.publish_modal')
                        @else
                            <button type="button" class="btn btn-primary btn-radius btn-block" data-toggle="popover" data-trigger="focus" data-content="登录后才能发布" data-placement="top">发布兼职信息</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('delete',['url' => 'partTime'])

@section('js')
    <script type="text/javascript">
        @if(count($errors)>0)
                toastr['error']('发布失败！请重试！');
        @endif
    </script>
@endsection