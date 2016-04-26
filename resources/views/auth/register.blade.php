@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">注册</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">用户名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="请输入您的用户名">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">电子邮箱</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="请输入您的电子邮箱">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="请输入您的登录密码">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">确认密码</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="请确认您的登录密码">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">手机号码</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="请输入您的手机号码">
                                @if($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sex') ? 'has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">性别</label>
                            <div class="col-md-6">
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" name="sex" id="sex-male" value="男">
                                    <label for="sex-male">男</label>
                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <input type="radio" name="sex" id="sex-female" value="女">
                                    <label for="sex-female">女</label>
                                </div>
                                @if($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bornDate') ? 'has-error' : '' }}">
                            <label for="bornDate" class="col-md-4 control-label">出生日期</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="bornDate" id="bornDate" placeholder="请输入您的出生日期（选填）">
                                @if($errors->has('bornDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bornDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">个人简介</label>
                            <div class="col-md-6">
                                <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="请输入您的个人简介(选填)"></textarea>
                                @if($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stuNumber') ? 'has-error' : '' }}">
                            <label for="stuNumber" class="col-md-4 control-label">学号</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="stuNumber" name="stuNumber" placeholder="请输入您的学号(选填)">
                                @if($errors->has('stuNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stuNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
