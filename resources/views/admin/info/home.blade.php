@extends('layouts.admin-app')

@section('title','公告信息')

@section('breadcrumb')
    <li class="active"><span><i class="fa fa-archive"></i>公告信息</span></li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="lt-tabs">
            <div class="tabbable tabs-bottom">
                <ul class="nav nav-tabs">
                    <li><a href="#tab1" data-toggle="tab">学子天地</a></li>
                    <li><a href="#tab2" data-toggle="tab">校园生活</a></li>
                    <li><a href="#tab3" data-toggle="tab">行政通知</a></li>
                    <li><a href="#tab4" data-toggle="tab">周边信息</a></li>
                    <li><a href="#tab5" data-toggle="tab">重要通知</a></li>
                    <li><a href="#tab6" data-toggle="tab">发布消息</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>标题</th>
                            <th>类型</th>
                            <th>发布时间</th>
                            <th>操作</th>
                            </thead>
                            <tbody>
                            @foreach($info_1 as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td><a href="{{ url('admin/info/detail/'.$info->id) }}">{{ $info->title }}</a></td>
                                    <td>{{ $info->type }}</td>
                                    <td>{{ $info->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/info/edit/'.$info->id) }}" class="btn btn-radius btn-primary">编辑</a>
                                        <form action="{{ url('admin/info/'.$info->id) }}" method="post" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-radius btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="home-pagination">
                            {!! $info_1->render() !!}
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>标题</th>
                            <th>类型</th>
                            <th>发布时间</th>
                            <th>操作</th>
                            </thead>
                            <tbody>
                            @foreach($info_2 as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td><a href="{{ url('admin/info/detail/'.$info->id) }}">{{ $info->title }}</a></td>
                                    <td>{{ $info->type }}</td>
                                    <td>{{ $info->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/info/edit/'.$info->id) }}" class="btn btn-radius btn-primary">编辑</a>
                                        <form action="{{ url('admin/info/'.$info->id) }}" method="post" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-radius btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="home-pagination">
                            {!! $info_2->render() !!}
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>标题</th>
                            <th>类型</th>
                            <th>发布时间</th>
                            <th>操作</th>
                            </thead>
                            <tbody>
                            @foreach($info_3 as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td><a href="{{ url('admin/info/detail/'.$info->id) }}">{{ $info->title }}</a></td>
                                    <td>{{ $info->type }}</td>
                                    <td>{{ $info->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/info/edit/'.$info->id) }}" class="btn btn-radius btn-primary">编辑</a>
                                        <form action="{{ url('admin/info/'.$info->id) }}" method="post" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-radius btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="home-pagination">
                            {!! $info_3->render() !!}
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>标题</th>
                            <th>类型</th>
                            <th>发布时间</th>
                            <th>操作</th>
                            </thead>
                            <tbody>
                            @foreach($info_4 as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td><a href="{{ url('admin/info/detail/'.$info->id) }}">{{ $info->title }}</a></td>
                                    <td>{{ $info->type }}</td>
                                    <td>{{ $info->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/info/edit/'.$info->id) }}" class="btn btn-radius btn-primary">编辑</a>
                                        <form action="{{ url('admin/info/'.$info->id) }}" method="post" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-radius btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="home-pagination">
                            {!! $info_4->render() !!}
                        </div>
                    </div>
                    <div id="tab5" class="tab-pane active">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>标题</th>
                            <th>类型</th>
                            <th>发布时间</th>
                            <th>操作</th>
                            </thead>
                            <tbody>
                            @foreach($info_5 as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td><a href="{{ url('admin/info/detail/'.$info->id) }}">{{ $info->title }}</a></td>
                                    <td>{{ $info->type }}</td>
                                    <td>{{ $info->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/info/edit/'.$info->id) }}" class="btn btn-radius btn-primary">编辑</a>
                                        <form action="{{ url('admin/info/'.$info->id) }}" method="post" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-radius btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="home-pagination">
                            {!! $info_5->render() !!}
                        </div>
                    </div>
                    <div id="tab6" class="tab-pane">
                        <form action="{{ url('admin/info/add') }}" method="post" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">标题:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
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
                                        <option value="学子天地">学子天地</option>
                                        <option value="校园生活">校园生活</option>
                                        <option value="行政通知">行政通知</option>
                                        <option value="周边信息">周边信息</option>
                                        <option value="重要通知" selected>重要通知</option>
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
                                    <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('content') }}</textarea>
                                    @if($errors->has('content'))
                                        <div class="help-block">
                                            <span>{{ $errors->first('content') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-radius btn-block btn-primary">确认发布</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection