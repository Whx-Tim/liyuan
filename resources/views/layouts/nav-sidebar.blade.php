<ul class="nav nav-pills nav-stacked">
    <li{{ request()->is('admin/user*') ? ' class=active ' : '' }}>
        <a href="{{ url('admin/user') }}">
            用户管理
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/course*') ? 'class=active' : '' }}>
        <a href="{{ url('admin/course') }}">
            课程交换
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/sell*') ? 'class=active' : '' }}>
        <a href="{{ url('admin/sell') }}">
            二手交易
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/partTime*') ? 'class=active' : '' }}>
        <a href="{{ url('admin/partTime') }}">
            兼职信息
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/transport*') ? 'class=active' : '' }}>
        <a href="{{ url('admin/transport') }}">
            快递帮取
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/playground*') ? 'class=active' : '' }}>
        <a href="{{ url('admin/playground') }}">
            操场管理
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/found*') ? 'class=active' : '' }}>
        <a href="{{ url('admin/found') }}">
            招领管理
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/lost*') ? 'class=active' : '' }}>
        <a href="{{ url('admin/lost') }}">
            失物管理
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
    <li{{ request()->is('admin/feedback*') ? 'class=active' : '' }}>
        <a href="{{ url('admin/feedback') }}">
            意见反馈
            <i class="fa fa-chevron-right"></i>
        </a>
    </li>
</ul>