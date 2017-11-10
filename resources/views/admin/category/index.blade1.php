@extends('layouts.resource')

@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 分类管理 &raquo; 分类管理
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#">
        <div class="result_wrap">
            <div class="result_title">
                <h3>分类列表</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增分类</a>
                    <a href="javascript:void(0)" onclick="refurbish()"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
        <style>
            .list_tab tr{line-height: 10px}
        </style>
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>分类名称</th>
                        <th>标题</th>
                        <th width="10%">查看次数</th>
                        <th>关键词</th>
                        <th>操作</th>
                    </tr>
                    @forelse($categories as $category)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{$category->cate_id}})" name="ord[]" value="{{$category->cate_order}}">
                        </td>
                        <td class="tc">{{$category->cate_id}}</td>
                        <td>
                            <a href="#">{{$category->cate_name}}</a>
                        </td>
                        <td>{{$category->cate_title}}</td>
                        <td>{{$category->cate_view}}</td>
                        <td>{{$category->cate_keywords}}</td>
                        <td>
                            <a href="{{route('admin.category.create',['cate_id'=>$category->cate_id])}}">添加下级</a>
                            <a href="{{route('admin.category.edit',['cate_id'=>$category->cate_id])}}">修改</a>
                            <a href="javascript:void(0)" onclick="deleteCategory({{$category->cate_id}})">删除</a>
                        </td>
                    </tr>
                     @empty
                        <tr>
                            <td class="tc" colspan="10">暂无分类</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

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