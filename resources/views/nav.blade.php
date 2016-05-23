<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                掌上荔园
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">首页</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">个人主页 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('bindingEmail') }}">绑定邮箱</a></li>
                        <li><a href="{{ url('bindingPhone') }}">绑定手机</a></li>
                        <li><a href="{{ url('modifyPassword') }}">修改密码</a></li>
                        <li><a href="{{ url('modifyInfo') }}">修改个人信息</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">万事屋 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('wsw') }}">首页</a></li>
                        <li><a href="{{ url('exchange') }}">课程交换</a></li>
                        <li><a href="{{ url('sell') }}">二手交易</a></li>
                        <li><a href="{{ url('partTime') }}">兼职发布</a></li>
                        <li><a href="{{ url('transport') }}">快递帮取</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('playground') }}">操场</a></li>
                <li><a href="#Weather">天气预报</a></li>
                <li class="dropdown">
                    <a href="#Lost" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">失物招领 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('found') }}">拾金不昧</a></li>
                        <li><a href="{{ url('lost') }}">发布遗失宝贝信息</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('feedback') }}">意见反馈</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/owner/'.Auth::user()->id) }}"><i class="fa fa-archive"></i>个人主页</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>登出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>