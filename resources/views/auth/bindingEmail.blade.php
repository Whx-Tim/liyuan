@extends('layouts.app')

@section('title','绑定邮箱')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>绑定邮箱</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('bindingEmail/'.Auth::user()->id) }}" method="post" class="form-horizontal" role="form">
                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-md-3 control-label">电子邮箱:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                            @if($errors->has('email'))
                                <div class="help-block">
                                    <span>{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('emailVerified') ? 'has-error' : '' }}">
                        <label for="emailVerified" class="col-md-3 control-label">邮箱验证码:</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="emailVerified" name="emailVerified" value="{{ old('emailVerified') }}">
                                @if($errors->has('emailVerified'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('emailVerified') }}</span>
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