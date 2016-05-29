@extends('layouts.app')

@section('title','修改个人信息')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>修改个人信息</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('modifyInfo/'.Auth::user()->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('bornDate') ? 'has-error' : '' }}">
                        <label for="bornDate" class="col-md-4 control-label">出生日期:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="bornDate" name="bornDate" value="{{ Auth::user()->bornDate }}">
                            @if($errors->has('bornDate'))
                                <div class="help-block">
                                    <span>{{ $errors->first('bornDate') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('stuNumber') ? 'has-error' : '' }}">
                        <label for="stuNumber" class="col-md-4 control-label">学号:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="stuNumber" name="stuNumber" value="{{ Auth::user()->stuNumber }}">
                            @if($errors->has('stuNumber'))
                                <div class="help-block">
                                    <span>{{ $errors->first('stuNumber') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-4 control-label">个人简介:</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ Auth::user()->content }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success btn-radius btn-block">确认修改</button>
                </form>
            </div>
        </div>
    </div>
@endsection