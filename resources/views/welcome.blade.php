@extends('layouts.app')

@section('title','首页')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                        <div id="tab1" class="tab-pane"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
