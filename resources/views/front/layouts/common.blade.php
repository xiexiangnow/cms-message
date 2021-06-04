<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Page description" name="description">
    <meta content="Mashup templates have been developped by Orson.io team" name="author">
    <meta name="keywords" content="mm131,mm,美女,图片,写真,美女图片,美女写真" />
    <meta name="description" content="MM131，长期稳定提供无水印美女图片，这里有高清美女私房写真，校花美女图片，性感模特写真等精彩好看的性感美女图片。" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('assets/front/assets/apple-icon-180x180.png')}}" rel="apple-touch-icon">
    <link href="./assets/favicon.ico" rel="icon">
    <title>777美图网</title>
    <link href="{{asset('assets/front/main.82cfd66e.css')}}" rel="stylesheet"></head>
<body>

<!-- Add your content of header -->
<header class="">
    <div class="navbar navbar-default visible-xs">
        <button type="button" class="navbar-toggle collapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="./index.html" class="navbar-brand">Mashup Template</a>
    </div>
    <nav class="sidebar">
        <div class="navbar-collapse" id="navbar-collapse">
            <div class="site-header hidden-xs">
                <a class="site-brand" href="{{url('buy_goods')}}" title="">
                    <img class="img-responsive site-logo" alt="" src="{{asset('assets/front/assets/images/logo.png')}}" style="width: 50px;height: 32px">
                    <span style="color: #FF6067">777美图网</span>
                </a>
                <p>The visual effect can make people produce uncontrollable hormones, which will bring you a little pleasure after work.</p>
            </div>
            <ul class="nav">
                <li><a href="{{url('buy_goods')}}" title="">首页</a></li>
                <li><a href="{{url('front/xinggan')}}" title="">性感美女</a></li>
                <li><a href="./services.html" title="">明星美女</a></li>
                <li><a href="./contact.html" title="">风景图片</a></li>
                <li><a href="./components.html" title="">清纯美女</a></li>
            </ul>
            <nav class="nav-footer">
                {{--<p class="nav-footer-social-buttons">--}}
                    {{--<a class="fa-icon" href="https://www.instagram.com/" title="">--}}
                        {{--<i class="fa fa-instagram"></i>--}}
                    {{--</a>--}}
                    {{--<a class="fa-icon" href="#" title="">--}}
                        {{--<i class="fa fa-dribbble"></i>--}}
                    {{--</a>--}}
                    {{--<a class="fa-icon" href="#" title="">--}}
                        {{--<i class="fa fa-twitter"></i>--}}
                    {{--</a>--}}
                {{--</p>--}}
                <div class="footer-show">
                    <p><a href="">闽ICP备17018460号-2</a></p>
                    <p>客服邮箱：524414842@qq.com</p>
                    <p>欢迎光临xxx美女图网，本站作品多收集于互联网，如有侵权请来信告知，我们将作出调整，请不要将本站资源用于商业用途！</p>
                </div>
            </nav>
        </div>
    </nav>
</header>

@yield('content')

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        navbarToggleSidebar();
        navActivePage();
    });
</script>

<script type="text/javascript" src="{{asset('assets/front/main.85741bff.js')}}"></script></body>

</html>