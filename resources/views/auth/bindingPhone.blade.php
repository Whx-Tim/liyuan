@extends('layouts.app')

@section('title','绑定手机')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>绑定手机号码</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('bindingPhone/'.Auth::user()->id) }}" method="post" class="form-horizontal" role="form">
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-3 control-label">手机号码:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                            @if($errors->has('phone'))
                                <div class="help-block">
                                    <span>{{ $errors->first('phone') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phoneVerified') ? 'has-error' : '' }}">
                        <label for="phoneVerified" class="col-md-3 control-label">手机验证码:</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="phoneVerified" name="phoneVerified" value="{{ old('phoneVerified') }}">
                                @if($errors->has('phoneVerified'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('phoneVerified') }}</span>
                                    </div>
                                @endif
                                <span class="input-group-btn">
                                    <a href="#" class="btn btn-primary btn-radius">发送验证码</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success btn-block">确认绑定</button>
                </form>
            </div>
        </div>
    </div>
@endsection