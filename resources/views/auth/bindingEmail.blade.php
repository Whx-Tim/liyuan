@extends('layouts.app')

@section('title','绑定邮箱')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>绑定邮箱</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('bindingEmail/'.Auth::user()->id) }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-md-3 control-label">电子邮箱:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="sendEmail" value="{{ Auth::user()->email }}">
                            @if($errors->has('email'))
                                <div class="help-block">
                                    <span>{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('emailVerified') ? 'has-error' : '' }}">
                        <label for="emailVerified" class="col-md-3 control-label">邮箱验证码:</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="emailVerified" name="emailVerified" value="{{ old('emailVerified') }}">
                                @if($errors->has('emailVerified'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('emailVerified') }}</span>
                                    </div>
                                @endif
                                <span class="input-group-btn">
                                    <a href="javascript:;" id="sendEmail" class="btn btn-primary btn-radius" role="button">发送验证码</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success btn-block">确认绑定</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        var num = 10;
        var stop;
        $(document).ready(function () {
            $("#sendEmail").click(function (ev){
                ev.preventDefault();
                function clock(){
                    num--;
                    if(num){
                        document.getElementById('sendEmail').className = 'btn btn-primary btn-radius disabled';
                        document.getElementById('sendEmail').innerHTML = num+"秒后重新发送";
                        stop = setTimeout(clock,1000);
                    } else {
                        clearTimeout(stop);
                        document.getElementById('sendEmail').className = 'btn btn-primary btn-radius';
                        document.getElementById('sendEmail').innerHTML = "发送验证码";
                        num = 10;
                    }
                }
                clock();
                $.ajax({
                    url: 'sendEmail',
                    type: 'POST',
                    data: {
                    _token: '{{ csrf_token() }}',
                    user_id: '{{ Auth::user()->id }}',
                    email: $('input[name=sendEmail]').val()
                },
                success: function (data) {
                    if(data.status == 'success'){
                        swal('发送成功！','请查看邮箱中的验证码','success');
                    }
                },
                error: function(){
                    swal('发送失败！','请重试！','warning');
                }
                });

            })
        })
    </script>
@endsection