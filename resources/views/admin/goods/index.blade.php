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
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 商品管理  ➤ 商品列表
            </div>
        </div>
        <div id="content-header">
            <h1>商品列表</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <form action="" method="get" id="list-form">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                                <h5>商品</h5>
                                <a href="javascript:void(0)" onclick="submitForm()" class="btn btn-info btn" style="margin-top: 4px;float: right;margin-right: 10px">搜索</a>
                                <input type="text" name="keyword" style="margin-top: 4px;float: right;font-size: 10px;height: 18px" value="" placeholder="请输入搜索关键字...">
                            </div>
                            <div class="widget-content ">
                                <table class="table table-bordered table-striped with-check">
                                    <thead>
                                    <tr>
                                        <th class="tc" width="5%">ID</th>
                                        <th class="tc" width="7%">商品图片</th>
                                        <th>分类</th>
                                        <th width="16%">标题</th>
                                        <th>价格</th>
                                        <th>邮费</th>
                                        <th width="22%">描述</th>
                                        <th width="12%">创建时间</th>
                                        <th width="10%">操作</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($goods as $good)
                                        <tr class="content-list">
                                            <td class="tc">{{$good->id}}</td>
                                            <td class="tc">
                                                <img src="{{ $good->pic_path }}" alt="" style="width: 50px;height: auto;border-radius: 5px">
                                            </td>
                                            <td>
                                                {{ $good->cate_id }}
                                            </td>
                                            <td>{{ str_limit($good->title,30) }}</td>
                                            <td>{{ $good->money }}</td>
                                            <td>{{ $good->postage }}</td>
                                            <!--1:待付款；2：待发货；3、待收货；4；订单完成-->
                                            <td>
                                               {{ str_limit($good->description,40) }}
                                            </td>
                                            <td>{{ $good->created_at }}</td>
                                            <td>
                                                @if((new \App\Helpers\UserHelp())->isAdmin())
                                                    {{--<a class="btn btn-danger btn-mini" href="">删除</a>--}}
                                                @endif

                                                    <a class="btn btn-info btn-mini" href="{{ route('admin.goods.show',['id' => $good->id]) }}">购买</a>
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
                            <span style="margin-left: 10px;">共 {{ $goods->total() }} 条数据</span>
                            <div class="pagination alternate right">
                                <ul>
                                    {{--<li class="disabled"><a href="#">Prev</a></li>--}}
                                    {{--<li class="active"> <a href="#">1</a> </li>--}}
                                    {{--<li><a href="#">2</a></li>--}}
                                    {{--<li><a href="#">3</a></li>--}}
                                    {{--<li><a href="#">4</a></li>--}}
                                    {{--<li><a href="#">Next</a></li>--}}
                                    <span style="float: right">{!! $goods->appends(Input::all())->render() !!}</span>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </body>
@endsection