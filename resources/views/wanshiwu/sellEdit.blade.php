@extends('layouts.app')

@section('title','二手交易修改页面')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <ul class="breadcrumb breadcrumb-1">
                        <h1>编辑二手交易页面</h1>
                        <hr>
                        <li><a href="{{ url('wsw') }}"><i class="fa fa-home"></i>首页</a></li>
                        <li><a href="{{ url('sell') }}"><i class="fa fa-home"></i>二手交易</a></li>
                        <li><a href="{{ url('sell/detail/'.$sell->id) }}"><i class="fa fa-book"></i>二手交易详情</a></li>
                        <li class="active"><span><i class="fa fa-book"></i>二手交易修改</span></li>
                    </ul>
                    <div class="panel-body">
                        <form action="{{ url('sell/'.$sell->id) }}" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">标题:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $sell->title }}">
                                    @if($errors->has('title'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('title') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">物品名称:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $sell->name }}">
                                    @if($errors->has('name'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('name') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('price') ? 'has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">物品价格:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="price" name="price" value="{{ $sell->price }}">
                                    @if($errors->has('price'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('price') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">联系电话:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $sell->phone }}">
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
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $sell->email }}">
                                    @if($errors->has('email'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('email') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">物品介绍:</label>
                                <div class="col-md-6">
                                    <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $sell->content }}</textarea>
                                    @if($errors->has('content'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('content') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('img') ? 'has-error' : '' }}">
                                <label class="col-md-4 control-label">物品图片信息:</label>
                                <div class="col-md-6">
                                    <img src="{{ $sell->img }}" alt="物品图片" class="img-thumbnail">
                                </div>
                                <label for="img" class="col-md-4 control-label">更改物品图片:</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="img" id="img" accept="image/gif,image/png,image/jpeg,image/jpg">
                                    @if($errors->has('img'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('img') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <a href="{{ url('sell/detail/'.$sell->id) }}" class="btn btn-danger btn-radius btn-block">返回</a>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-radius btn-block">确认修改</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection