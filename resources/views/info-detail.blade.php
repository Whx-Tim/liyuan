@extends('layouts.app')

@section('title','通知消息')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h1>{{ $information->title }}</h1>
                <small class="pull-left">浏览次数：{{ $information->count }}</small>
                <small class="pull-right">{{ $information->created_at }}</small>
                <small class="pull-right">{{ $information->type }}</small>&nbsp;
            </div>
            <div class="panel-body">
                <p>
                    {{ $information->content }}
                </p>
            </div>
        </div>
    </div>
@endsection