<div class="col-md-12">
    <ol class="breadcrumb breadcrumb-1">
        <h3>
            @yield('title')
        </h3>
        <hr>
        <li><a href="{{ url('admin') }}"><i class="fa fa-home"></i>后台管理</a></li>
        @yield('breadcrumb')
    </ol>
</div>