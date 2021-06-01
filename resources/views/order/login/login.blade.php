<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>订购系统登录</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/order/login/css/style.css')}}">


    <script type="text/javascript" src="{{ asset('assets/style/js/jquery.js')  }}"></script>
    <script src="{{asset('assets/order/login/js/flexible.js')}}" type="text/javascript" ></script>
    <script src="{{asset('assets/order/login/js/zepto.min.js')}}" type="text/javascript" ></script>
</head>
<body>
<!--头像-->
<div class="head">
    <div class="img">
        <img src="{{asset('assets/order/login/picture/head.png')}}">
    </div>
    <p>罗健平贸易有限公司</p>
</div>
<!--登陆-->
<form id="login_sub" class="form-vertical" action="" method="post">
    {{ csrf_field() }}
    <div class="item">
        <input type="text" name="phone" maxlength="11" placeholder="请输入您的手机号码" autocomplete="off" class="name">
    </div>
    {{--<div class="item">--}}
        {{--<input type="text" name="vcode" maxlength="6" placeholder="请输入验证码" autocomplete="off" class="vcode">--}}
        {{--<span id="vcode">发送验证码</span>--}}
    {{--</div>--}}
    <div class="item">
        <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="password">
    </div>
    <p style="float: right">
        <span><a href="tel:10086">忘记密码?</a></span>
        <span style="margin-left:20px;margin-right: 10px"><a href="">注册</a></span>
    </p>

    @if(session('msg'))
        <div style="float: left">
        <p style="color:red;margin-left: 10px;">{{session('msg')}}</p>
        </div>
    @endif

    <div class="submit"><button><input type="submit" value="登&nbsp;录" style="background-color: #1f6ecf;font-size: 16px;"></button></div>
</form>

<!--第三方登陆-->
{{--<div class="other-login">--}}
    {{--<p><span>使用第三方帐号登陆</span></p>--}}
    {{--<div class="third">--}}
        {{--<ul>--}}
            {{--<li><img src="{{asset('assets/order/login/picture/icon-qq.png')}}"></li>--}}
            {{--<li><img src="{{asset('assets/order/login/picture/icon-weixin.png')}}"></li>--}}
            {{--<li><img src="{{asset('assets/order/login/picture/icon-weibo.png')}}"></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</div>--}}
<!--尾部-->
<div class="footer">
    <img src="{{asset('assets/order/login/picture/logo.png')}}">
    <p>登录使用就表示同意用户协议<a href="javascript:;">条款</a>和<a href="javascript:;">隐私</a>政策</p>
</div>
</body>
</html>
<script type="text/javascript">

    // 提交验证
    $('.submit button').click(function(){

        $('#login_sub').submit();
    })
</script>