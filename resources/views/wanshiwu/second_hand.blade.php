@extends('layouts.app')

@section('title','二手交易')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>二手交易</h1>
                        <h4>万事屋</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('sell/search') }}" class="form-horizontal" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key" placeholder="请输入标题或是物品名称（关键字）">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-hover" style="text-align: left">
                            <thead>
                            <th>发布时间</th>
                            <th>标题</th>
                            <th>楼主</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($sells as $sell)
                                <tr>
                                    <td>{{ $sell->created_at }}</td>
                                    <td><a href="{{ url('sell/detail/'.$sell->id) }}">{{ $sell->name }}</a></td>
                                    <td>{{ $sell->username }}</td>
                                    @if(Auth::check() && auth()->user()->isAdmin())
                                        <td class="actions-hover actions-fade">
                                            <a data-id="{{ $sell->id }}" href="javascript:;" onclick="Delete($(this))"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="home-pagination">
                            {!! $sells->render() !!}
                        </div>
                        @if(Auth::check())
                            @include('wanshiwu.sell_publish_modal')
                        @else
                            <button type="button" class="btn btn-primary btn-block btn-radius" data-toggle="popover" data-trigger="focus" data-content="登录后才能发布" data-placement="top">发布交易信息</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('delete',['url' => 'sell'])

@section('js')
    <script type="text/javascript">
        @if(count($errors)>0)
                toastr['error']('发布失败！请重试！');
        @endif
    </script>
@endsection