@extends('layouts.app')

@section('title','万事屋')

@section('content')
    <section class="home-section">
        <div class="container">
            <div class="row">
                <h1>万事屋</h1>
                <p>
                    掌上荔园<br />
                </p>
            </div>
        </div>
    </section>
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="lt-jumbotrons">
                        <div class="jumbotron setbgcolor-1">
                            <h1>二手交易</h1>
                            <p>二手交易简介</p>
                            <p><a target="_Blank" class="btn btn-primary btn-lg" role="button" href="{{ url('sell') }}">前往查看</a></p>
                        </div>
                        <div class="jumbotron setbgcolor">
                            <h1>课程交换</h1>
                            <p>课程交换简介</p>
                            <p><a target="_Blank" class="btn btn-warning btn-lg" role="button" href="{{ url('exchange') }}">前往换课</a></p>
                        </div>
                        <div class="jumbotron setbgcolor-1">
                            <h1>兼职信息</h1>
                            <p>兼职信息简介</p>
                            <p><a target="_Blank" class="btn btn-primary btn-lg" role="button" href="{{ url('partTime') }}">寻找兼职</a></p>
                        </div>
                        <div class="jumbotron setbgcolor">
                            <h1>快递帮取</h1>
                            <p>快递帮取简介</p>
                            <p><a target="_Blank" class="btn btn-warning btn-lg" role="button" href="{{ url('transport') }}">帮拿快递</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection