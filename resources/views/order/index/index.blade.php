<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <title>商品</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/order/choose/css/aui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/order/choose/css/classify.css')}}">
    <style>

        .aui-bar-nav{border:none;background: #f5f5f5;}
        .main{height: calc(100% - 4.5rem);}

        #tab1-con1{padding-bottom: 3rem;}
        #tab1-con1,#tab1-con2{height: 100%;}
        .aui-tab{border-bottom: solid 1px #eee;background: #f5f5f5;height: 2.25rem;}
        .aui-tab-item{font-size: .75rem;color: #666;width: 25%;}
        .aui-tab-item.aui-active{border:none;color: #000;position: relative;}
        .aui-tab-item.aui-active:after{position: absolute;left: 40%;width: 20%;height: 2px;background: #00ae66;content: '';bottom:0;}
    </style>
</head>
<body>
<header class="aui-bar aui-bar-nav">
    <a class="aui-pull-left aui-btn">
        <span class="aui-iconfont aui-icon-left"></span>
    </a>
    <div class="aui-title">商品</div>
    <div class="aui-pull-right"></div>
</header>
<div class="aui-tab" id="tab">
    <div class="aui-tab-item aui-active">选购</div>
    <div class="aui-tab-item">商家</div>
</div>
<div class="main">
    <div class="aui-item" id="tab1-con1">
        <div class="left-menu" id="left">
            <ul>
                <li><span>酒类</span></li>
                <li><span>饮料</span></li>
            </ul>
        </div>
        <div class="con">
            <div class="right-con con-active" style="display: none;">
                <ul>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/wuxing.jpeg')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="00">五星啤酒</h4>
                            <p class="list1">月销量：123 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>55.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">55.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：23 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li><li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="01">乌苏啤酒</h4>
                            <p class="list1">月销量：122 | 单位：件</p>
                            <p class="list2">
                                <b>￥</b><b>78.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">78.00</i>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="right-con" style="display: none;">
                <ul>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/pijiu01.png')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="10">宫保鸡丁</h4>
                            <p class="list1">月销量：123</p>
                            <p class="list2">
                                <b>￥</b><b>4.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">4.00</i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="menu-img"><img src="{{asset('assets/order/choose/image/wuxing.jpeg')}}"></div>
                        <div class="menu-txt">
                            <h4 data-icon="11">回锅肉</h4>
                            <p class="list1">月销量：123</p>
                            <p class="list2">
                                <b>￥</b><b>5.00</b>
                            </p>
                            <div class="btn">
                                <button class="minus"></button>
                                <i>0</i>
                                <button class="add"></button>
                                <i class="price">5.00</i>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="up1"></div>
        <div class="shopcart-list fold-transition">
            <div class="list-header">
                <h1 class="title">选购车</h1>
                <span class="empty">清空所有</span>
            </div>
            <div class="list-content">
                <ul></ul>
            </div>
        </div>
        <div class="footer">
            <div class="left">
                <div class="count_num"><span id="totalcountshow">0</span></div>
                <span id="cartN" class="nowrap">总计：<span id="totalpriceshow">0</span>元</span>
            </div>
            <div class="right">
                <a id="btnselect" class="xhlbtn disable">去确认</a>
            </div>
        </div>
    </div>
    <div class="aui-item aui-hide" id="tab1-con2">
        2
    </div>
</div>


<script src="{{asset('assets/style/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/order/choose/script/add.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/order/choose/script/aui-tab.js')}}" ></script>
<script type="text/javascript">
    apiready = function() {
        api.parseTapmode();
    }
    var tab = new auiTab({
        element: document.getElementById("tab"),

    }, function(ret) {
        if (ret) {
            //定义获取对象的所有兄弟节点的函数，
            function siblings(elm) {
                var a = [];
                var p = elm.parentNode.children;
                for (var i = 0, pl = p.length; i < pl; i++) {
                    if (p[i] !== elm) a.push(p[i]);
                }
                return a;
            }
            var index = ret.index;
            var activeC = document.getElementById("tab1-con" + index);
            activeC.className = "";
            for (var i = 0; i < siblings(activeC).length; i++) {
                siblings(activeC)[i].className = "aui-hide";
            }
        }
    });
</script>
</body>
</html>
