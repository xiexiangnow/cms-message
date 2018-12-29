@extends('layouts.middle')

@section('middle-content')
    <body>
    <style>
        .control-group .controls label{
            display:inline-block;
        }
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}
    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 用户管理  ➤ 管理员详情
            </div>
        </div>
        <div id="content-header">
            <h1>管理员详情</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
                            <h5>详情</h5>
                        </div>
                        <div class="widget-content">
                            <div class="row-fluid">
                                {{--<div class="span6">--}}
                                    {{--<img class="image" src="343434" alt="">--}}
                                {{--</div>--}}
                                <div class="span12">
                                    <table class="table table-bordered table-invoice">
                                        <tbody>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td style="width: 200px" rowspan="9">
                                                @if($manager->userface)
                                                <img src="{{$manager->userface}}"  style="width: 200px;height: 200px;margin-top: 40px;" alt="">
                                                @else
                                                <img src="{{asset('assets/style/img/no-img.png')}}"  style="width: 200px;height: 200px;margin-top: 40px;" alt="">
                                                    @endif
                                            </td>
                                            <td style="width: 100px">姓名：</td>
                                            <td style="width: 300px"><strong>{{$manager->truename}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>花名：</td>
                                            <td><strong>{{$manager->nickname ? $manager->nickname : '无' }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>性别：</td>
                                            <td><strong>{{$manager->sex == 1 ? "男" : "女"}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>职级：</td>
                                            <td><strong>{{$manager->z_level}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>在职状态：</td>
                                            <td><strong>{{ $manager->state == 1 ? "在职" : "离职" }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>生日：</td>
                                            <td><strong>{{$manager->birthday}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>电话：</td>
                                            <td><strong>{{ substr_replace($manager->mobi,'****',3,5) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>邮箱：</td>
                                            <td><strong>{{$manager->email}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>创建时间：</td>
                                            <td><strong>{{$manager->create_time}}</strong>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection