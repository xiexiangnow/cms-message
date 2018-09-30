@extends('layouts.middle')

@section('middle-content')
    <body>
    <style>
        .control-group .controls label{
            display:inline-block;
        }
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}

        .image {width: auto;height: 200px;border-radius: 5px}
        .money{    vertical-align: middle;
            font-size: 30px;
            color: #FF0036;
            font-weight: bolder;
            font-family: Arial;
            -webkit-font-smoothing: antialiased;}
    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 商品管理  ➤ 商品结算
            </div>
        </div>
        <div id="content-header">
            <h1>商品结算</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
                            <h5>结算</h5>
                        </div>
                        <h3 style="padding-left: 10px">{{ $detail->title  }}</h3>
                        <div class="widget-content">
                            <div class="row-fluid">
                                {{--<div class="span6">--}}
                                    {{--<img class="image" src="2342" alt="">--}}
                                {{--</div>--}}
                                <div class="span6">
                                    <table class="table table-bordered table-invoice">
                                        <tbody>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td class="width30">商品图片：</td>
                                            <td class="money" ><strong><img src="{{$detail->pic_path}}" style="width: auto;height: 80px" alt=""></strong></td>
                                        </tr>
                                        <tr>
                                            <td class="width30">价格：</td>
                                            <td class="money" ><strong>￥{{$detail->money}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>数量:</td>
                                            <td><strong>1</strong></td>
                                        </tr>
                                        <tr>
                                            <td>所属地:</td>
                                            <td><strong>浙江 金华</strong></td>
                                        </tr>
                                        <tr>
                                            <td>邮费:</td>
                                            <td><strong>￥{{$detail->postage}}</strong></td>
                                        </tr>
                                        <tr><td class="width30" style="width: 120px">描述:</td>
                                            <td class="width70"><strong>{{$detail->description}}</strong>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a class="btn btn-primary btn-large pull-right" href="{{url('admin/order',['id'=>$detail->id])}}">结算</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection