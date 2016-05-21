@extends('layouts.admin-app')

@section('title','编辑失物管理')

@section('breadcrumb')
    <li><a href="{{ url('admin/lost') }}"><i class="fa fa-archive"></i>失物管理</a></li>
    <li class="active"><span><i class="fa fa-file"></i>编辑失物管理</span></li>
@stop    

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ url('admin/lost/edit/'.$lost->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('info') ? 'has-error' : '' }}">
                        <label for="info" class="col-md-4 control-label">失物信息:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="info" name="info" value="{{ $lost->info }}">
                            @if($errors->has('info'))
                                <div class="help-block">
                                    <span>{{ $errors->first('info') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                        <label for="type" class="col-md-4 control-label">物品类型:</label>
                        <div class="col-md-6">
                            <select name="type" id="type" class="form-control">
                                <option value="{{ $lost->type }}" selected>{{ $lost->type }}</option>
                                @if($lost->type == '校园卡')
                                    <option value="其他">其他</option>
                                @else
                                    <option value="校园卡">校园卡</option>
                                @endif
                            </select>
                            @if($errors->has('type'))
                                <div class="help-block">
                                    <span>{{ $errors->first('type') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">遗失地点:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $lost->address }}">
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
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $lost->phone }}">
                            @if($errors->has('phone'))
                                <div class="help-block">
                                    <span>{{ $errors->first('phone') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-4 control-label">失物详情:</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $lost->content }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <a href="{{ url('admin/lost') }}" class="btn btn-danger btn-radius btn-block">返回</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-radius btn-block">确认修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    