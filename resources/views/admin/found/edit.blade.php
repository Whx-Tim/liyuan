@extends('layouts.admin-app')

@section('title','编辑招领管理')

@section('breadcrumb')
    <li><a href="{{ url('admin/found') }}"><i class="fa fa-archive"></i>招领管理</a></li>
    <li class="active"><span><i class="fa fa-file"></i>编辑招领管理</span></li>
@stop    

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ url('admin/found/edit/'.$found->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">物品名称:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $found->name }}">
                            @if($errors->has('name'))
                                <div class="help-block">
                                    <span>{{ $errors->first('name') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                        <label for="type" class="col-md-4 control-label">物品类型:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="type" name="type" value="{{ $found->type }}">
                            @if($errors->has('type'))
                                <div class="help-block">
                                    <span>{{ $errors->first('type') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">拾获地点:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $found->address }}">
                            @if($errors->has('address'))
                                <div class="help-block">
                                    <span>{{ $errors->first('address') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('location') ? 'has-error' : '' }}">
                        <label for="location" class="col-md-4 control-label">放置地点:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="location" name="location" value="{{ $found->location }}">
                            @if($errors->has('location'))
                                <div class="help-block">
                                    <span>{{ $errors->first('location') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">联系电话:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $found->phone }}">
                            @if($errors->has('phone'))
                                <div class="help-block">
                                    <span>{{ $errors->first('phone') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('info') ? 'has-error' : '' }}">
                        <label for="info" class="col-md-4 control-label">物品详情:</label>
                        <div class="col-md-6">
                            <textarea name="info" id="info" class="form-control" cols="30" rows="10">{{ $found->info }}</textarea>
                            @if($errors->has('info'))
                                <div class="help-block">
                                    <span>{{ $errors->first('info') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('img') ? 'has-error' : '' }}">
                        <label class="col-md-4 control-label">物品图片:</label>
                        <div class="col-md-6">
                            <img src="{{ $found->img }}" alt="物品图片" class="img-thumbnail">
                        </div>
                        <label for="img" class="col-md-4 control-label">更换图片:</label>
                        <div class="col-md-6">
                            <input type="file" name="img" id="img" accept="image/gif,image/jpg,image/png,image/jpeg">
                            @if($errors->has('img'))
                                <div class="help-block">
                                    <span>{{ $errors->first('img') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <a href="{{ url('admin/found') }}" class="btn btn-danger btn-radius btn-block">返回</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-radius btn-block">确认修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    