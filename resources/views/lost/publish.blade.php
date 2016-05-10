@extends('layouts.app')

@section('title','发布失物信息')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="breadcrumb breadcrumb-1">
                <h1>发布失物信息</h1>
                <hr>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                <li><a href="{{ url('lost') }}"><i class="fa fa-archive"></i>失物信息</a></li>
                <li class="active"><span>发布失物信息</span></li>
            </div>
            <form action="{{ url('lost/add') }}" method="post" class="form-horizontal" role="form">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('info') ? 'has-error' : '' }}">
                    <label for="info" class="col-md-4 control-label">失物信息:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="info" name="info" value="{{ old('info') }}">
                        @if($errors->has('info'))
                            <div class="help-block">
                                <span>{{ $errors->first('info') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">失物类型:</label>
                    <div class="col-md-6">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-success active">
                                <input type="radio" name="type" id="options1" autocomplete="off" checked value="校园卡">校园卡
                            </label>
                            <label class="btn btn-success">
                                <input type="radio" name="type" id="options2" autocomplete="off" value="其他">其他
                            </label>
                        </div>
                        @if($errors->has('type'))
                            <div class="help-block">
                                <span>{{ $errors->first('type') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                    <label for="content" class="col-md-4 control-label">失物详情:</label>
                    <div class="col-md-6">
                        <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('content') }}</textarea>
                        @if($errors->has('content'))
                            <div class="help-block">
                                <span>{{ $errors->first('content') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">遗失地点:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                        @if($errors->has('address'))
                            <div class="help-block">
                                <span>{{ $errors->first('address') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone" class="col-md-4 control-label">联系电话:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        @if($errors->has('phone'))
                            <div class="help-block">
                                <span>{{ $errors->first('phone') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                <hr>
                <button type="submit" class="btn btn-primary btn-block btn-radius">确认发布</button>
            </form>
        </div>
    </div>
@endsection