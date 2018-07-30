@extends('layouts.middle')

@section('middle-content')
    <body>
    <style>
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}
        .span2 {height: 250px;border:1px #ccc solid;padding: 3px}
        .span2 .pic{width: 100%;height: 150px;float: left}
        .span2:hover{border:1px #02B77D solid}
        .span2 .description {padding: 5px}
        .span2 .title{height: 40px;}
        .span2 .description .money {color: #F40;font-weight: 700;font-size: 16px}
        .span2 .description .dingwei img {width: 20px;height: 20px}

    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 商品管理  ➤ 商品列表
            </div>
        </div>
        <div id="content-header">
            <h1>商品列表</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
                            <h5>列表</h5>
                        </div>
                        <div class="widget-content">
                            <ul class="thumbnails">
                                @forelse($goods as $good)
                                <li class="span2"><a href="{{route('admin.goods.show',['id' => $good->id])}}"> <img src="{{ $good->pic_path }}" alt="" class="pic">
                                    <div class="description">
                                       <span class="money">￥{{$good->money}}</span>
                                        <span style="float: right;color: #888">已有100付款</span>
                                       <div class="title">{{ str_limit($good->title,40) }}</div>
                                        <div class="dingwei">
                                            <img src="{{ asset('assets/msg-style/img/dingwei.png') }}" alt="">
                                            浙江 金华
                                        </div>
                                    </div>
                                    </a>
                                </li>

                               @empty
                                    暂无数据
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection