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
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="请输入标题关键字">
                            <div class="input-group-btn">
                                <a href="#" class="btn btn-success"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <th>发布时间</th>
                            <th>标题</th>
                            <th>楼主</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($parttimes as $parttime)
                            <tr>
                                <td>{{ $parttime->created_at }}</td>
                                <td><a href="{{ url('partTimeDetail/'.$parttime->id) }}">{{ $parttime->title }}</a></td>
                                <td>{{ $parttime->user->username }}</td>
                                <td class="actions-hover actions-fade">
                                    <a href="#"><i class="fa fa-trash-o"></i>发帖人&管理员可见</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="home-pagination">
                            {!! $parttimes->render() !!}
                        </div>
                        @include('wanshiwu.partTime.publish_modal')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection