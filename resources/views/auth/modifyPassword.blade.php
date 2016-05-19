@extends('layouts.app')

@section('title','修改密码')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>修改密码</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('modifyPassword/'.Auth::user()->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('old_password') ? 'has-error' : '' }}">
                        <label for="old_password" class="col-md-3 control-label">原密码:</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="old_password" name="old_password" value="">
                            @if($errors->has('old_password'))
                                <div class="help-block">
                                    <span>{{ $errors->first('old_password') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="col-md-3 control-label">新的密码:</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password" value="">
                            @if($errors->has('password'))
                                <div class="help-block">
                                    <span>{{ $errors->first('password') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="password_confirmation" class="col-md-3 control-label">确认新的密码:</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                            @if($errors->has('password_confirmation'))
                                <div class="help-block">
                                    <span>{{ $errors->first('password_confirmation') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success btn-block btn-radius">确认修改</button>
                </form>
            </div>
        </div>    
    </div>
@endsection    