@extends('layouts.admin-app')

@section('title','编辑兼职信息')

@section('breadcrumb')
    <li><a href="{{ url('admin/partTime') }}"><i class="fa fa-archive"></i>兼职信息</a></li>
    <li class="active"><span><i class="fa fa-file"></i>编辑兼职信息</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ url('admin/partTime/edit/'.$partTime->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">标题:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $partTime->title }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">工作地点：</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $partTime->address }}">
                            @if($errors->has('address'))
                                <div class="help-block">
                                    <span>{{ $errors->first('address') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('salary') ? 'has-error' : '' }}">
                        <label for="salary" class="col-md-4 control-label">薪水:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="salary" name="salary" value="{{ $partTime->salary }}">
                            @if($errors->has('salary'))
                                <div class="help-block">
                                    <span>{{ $errors->first('salary') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('time') ? 'has-error' : '' }}">
                        <label for="time" class="col-md-4 control-label">工作时间:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="time" name="time" value="{{ $partTime->time }}">
                            @if($errors->has('time'))
                                <div class="help-block">
                                    <span>{{ $errors->first('time') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">联系电话:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $partTime->phone }}">
                            @if($errors->has('phone'))
                                <div class="help-block">
                                    <span>{{ $errors->first('phone') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">电子邮箱:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" value="{{ $partTime->email }}">
                            @if($errors->has('email'))
                                <div class="help-block">
                                    <span>{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('required') ? 'has-error' : '' }}">
                        <label for="required" class="col-md-4 control-label">工作要求:</label>
                        <div class="col-md-6">
                            <textarea name="required" id="required" class="form-control" cols="30" rows="10">{{ $partTime->required }}</textarea>
                            @if($errors->has('required'))
                                <div class="help-block">
                                    <span>{{ $errors->first('required') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-4 control-label">工作介绍:</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $partTime->content }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('condition') ? 'has-error' : '' }}">
                        <label for="condition" class="col-md-4 control-label">招募状态:</label>
                        <div class="col-md-6">
                            @if($partTime->condition)
                                <select class="form-control" name="condition" id="condition">
                                    <option value="{{ $partTime->condition }}" selected>招募中</option>
                                    <option value="0">招募完成</option>
                                </select>
                            @else
                                <select class="form-control" name="condition" id="condition">
                                    <option value="{{ $partTime->condition }}" selected>招募完成</option>
                                    <option value="1">招募中</option>
                                </select>
                            @endif
                            @if($errors->has('condition'))
                                <div class="help-block">
                                    <span>{{ $errors->first('condition') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <a href="{{ url('admin/partTime') }}" class="btn btn-block btn-danger btn-radius">返回</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-radius btn-block">确认修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection