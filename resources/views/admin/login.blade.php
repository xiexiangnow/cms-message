<!DOCTYPE html>
<html lang="en">

<head>
	<title>Matrix Admin</title><meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{asset('assets/msg-style/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/msg-style/css/bootstrap-responsive.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/msg-style/css/matrix-login.css')}}" />
	<link href="{{asset('assets/msg-style/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
	<link href='{{asset('assets/msg-style/css/font.css')}}' rel='stylesheet' type='text/css'>
	<style type="text/css">
		input{
			font-family: "Microsoft Yahei";
		}
		.control-label{
			color: #B2DFEE;
			padding-left: 4px;
		}
	</style>
</head>
<body onkeydown="keydown()">
<div id="loginbox">
	<div class="control-group normal_text">
		<h2 style="color:#B2DFEE;font-size:28px;">规章管理系统</h2>
	</div>
	<form id="loginform" class="form-vertical" action="" method="post">
		{{ csrf_field() }}
		<div class="control-group">
			<label class="control-label">登陆账号</label>
			<div class="controls">
				<div class="main_input_box">
					<span class="add-on bg_lg"><i class="icon-user" style="font-size:16px;"></i></span>
					<input type="text" name="username" id="username" />
					<span><i class="fa fa-user"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group2">
			<label class="control-label">登陆密码</label>
			<div class="controls">
				<div class="main_input_box">
					<span class="add-on bg_ly"><i class="icon-lock" style="font-size:16px;"></i></span>
					<input type="password" name="password" id="password" class="text"/>
					<span><i class="fa fa-lock"></i></span>
				</div>
			</div>
		</div>
		@if(session('msg'))
			<p style="color:red;">{{session('msg')}}</p>
		@endif
		<div class="form-actions">
			<span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码？</a></span>
			<span class="pull-right"><input type="submit"  class="btn btn-success" style="width:335px;" value=" 登&nbsp;&nbsp;&nbsp;&nbsp;录"/></span>
		</div>
		<div class="control-group normal_text">
			<span style="font-size:14px;color:gray;">版权所有 &copy; iProg网络科技有限公司 2015-2018</span>
		</div>
	</form>

</div>
<script src="http://www.jq22.com/jquery/jquery-1.7.1.js"></script>
</body>
</html>
