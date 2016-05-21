@extends('layouts.app')

@section('title','编辑快递帮取')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="breadcrumb breadcrumb-1">
                <h1>编辑快递帮取</h1>
                <hr>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                <li><a href="{{ url('transport') }}"><i class="fa fa-archive"></i>快递帮取</a></li>
                <li><a href="{{ url('transport/detail/'.$transport->id) }}"><i class="fa fa-file"></i>快递帮取详情</a></li>
                <li class="active"><span><i class="fa fa-pencil"></i>编辑快递帮取</span></li>
            </div>
            <div class="panel-body">
                <form action="{{ url('transport/edit/'.$transport->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">快递位置:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $transport->address }}">
                            @if($errors->has('address'))
                                <div class="help-block">
                                    <span>{{ $errors->first('address') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('time') ? 'has-error' : '' }}">
                        <label for="time" class="col-md-4 control-label">送达时间:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="time" name="time" value="{{ $transport->time }}">
                            @if($errors->has('time'))
                                <div class="help-block">
                                    <span>{{ $errors->first('time') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('reward') ? 'has-error' : '' }}">
                        <label for="reward" class="col-md-4 control-label">报酬:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="reward" name="reward" value="{{ $transport->reward }}">
                            @if($errors->has('reward'))
                                <div class="help-block">
                                    <span>{{ $errors->first('reward') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('company') ? 'has-error' : '' }}">
                        <label for="company" class="col-md-4 control-label">快递公司:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="company" name="company" value="{{ $transport->company }}">
                            @if($errors->has('company'))
                                <div class="help-block">
                                    <span>{{ $errors->first('company') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('info') ? 'has-error' : '' }}">
                        <label for="info" class="col-md-4 control-label">快递信息:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="info" name="info" value="{{ $transport->info }}">
                            @if($errors->has('info'))
                                <div class="help-block">
                                    <span>{{ $errors->first('info') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('consignee') ? 'has-error' : '' }}">
                        <label for="consignee" class="col-md-4 control-label">收件人:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="consignee" name="consignee" value="{{ $transport->consignee }}">
                            @if($errors->has('consignee'))
                                <div class="help-block">
                                    <span>{{ $errors->first('consignee') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">收件人手机:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $transport->phone }}">
                            @if($errors->has('phone'))
                                <div class="help-block">
                                    <span>{{ $errors->first('phone') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('ConsigneeAddress') ? 'has-error' : '' }}">
                        <label for="ConsigneeAddress" class="col-md-4 control-label">收件人住址:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="ConsigneeAddress" name="ConsigneeAddress" value="{{ $transport->ConsigneeAddress }}">
                            @if($errors->has('ConsigneeAddress'))
                                <div class="help-block">
                                    <span>{{ $errors->first('ConsigneeAddress') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6"><a href="{{ url('transport/detail/'.$transport->id) }}" class="btn btn-danger btn-radius btn-block">返回</a></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-radius btn-block">确认修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    