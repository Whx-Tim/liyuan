<button type="button" class="btn btn-primary btn-block btn-radius" data-toggle="modal" data-target=".repliy-modal">回帖</button>
<div class="modal fade repliy-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #5bc0de;border-radius: 25px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">回帖</h4>
            </div>
            <form action="{{ url('playground/comment') }}" method="post" class="form-horizontal" role="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-4 control-label">回复内容:</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('content') }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                    <button type="submit" class="btn btn-primary">确认发布</button>
                </div>
            </form>
        </div>
    </div>
</div>