@extends('layouts.app')

@section('title','修改个人信息')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>修改个人信息</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('editOwner/'.Auth::user()->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
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
                    <div class="form-group{{ $errors->has('bornDate') ? 'has-error' : '' }}">
                        <label for="bornDate" class="col-md-3 control-label">出生日期:</label>
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
                        <label for="stuNumber" class="col-md-3 control-label">学号:</label>
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
                        <label for="content" class="col-md-3 control-label">个人简介:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="content" name="content" value="{{ Auth::user()->content }}">
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