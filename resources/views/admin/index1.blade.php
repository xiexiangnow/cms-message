@extends('layouts.resource.blade1.php')

@section('content')
<body>
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo" style="font-size: 14px;"><img src="{{asset('assets/style/img/header.png')}}" alt="" style="width: 30px;border-radius: 50%;margin-bottom: -8px">&nbsp;后台管理系统</div>
			<ul>
				<li><a href="{{url('admin/index')}}" class="active">首页</a></li>
				<li><a href="#">管理页</a></li>
			</ul>
		</div>
		<div class="top_right" style="font-size: 12px;">
			<ul>
				<li>欢迎您，管理员：{{session('user')->name}}</li>
				<li><a href="{{url('admin/modify_pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/login_out')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-cog"></i>分类管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/category/create')}}" target="main"><i class="fa fa-fw fa-plus"></i>添加分类</a></li>
					<li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-sitemap"></i>分类列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-reorder"></i>文章管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/article/create')}}" target="main"><i class="fa fa-fw fa-plus"></i>添加文章</a></li>
					<li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-reorder"></i>文章列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-tag"></i>标签管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/tag/create')}}" target="main"><i class="fa fa-fw fa-plus"></i>添加标签</a></li>
					<li><a href="{{url('admin/tag')}}" target="main"><i class="fa fa-fw fa-tag"></i>标签列表</a></li>
				</ul>
			</li>

            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>常用操作</h3>
                <ul class="sub_menu">
                    <li><a href="add.html" target="main"><i class="fa fa-fw fa-plus-square"></i>添加页</a></li>
                    <li><a href="list.html" target="main"><i class="fa fa-fw fa-list-ul"></i>列表页</a></li>
                    <li><a href="tab.html" target="main"><i class="fa fa-fw fa-list-alt"></i>tab页</a></li>
                    <li><a href="img.html" target="main"><i class="fa fa-fw fa-image"></i>图片列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">
                    <li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
                    <li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                    <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
                     <li><a href="http://www.baidu.com" target="main"><i class="fa fa-fw fa-link"></i>百度</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{ url('admin/info') }}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
	</div>
	<!--底部 结束-->
</body>
@endsection