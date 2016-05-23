@extends('layouts.app')

@section('title','招领信息')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>招领信息</h2>
                <small>失物招领</small>
            </div>
            <div class="panel-body">
                <form action="{{ url('found/search') }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="key" id="key" placeholder="请输入想要查找的信息（关键字）">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-success btn-radius"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                </form>
                @foreach($founds as $found)
                        <div class="col-md-5">
                            <div class="panel panel-success">
                                <div class="panel-heading" style="border-radius: 25px">
                                    <h4 class="panel-title">招领信息</h4>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item"><span>物品名称:</span><a href="{{ url('found/detail/'.$found->id) }}">{{ $found->name }}</a></li>
                                    <li class="list-group-item"><span>物品类型:</span>{{ $found->type }}</li>
                                    <li class="list-group-item"><span>拾获地点:</span>{{ $found->address }}</li>
                                    <li class="list-group-item"><span>放置地点:</span>{{ $found->location }}</li>
                                </ul>
                            </div>
                        </div>
                @endforeach
                <div class="col-md-12" style="text-align: center">
                    {!! $founds->render() !!}
                </div>
                <a href="{{ url('found/publish') }}" class="btn btn-primary btn-block btn-radius">发布招领信息</a>
            </div>
        </div>
    </div>
@endsection