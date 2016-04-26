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
<script type="text/javascript" src="{{ url('js/main.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
