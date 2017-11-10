@extends('layouts.resource')

@section('content')
<body>
<!--Header-part-->
<div id="header">
    <h1><a href="{{ url('admin/info') }}">规章管理系统</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" >
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                <i class="icon icon-user"></i>&nbsp;
                <span class="text">欢迎你，{{session('user')->name}}</span>&nbsp;
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                {{--<li><a href="#"><i class="icon-user"></i> 个人资料</a></li>--}}
                <li class="divider"></li>
                <li><a class="menu_a" link="{{url('admin/modify_pass')}}"><i class="icon-check"></i> 修改密码</a></li>
                <li class="divider"></li>
                <li><a href="{{url('admin/login_out')}}"><i class="icon-key"></i> 退出系统</a></li>
            </ul>
        </li>
        {{--<li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">&nbsp;设置</span></a></li>--}}
        <li class=""><a title="" href="{{url('admin/login_out')}}"><i class="icon icon-share-alt"></i> <span class="text">&nbsp;退出系统</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->


<!--sidebar-menu-->
<div id="sidebar" style="OVERFLOW-Y: auto; OVERFLOW-X:hidden;">
    <ul>
        <li class="submenu active">
            <a class="menu_a" link="{{ url('admin/info') }}"><i class="icon icon-home"></i> <span>首页</span></a>
        </li>
        <li class="submenu">
            <a href="#">
                <i class="icon icon-table"></i>
                <span>分类管理</span>
                @if((new \App\Helpers\UserHelp())->isAdmin())
                    <span class="label label-important">2</span>
                @else
                    <span class="label label-important">1</span>
                @endif
            </a>
            <ul>
                @if((new \App\Helpers\UserHelp())->isAdmin())
                 <li><a class="menu_a" link="{{url('admin/category/create')}}"><i class="icon icon-caret-right"></i>添加分类</a></li>
                @endif
                <li><a class="menu_a" link="{{url('admin/category')}}"><i class="icon icon-caret-right"></i>分类列表</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#">
                <i class="icon icon-th"></i>
                <span>内容管理</span>
                @if((new \App\Helpers\UserHelp())->isAdmin())
                <span class="label label-important">2</span>
                @else
                <span class="label label-important">1</span>
                @endif
            </a>
            <ul>
                @if((new \App\Helpers\UserHelp())->isAdmin())
                <li><a class="menu_a" link="{{url('admin/article/create')}}"><i class="icon icon-caret-right"></i>添加内容</a></li>
                @endif
                <li><a class="menu_a" link="{{url('admin/article')}}"><i class="icon icon-caret-right"></i>内容列表</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#">
                <i class="icon icon-group"></i>
                <span>用户管理</span>
                @if((new \App\Helpers\UserHelp())->isAdmin())
                    <span class="label label-important">3</span>
                @else
                    <span class="label label-important">2</span>
                @endif
            </a>
            <ul>
                @if((new \App\Helpers\UserHelp())->isAdmin())
                <li><a class="menu_a" link="{{url('admin/user/create')}}"><i class="icon icon-caret-right"></i>新增用户</a></li>
                @endif
                <li><a class="menu_a" link="{{url('admin/modify_pass')}}"><i class="icon icon-caret-right"></i>修改密码</a></li>
                <li><a class="menu_a" link="{{url('admin/user')}}"><i class="icon icon-caret-right"></i>用户管理</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <!--End-breadcrumbs-->
    <iframe src="{{ url('admin/info') }}" id="iframe-main" frameborder='0' style="width:100%;"></iframe>
</div>
<!--end-main-container-part-->

<script src="{{asset('assets/msg-style/js/excanvas.min.js')}}"></script>
<script src="{{asset('assets/msg-style/js/jquery-1.7.2.min.js')}}"></script>
<script src="{{asset('assets/msg-style/js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('assets/msg-style/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/msg-style/js/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/msg-style/js/matrix.js')}}"></script>
<script type="text/javascript">

    //初始化相关元素高度
    function init(){
        $("body").height($(window).height()-80);
        $("#iframe-main").height($(window).height()-90);
        $("#sidebar").height($(window).height()-50);
    }

    $(function(){
        init();
        $(window).resize(function(){
            init();
        });
    });

    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {
        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {
            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }
    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }

    // uniform使用示例：
    // $.uniform.update($(this).attr("checked", true));
</script>
</body>
@endsection
