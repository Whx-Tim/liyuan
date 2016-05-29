@extends('layouts.admin-app')

@section('title','编辑公告信息')

@section('breadcrumb')
    <li><a href="{{ url('admin/info') }}"><i class="fa fa-archive"></i>公告信息</a></li>
    <li class="active"><span><i class="fa fa-file"></i>编辑公告信息</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body">
                <form action="{{ url('admin/info/edit/'.$information->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">标题:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $information->title }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                        <label for="type" class="col-md-4 control-label">类型:</label>
                        <div class="col-md-6">
                            <select name="type" id="type" class="form-control">
                                @if($information->type == '学子天地')
                                    <option value="学子天地" selected>学子天地</option>
                                    <option value="校园生活">校园生活</option>
                                    <option value="行政通知">行政通知</option>
                                    <option value="周边信息">周边信息</option>
                                    <option value="重要通知">重要通知</option>
                                @elseif($information->type == '校园生活')
                                    <option value="学子天地">学子天地</option>
                                    <option value="校园生活" selected>校园生活</option>
                                    <option value="行政通知">行政通知</option>
                                    <option value="周边信息">周边信息</option>
                                    <option value="重要通知">重要通知</option>
                                @elseif($information->type == '行政通知')
                                    <option value="学子天地">学子天地</option>
                                    <option value="校园生活">校园生活</option>
                                    <option value="行政通知" selected>行政通知</option>
                                    <option value="周边信息">周边信息</option>
                                    <option value="重要通知">重要通知</option>
                                @elseif($information->type == '周边信息')
                                    <option value="学子天地">学子天地</option>
                                    <option value="校园生活">校园生活</option>
                                    <option value="行政通知">行政通知</option>
                                    <option value="周边信息" selected>周边信息</option>
                                    <option value="重要通知">重要通知</option>
                                @elseif($information->type == '重要通知')
                                    <option value="学子天地">学子天地</option>
                                    <option value="校园生活">校园生活</option>
                                    <option value="行政通知">行政通知</option>
                                    <option value="周边信息">周边信息</option>
                                    <option value="重要通知" selected>重要通知</option>
                                @endif
                            </select>
                            @if($errors->has('type'))
                                <div class="help-block">
                                    <span>{{ $errors->first('type') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-4 control-label">消息内容:</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $information->content }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-radius btn-block">确认修改</button>
                </form>
            </div>
        </div>
    </div>
@endsection