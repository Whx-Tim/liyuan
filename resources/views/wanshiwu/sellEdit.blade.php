@extends('layouts.app')

@section('title','二手交易修改页面')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <ul class="breadcrumb breadcrumb-1">
                            <li><a href="{{ url('wsw') }}"><i class="fa fa-home"></i>首页</a></li>
                            <li><a href="{{ url('sell') }}"><i class="fa fa-home"></i>二手交易</a></li>
                            <li><a href="{{ url('sellDetail') }}"><i class="fa fa-book"></i>二手交易详情</a></li>
                            <li class="active"><span><i class="fa fa-book"></i>二手交易修改</span></li>
                        </ul>
                        <div class="page-header">
                            <h1>修改</h1>
                        </div>
                        <form action="#" class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label">标题</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="title" name="title" value="原来的标题">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">物品名称</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="name" name="name" value="原来的名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-md-3 control-label">物品价格</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="price" name="price" value="原来的价格">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-3 control-label">联系电话</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="phone" name="phone" value="原来的电话">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">电子邮箱</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="email" name="email" value="原来的邮箱">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-md-3 control-label">物品介绍</label>
                                <div class="col-md-8">
                                    <textarea name="content" id="content" class="form-control" cols="30" rows="10">原来的介绍</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-3">
                                <a href="#" class="btn btn-danger pull-left">返回</a>
                                <a href="#" class="btn btn-primary pull-right">确认修改</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection