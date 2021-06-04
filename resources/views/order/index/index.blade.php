<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>乐优健康手机app健康服务页面模板</title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link href="{{asset('assets/order/index/css/style.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
<section class="jq22-flexView">

    <section class="jq22-scrollView">
        <div class="jq22-head-bg">
            <div class="jq22-flex">
                <div class="jq22-flex-box">
                    <h2>Hi, 下午好！</h2>
                    <h3>每小时站起来放松一下,可以缓解肌肉疲劳哦~</h3>
                </div>
            </div>
        </div>
        {{--<div class="jq22-image-text">--}}
            {{--<a href="javascript:;" class="jq22-flex ">--}}
                {{--<div class="jq22-shrink-img">--}}
                    {{--<img src="{{asset('assets/order/index/images/icon-001.png')}}" alt="">--}}
                {{--</div>--}}
                {{--<div class="jq22-flex-box">--}}
                    {{--<h4>报告解读</h4>--}}
                {{--</div>--}}
            {{--</a>--}}
            {{--<a href="javascript:;" class="jq22-flex ">--}}
                {{--<div class="jq22-shrink-img">--}}
                    {{--<img src="{{asset('assets/order/index/images/icon-item-002.png')}}" alt="">--}}
                {{--</div>--}}
                {{--<div class="jq22-flex-box">--}}
                    {{--<h4>医生咨询</h4>--}}
                {{--</div>--}}
            {{--</a>--}}
        {{--</div>--}}
        <div class="jq22-palace">
            <a href="{{url('order/buy_goods')}}" class="jq22-palace-grid">
                <div class="jq22-palace-grid-icon">
                    <img src="{{asset('assets/order/index/images/icon-001.png')}}" alt="">
                </div>
                <div class="jq22-palace-grid-text">
                    <h2>订货</h2>
                </div>
            </a>
            <a href="javascript:;" class="jq22-palace-grid">
                <div class="jq22-palace-grid-icon">
                    <img src="{{asset('assets/order/index/images/icon-002.png')}}" alt="">
                </div>
                <div class="jq22-palace-grid-text">
                    <h2>查看订单</h2>
                </div>
            </a>
        </div>
        <div class="divHeight"></div>
        <div class="jq22-flex">
            <div class="jq22-flex-box">
                <h1>公司介绍</h1>
            </div>
        </div>
        <div class="jq22-image-text jq22-image-text-two">
            <img src="{{asset('assets/order/index/images/company.jpeg')}}" height="200" alt="">
            SOHO中国成立于1995年，由SOHO中国董事长潘石屹和首席执行官张欣联手创建。公司在北京和上海城市中心开发和持有高档商业地产，
            坚持独特创新的建筑理念，建造符合时代精神的建筑，所开发项目均成为城市建设中的里程碑建筑。
            目前，SOHO中国已成为北京、上海最大的办公楼开发商，开发总量达500万平方米。

            2007年10月8日，SOHO中国在香港联交所成功上市（股票代码：410），融资19亿美元，创造了亚洲最大的商业地产企业IPO。2006年以来，
            SOHO中国6次入选《财富》杂志中文版评选出的“最受赞扬的中国公司”全明星榜。<br/>

            <span>
            联系人：罗健平<br/>
            联系电话：<a href="tel:19946806667">19946806667</a>
            </span>
        </div>
        <div class="jq22-flex" style="padding-top:0">
            <div class="jq22-flex-box">
                <img src="{{asset('assets/order/index/images/ad-001.png')}}" width="100%" alt="">
            </div>
        </div>
        <div style="height:60px;"></div>
    </section>
    {{--<footer class="jq22-footer jq22-footer-fixed">--}}
        {{--<a href="javascript:;" class="jq22-tabBar-item">--}}
                    {{--<span class="jq22-tabBar-item-icon">--}}
                        {{--<i class="icon icon-loan"></i>--}}
                    {{--</span>--}}
            {{--<span class="jq22-tabBar-item-text">首页</span>--}}
        {{--</a>--}}
        {{--<a href="javascript:;" class="jq22-tabBar-item ">--}}
                    {{--<span class="jq22-tabBar-item-icon">--}}
                        {{--<i class="icon icon-credit"></i>--}}
                    {{--</span>--}}
            {{--<span class="jq22-tabBar-item-text">优品</span>--}}
        {{--</a>--}}
        {{--<a href="javascript:;" class="jq22-tabBar-item jq22-tabBar-item-active">--}}
                    {{--<span class="jq22-tabBar-item-icon">--}}
                        {{--<i class="icon icon-ions"></i>--}}
                    {{--</span>--}}
            {{--<span class="jq22-tabBar-item-text">服务</span>--}}
        {{--</a>--}}
        {{--<a href="javascript:;" class="jq22-tabBar-item">--}}
                    {{--<span class="jq22-tabBar-item-icon">--}}
                        {{--<i class="icon icon-me"></i>--}}
                    {{--</span>--}}
            {{--<span class="jq22-tabBar-item-text">会员</span>--}}
        {{--</a>--}}
    {{--</footer>--}}
</section>

</body>
</html>
