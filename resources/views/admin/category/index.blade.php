@extends('layouts.middle')

@section('middle-content')
    <body>
    <style>
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}
        .content-list td {line-height: 40px}
    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 分类管理  ➤ 分类管理
            </div>
        </div>
        <div id="content-header">
            <h1>分类列表</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>列表</h5>
                            @if((new \App\Helpers\UserHelp())->isAdmin())
                            <a href="{{url('admin/category/create')}}" class="btn btn-success btn-mini" style="margin-top: 10px;float: right;margin-right: 10px">新增分类</a>
                            @endif
                            <a href="javascript:void(0)" onclick="refurbish()" class="btn btn-inverse btn-mini" style="margin-top: 10px;float: right;margin-right: 10px"><i class="fa fa-refresh"></i>更新排序</a>
                        </div>
                        <div class="widget-content ">
                            <table class="table table-bordered table-striped with-check">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>

                                    <th class="tc" width="8%">排序</th>
                                    <th class="tc" width="5%">ID</th>
                                    <th>分类名称</th>
                                    <th>标题</th>
                                    <th width="10%">查看次数</th>
                                    <th>关键词</th>
                                    <th width="18%">操作</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                <tr class="content-list">
                                    <td><input type="checkbox" /></td>
                                    <td class="tc">
                                        <input type="text" class="span8" style="font-size: 10px" onchange="changeOrder(this,{{$category->cate_id}})"
                                               name="ord[]" value="{{$category->cate_order}}">
                                    </td>
                                    <td class="tc">{{$category->cate_id}}</td>
                                    <td>
                                            @if($category->cate_pid == 0)
                                                <a href="{{route('buy_goods',['cate_id' => $category->cate_id])}}"><b>{{$category->cate_name}}</b></a>
                                            @else
                                                <a href="{{route('buy_goods',['cate_id' => $category->cate_id])}}">{{$category->cate_name}}</a>
                                            @endif
                                    </td>
                                    <td>{{$category->cate_title}}</td>
                                    <td>{{$category->cate_view}}</td>
                                    <td>{{$category->cate_keywords}}</td>
                                    <td>
                                        @if((new \App\Helpers\UserHelp())->isAdmin())
                                            <a class="btn btn-success btn-mini" href="{{route('admin.category.create',['cate_id'=>$category->cate_id])}}">添加下级</a>
                                            <a class="btn btn-warning btn-mini" href="{{route('admin.category.edit',['cate_id'=>$category->cate_id])}}">修改</a>
                                            <a class="btn btn-danger btn-mini" href="javascript:void(0)" onclick="deleteCategory({{$category->cate_id}})">删除</a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="tc" colspan="10">暂无分类</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // - 更改排序
        function changeOrder(obj,cate_id) {
            var inputCateOrderValue = $(obj).val();
            $.post("{{url('admin/cate/cate_order')}}",{
                'cate_id':cate_id,
                'cate_order':inputCateOrderValue
            },function(data){
                if(data.status == 1){
                    $.toast({
                        heading: '提示信息',
                        text: data.msg,
                        position: 'top-right',
                        stack: false
                    });
                    window.setTimeout("window.location='/admin/category'",1000);
                }else{
                    $.toast({
                        heading: '提示信息',
                        text: data.msg,
                        position: 'top-right',
                        stack: false,
                        bgColor: '#FF1356',
                        textColor: 'white'
                    });
                    window.setTimeout("window.location='/admin/category'",1000);
                }
            });
        }

        // - 页面刷新
        function refurbish(){
            $.toast({
                heading: '提示信息',
                text: '刷新成功！',
                position: 'top-right',
                stack: false
            });
            window.setTimeout("window.location='/admin/category'",2000);
        }

        // - 删除分类
        function deleteCategory(cateId){
            layer.msg('确定执行删除操作么?', {
                time: 0 //不自动关闭
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    layer.close(index);
                    // - 执行区域
                    var url = "{{ route('admin.category.destroy') }}";
                    $.ajax({
                        data:{'cate_id':cateId},
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
                            window.setTimeout("window.location='/admin/category'",2000);
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
    </script>

    </body>
    @endsection