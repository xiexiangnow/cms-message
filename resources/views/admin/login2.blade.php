<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{ asset('assets/style/css/ch-ui.admin.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/style/font/css/font-awesome.min.css')  }}">
	<script src="{{ asset('assets/style/js/jquery.js') }}"></script>
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1><img src="{{asset('assets/style/img/header.png')}}" alt="" style="border-radius: 50%;width: 100px;"></h1>
		<h2>后台管理平台</h2>
		<div class="form">
			<form action="" method="post">
				{{ csrf_field() }}
				<ul>
					<li>
					<input type="text" name="username" id="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" id="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					@if(session('msg'))
						<p style="color:red">{{session('msg')}}</p>
					@endif
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p> &copy; 2016 xiexiang-Blog Powered by <a href="http://www.h-ui.net/Hui-overview.shtml" target="_blank">http://www.h-ui.net/Hui-overview.shtml</a></p>
		</div>
	</div>

</body>
</html>