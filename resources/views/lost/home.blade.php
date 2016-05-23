@extends('layouts.app')

@section('title','失物信息')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>失物信息</h1>
                <small>失物招领</small>
            </div>
            <div class="panel-body">
                <form action="{{ url('lost/search') }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="key" id="key" class="form-control" placeholder="请输入关键字">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-success btn-radius"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-hover">
                    <thead>
                    <th>发布时间</th>
                    <th>标题</th>
                    <th>发布用户</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($losts as $lost)
                        <tr>
                            <td>{{ $lost->created_at }}</td>
                            <td><a href="{{ url('lost/detail/'.$lost->id) }}">{{ $lost->info }}</a></td>
                            <td>{{ $lost->user->username }}</td>
                            @if(Auth::check() && auth()->user()->isAdmin())
                                <td class="actions-hover actions-fade">
                                    <a data-id="{{ $lost->id }}" href="javascript:;" onclick="Delete($(this))"><i class="fa fa-trash-o"></i>仅管理员可见</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
                <hr>
                <a href="{{ url('lost/publish') }}" class="btn btn-primary btn-block btn-radius">发布失物信息</a>
            </div>
        </div>
    </div>
@endsection

@include('delete',['url' => 'lost'])