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
                                    <tr>
                                        <td>我是时间</td>
                                        <td><a href="{{ url('playgroundDetail') }}">我是标题</a></td>
                                        <td>我是楼主</td>
                                        <td class="actions-hover actions-fade"><a href="#delete"><i class="fa fa-trash-o"></i>仅管理员可见</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="home-pagination">

                                </div>
                                @include('playground.publish_modal')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection