@extends('layouts.app')

@section('title','意见反馈')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>意见反馈</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('feedback') }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">标题:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-2 control-label">反馈意见:</label>
                        <div class="col-md-9">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('content') }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                    <hr>
                    <button type="submit" class="btn btn-primary btn-radius btn-block"><i class="fa fa-paper-plane-o"></i>确认反馈</button>
                </form>                
            </div>
        </div>    
    </div>
@endsection    