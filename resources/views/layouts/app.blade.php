<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout" style="background-color: #5bc0de">
@include('nav')
<div class="container">
    <div class="col-md-12">
        @yield('content')
    </div>
</div>
@include('footer')


        <!-- JavaScripts -->
<script type="text/javascript" src="{{ url('js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery.pagination.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery.knob.min.js') }}"></script>
<script src="//cdn.bootcss.com/select2/4.0.2-rc.1/js/select2.min.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ url('js/main.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<script type="text/javascript">
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if(session()->has('status'))
        toastr['{{ session('status') == 'error' ? 'error' : 'success' }}']('{{ session('message') }}');
    @endif


</script>
@yield('js')
</body>
</html>
