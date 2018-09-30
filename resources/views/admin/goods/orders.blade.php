@extends('layouts.middle')

@section('middle-content')
    <body>
    <style>
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}
    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 商品管理  ➤ 订单列表
            </div>
        </div>
        <div id="content-header">
            <h1>订单列表</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <form action="" method="get" id="list-form">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                                <h5>订单</h5>
                                <a href="javascript:void(0)" onclick="submitForm()" class="btn btn-info btn" style="margin-top: 4px;float: right;margin-right: 10px">搜索</a>
                                <input type="text" name="keyword" style="margin-top: 4px;float: right;font-size: 10px;height: 18px" value="{{ $keyword }}" placeholder="请输入订单号...">
                                <select name="status" id="" style="margin-top: 3px;float: right;margin-right: 10px;font-size: 10px" onchange="submitForm()">
                                    <option value="0">分类全部</option>
                                    <option value="1"  @if($status == 1)  selected="selected" @endif >待付款</option>
                                    <option value="2"  @if($status == 2)  selected="selected" @endif >待发货</option>
                                    <option value="3"  @if($status == 3)  selected="selected" @endif >待收货</option>
                                    <option value="4"  @if($status == 4)  selected="selected" @endif >订单完成</option>
                                </select>
                            </div>
                            <div class="widget-content ">
                                <table class="table table-bordered table-striped with-check">
                                    <thead>
                                    <tr>
                                        <th class="tc" width="5%">ID</th>
                                        <th class="tc" width="5%">订单号</th>
                                        <th  width="10%">用户</th>
                                        <th>商品名称</th>
                                        <th>订单名称</th>
                                        <th>商品数量</th>
                                        <th width="8%">状态</th>
                                        <th>订单金额</th>
                                        <th>创建时间</th>
                                        <th width="10%">操作</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders as $order)
                                        <tr class="content-list">
                                            <td class="tc">{{$order->id}}</td>
                                            <td class="tc">
                                                <b>{{$order->order_no}}</b>
                                            </td>
                                            <td>
                                               {{ $order->user->name }}
                                            </td>
                                            <td>{{ $order->goods->title }}</td>
                                            <td>{{ str_limit($order->order_name,40) }}</td>
                                            <td>1</td>
                                            <!--1:待付款；2：待发货；3、待收货；4；订单完成-->
                                            <td>
                                                @if($order->status == 1)
                                                    <span style="color: #f89406">待付款</span>
                                                    @elseif($order->status == 2)
                                                    <span style="color: #f89406">待发货</span>
                                                    @elseif($order->status == 3)
                                                    <span style="color: #f89406">待收货</span>
                                                    @else
                                                    <span style="color: green">订单完成</span>
                                                    @endif
                                            </td>
                                            <td>{{ $order->order_money }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                @if((new \App\Helpers\UserHelp())->isAdmin())
                                                    <a class="btn btn-danger btn-mini" href="javascript:void(0)" onclick="deleteOrder({{$order->id}})">删除</a>

                                                    @if($order->status == 1)
                                                        <a class="btn btn-info btn-mini" href="">支付</a>
                                                    @endif

                                                    @if($order->status == 2)
                                                        <a class="btn btn-inverse btn-mini" href="">发货</a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="tc" colspan="11">暂无数据</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <span style="margin-left: 10px;">共 {{ $orders->total() }} 条数据</span>
                            <div class="pagination alternate right">
                                <ul>
                                    {{--<li class="disabled"><a href="#">Prev</a></li>--}}
                                    {{--<li class="active"> <a href="#">1</a> </li>--}}
                                    {{--<li><a href="#">2</a></li>--}}
                                    {{--<li><a href="#">3</a></li>--}}
                                    {{--<li><a href="#">4</a></li>--}}
                                    {{--<li><a href="#">Next</a></li>--}}
                                    <span style="float: right">{!! $orders->appends(Input::all())->render() !!}</span>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript">
        // - 删除订单
        function deleteOrder(id){
            layer.msg('确定执行删除操作么?', {
                time: 0 //不自动关闭
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    layer.close(index);
                    // - 执行区域
                    var url = "{{ url('admin/deleteOrder') }}";
                    $.ajax({
                        data:{'id':id},
                        type: 'DELETE',
                        url: url,
                        dataType: 'json'
                    }).done(function (data) {
                        if(data.status == 1){
                            $.toast({
                                heading: '提示信息',
                                text: data.msg,
                                position: 'top-right',
                                stack: false
                            });
                            window.setTimeout("window.location='/admin/orders'",2000);
                        }else{
                            $.toast({
                                heading: '提示信息',
                                text: data.msg,
                                position: 'top-right',
                                stack: false,
                                bgColor: '#FF1356',
                                textColor: 'white'
                            })
                        }
                    }).fail(function (data) {
                        prompt('error', data.responseJSON.msg);
                    });
                }
            });
        }

        function submitForm()
        {
            //alert($(cateObj).val());
            $('#list-form').submit();
        }
    </script>
@endsection