@extends('layouts.app')

@section('title','快递帮取')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>快递帮取</h2>
                    <h4>万事屋</h4>
                </div>
                <div class="panel-body">
                    <form action="#" method="post" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search" name="search" value="">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-success btn-radius"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    @foreach($transports as $transport)
                        @if($transport->condition)
                            @if(Auth::check() && Auth::user()->id == $transport->transport_user->user->id)
                                <a href="{{ url('transport/detail/'.$transport->id) }}">
                                    <div class="col-md-4">
                                        <div class="panel panel-success" >
                                            <div class="panel-heading" style="border-radius: 25px;">
                                                <h4 class="panel-title">快递信息</h4>
                                            </div>
                                            <ul class="list-group">
                                                <li class="list-group-item"><span>时间:</span>{{ $transport->time }}</li>
                                                <li class="list-group-item"><span>地点:</span>{{ $transport->address }}</li>
                                                <li class="list-group-item"><span>快递:</span>{{ $transport->company }}</li>
                                                <li class="list-group-item"><span>报酬:</span>{{ $transport->reward }}</li>
                                                <li class="list-group-item"><span>状态:</span>
                                                    <button class="btn btn-danger btn-radius" data-toggle="popover" data-trigger="focus" data-content="该订单已被其他用户领取了"><i class="fa fa-exclamation"></i>已接受</button>
                                                </li>
                                                @if(Auth::check() && auth()->user()->isAdmin())
                                                    <li class="list-group-item"><span>操作:</span><a data-id="{{ $transport->id }}" href="javascript:;" onclick="Delete($(this))" class="btn btn-radius btn-danger">删除</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <div class="col-md-4">
                                    <div class="panel panel-success" >
                                        <div class="panel-heading" style="border-radius: 25px;">
                                            <h4 class="panel-title">快递信息</h4>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span>时间:</span>{{ $transport->time }}</li>
                                            <li class="list-group-item"><span>地点:</span>{{ $transport->address }}</li>
                                            <li class="list-group-item"><span>快递:</span>{{ $transport->company }}</li>
                                            <li class="list-group-item"><span>报酬:</span>{{ $transport->reward }}</li>
                                            <li class="list-group-item"><span>状态:</span>
                                                <button class="btn btn-danger btn-radius" data-toggle="popover" data-trigger="focus" data-content="该订单已被其他用户领取了"><i class="fa fa-exclamation"></i>已接受</button>
                                            </li>
                                            @if(Auth::check() && auth()->user()->isAdmin())
                                                <li class="list-group-item"><span>操作:</span><a data-id="{{ $transport->id }}" href="javascript:;" onclick="Delete($(this))" class="btn btn-radius btn-danger">删除</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @else
                            {{--<a name="detail" href="javascript:;" onclick="Conform()" value="{{ $transport->id }}">--}}
                                <div class="col-md-4">
                                    <div class="panel panel-success" >
                                        <div class="panel-heading" style="border-radius: 25px;">
                                            <h4 class="panel-title">快递信息</h4>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span>时间:</span>{{ $transport->time }}</li>
                                            <li class="list-group-item"><span>地点:</span>{{ $transport->address }}</li>
                                            <li class="list-group-item"><span>快递:</span>{{ $transport->company }}</li>
                                            <li class="list-group-item"><span>报酬:</span>{{ $transport->reward }}</li>
                                            <li class="list-group-item"><span>状态:</span>
                                                <button type="button" role="button" class="btn btn-success btn-radius" data-toggle="modal" data-target=".accept{!! $transport->id !!}-modal"><i class="fa fa-check"></i>未接受</button>
                                                @include('wanshiwu.transport.accept_modal',['id' => $transport->id])
                                            </li>
                                            @if(Auth::check() && Auth::user()->isAdmin())
                                                <li class="list-group-item"><span>操作:</span><a data-id="{{ $transport->id }}" href="javascript:;" onclick="Delete($(this))" class="btn btn-radius btn-danger">删除</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            {{--</a>--}}
                        @endif
                    @endforeach
                    <div class="col-md-12" style="text-align: center">
                        {!! $transports->render() !!}
                    </div>
                    @if(Auth::check())
                        @include('wanshiwu.transport.publish_modal')
                    @else
                        <button type="button" class="btn btn-primary btn-radius btn-block" data-toggle="popover" data-trigger="focus" data-content="登录后才能发布" data-placement="top">发布订单</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@include('delete',['url' => 'transport'])
