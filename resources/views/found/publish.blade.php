@extends('layouts.app')

@section('title','发布招领信息')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="breadcrumb breadcrumb-1">
                <h1>发布招领信息</h1>
                <hr>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
                <li><a href="{{ url('found') }}"><i class="fa fa-archive"></i>招领信息</a></li>
                <li class="active"><span>发布招领信息</span></li>
            </div>
            <form action="{{ url('found') }}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">物品名称:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="name" value="{{  old('name') }}">
                        @if($errors->has('name'))
                            <div class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">物品类型:</label>
                    <div class="col-md-6">
                        <select class="js-example-basic-single" name="type" id="type">
                            <option value="校园卡">校园卡</option>
                            <option value="其他">其他</option>
                        </select>
                        @if($errors->has('type'))
                            <div class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">拾获地点:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                        @if($errors->has('address'))
                            <div class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('info') ? 'has-error' : '' }}">
                    <label for="info" class="col-md-4 control-label">物品详情:</label>
                    <div class="col-md-6">
                        <textarea name="info" id="info" class="form-control" cols="30" rows="10">{{ old('info') }}</textarea>
                        @if($errors->has('info'))
                            <div class="help-block">
                                <strong>{{ $errors->first('info') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('img') ? 'has-error' : '' }}">
                    <label for="img" class="col-md-4 control-label">物品图片:</label>
                    <div class="col-md-6">
                        <input type="file" name="img" id="img" accept="image/gif,image/jpg,image/png,image/jpeg">
                        @if($errors->has('img'))
                            <div class="help-block">
                                <span>{{ $errors->first('img') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('location') ? 'has-error' : '' }}">
                    <label for="location" class="col-md-4 control-label">放置地点:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                        @if($errors->has('location'))
                            <div class="help-block">
                                <strong>{{ $errors->first('location') }}</strong>
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
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                <hr>
                <button type="submit" class="btn btn-success btn-radius btn-block">确认发布</button>
            </form>
        </div>
    </div>
@endsection
