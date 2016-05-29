@extends('layouts.app')

@section('title','首页')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <p class="lead text-muted">公文通</p>
        <div class="lt-tabs">
            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs">
                    <li><a href="#tab1" data-toggle="tab">学子天地</a></li>
                    <li><a href="#tab2" data-toggle="tab">校园生活</a></li>
                    <li><a href="#tab3" data-toggle="tab">行政通知</a></li>
                    <li><a href="#tab4" data-toggle="tab">周边信息</a></li>
                    <li><a href="#tab5" data-toggle="tab">重要通知</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane">
                        <ul>
                            @foreach($info_1 as $info)
                                <li><a href="{{ url('info/detail/'.$info->id) }}">{{ $info->title }}<small class="pull-right">{{ $info->created_at }}</small></a></li>
                            @endforeach
                            <div class="home-pagination">
                                {!! $info_1->render() !!}
                            </div>
                        </ul>
                    </div>
                    <div id="tab2" class="tab-pane">
                        <ul>
                            @foreach($info_2 as $info)
                                <li><a href="{{ url('info/detail/'.$info->id) }}">{{ $info->title }}<small class="pull-right">{{ $info->created_at }}</small></a></li>
                            @endforeach
                            <div class="home-pagination">
                                {!! $info_2->render() !!}
                            </div>
                        </ul>
                    </div>
                    <div id="tab3" class="tab-pane">
                        <ul>
                            @foreach($info_3 as $info)
                                <li><a href="{{ url('info/detail/'.$info->id) }}">{{ $info->title }}<small class="pull-right">{{ $info->created_at }}</small></a></li>
                            @endforeach
                            <div class="home-pagination">
                                {!! $info_3->render() !!}
                            </div>
                        </ul>
                    </div>
                    <div id="tab4" class="tab-pane">
                        <ul>
                            @foreach($info_4 as $info)
                                <li><a href="{{ url('info/detail/'.$info->id) }}">{{ $info->title }}<small class="pull-right">{{ $info->created_at }}</small></a></li>
                            @endforeach
                            <div class="home-pagination">
                                {!! $info_4->render() !!}
                            </div>
                        </ul>
                    </div>
                    <div id="tab5" class="tab-pane active">
                        <ul>
                            @foreach($info_5 as $info)
                                <li><a href="{{ url('info/detail/'.$info->id) }}">{{ $info->title }}<small class="pull-right">{{ $info->created_at }}</small></a></li>
                            @endforeach
                            <div class="home-pagination">
                                {!! $info_5->render() !!}
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    兼职信息 <small class="pull-right"><a href="{{ url('partTime') }}">更多</a></small>
                </div>
                <div class="panel-body" style="height: 200px">
                    <ul>
                        @foreach($partTimes as $partTime)
                            <li><a href="{{ url('partTime/detail/'.$partTime->id) }}">{{ $partTime->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    课程交换 <small class="pull-right"><a href="{{ url('exchange') }}">更多</a></small>
                </div>
                <div class="panel-body" style="height: 200px">
                    <ul>
                        @foreach($courses as $course)
                            <li><a href="{{ url('exchange/detail/'.$course->id) }}">{{ $course->name }}换{{ $course->want_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">二手交易 <small class="pull-right"><a href="{{ url('sell') }}">更多</a></small></div>
                <div class="panel-body" style="height: 200px;">
                    <ul>
                        @foreach($sells as $sell)
                            <li><a href="{{ url('sell/detail/'.$sell->id) }}">{{ $sell->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">招领信息 <small class="pull-right"><a href="{{ url('found') }}">更多</a></small></div>
                <div class="panel-body" style="height: 200px;">
                    <ul>
                        @foreach($founds as $found)
                            <li><a href="{{ url('found/detail/'.$found->id) }}">{{ $found->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">失物信息 <small class="pull-right"><a href="{{ url('lost') }}">更多</a></small></div>
                <div class="panel-body" style="height: 200px">
                    <ul>
                        @foreach($losts as $lost)
                            <li><a href="{{ url('lost/detail/'.$lost->id) }}">{{ $lost->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">操场 <small class="pull-right"><a href="{{ url('post') }}">更多</a></small></div>
                <div class="panel-body" style="height: 200px">
                    <ul>
                        @foreach($posts as $post)
                            <li><a href="{{ url('playground/detail/'.$post->id) }}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection
