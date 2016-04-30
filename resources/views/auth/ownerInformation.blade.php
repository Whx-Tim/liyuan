@extends('layouts.app')

@section('title','个人主页')

@section('content')
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>个人主页</h2>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><span>用户名:</span>{{ $user->username }}</li>
                <li class="list-group-item"><span>电子邮箱:</span>{{ $user->email }}</li>
                <li class="list-group-item"><span>手机号码:</span>{{ $user->phone }}</li>
                <li class="list-group-item"><span>性别:</span>{{ $user->sex }}</li>
                <li class="list-group-item"><span>出生日期:</span>{{ $user->bornDate }}</li>
                <li class="list-group-item"><span>学号:</span>{{ $user->stuNumber }}</li>
                <li class="list-group-item"><span>个人简介:</span>{{ $user->content }}</li>
                <li class="list-group-item"><span>手机激活状态:</span>
                    @if($user->phoneVerified)
                        <button class="btn btn-success btn-radius"><i class="fa fa-check"></i>已激活</button>
                    @else
                        <button class="btn btn-danger btn-radius"><i class="fa fa-exclamation"></i>未激活</button>
                    @endif
                </li>
                <li class="list-group-item"><span>邮箱激活状态:</span>
                    @if($user->emailVerified)
                        <button class="btn btn-success btn-radius"><i class="fa fa-check"></i>已激活</button>
                    @else
                        <button class="btn btn-danger btn-radius"><i class="fa fa-exclamation"></i>未激活</button>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">发布的二手交易信息</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled">
                    @foreach($user->sells as $sell)
                        <li><a href="{{ url('sellDetail/'.$sell->id) }}">{{ $sell->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">发布的课程交换信息</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled">
                    @foreach($user->courses as $course)
                        <li><a href="{{ url('exchangeDetail/'.$course->id) }}">{{ $course->name }}换{{ $course->want_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">发布的兼职信息</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled">
                    @foreach($user->part_times as $parttime)
                        <li><a href="{{ url('parttimeDetail'.$parttime->id) }}">{{ $parttime->title }}</a></li>
                    @endforeach    
                </ul>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">发布的快递帮取信息</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled">
                    @foreach($user->transports as $transport)
                        <li><a href="{{ url('transportDetail/'.$transport->id) }}">{{ $transport->address }}{{ $transport->time }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">发布的失物信息</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled">
                    @foreach($user->losts as $lost)
                        <li><a href="{{ url('lostDetail/'.$lost->id) }}">{{ $lost->info }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">发布的招领信息</h4>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled">
                    @foreach($user->founds as $found)
                        <li><a href="{{ url('foundDetail/',$found->id) }}">{{ $found->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop