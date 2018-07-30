@extends('layouts.resource.blade1.php')

@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 标签管理 &raquo; 标签管理
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#">
        <div class="result_wrap">
            <div class="result_title">
                <h3>标签列表</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/tag/create')}}"><i class="fa fa-plus"></i>新增标签</a>
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
                        <th class="tc" width="5%">ID</th>
                        <th>标签名</th>
                        <th>颜色</th>
                        <th width="20%">示例</th>
                        <th>操作</th>
                    </tr>
                    @forelse($tags as $tag)
                    <tr>
                        <td class="tc">{{$tag->id}}</td>
                        <td>
                            {{$tag->name}}
                        </td>
                        <td>
                            <i class="fa fa-tag" style="color:{{$tag->color}};font-size: 20px;"> <span style="font-size: 14px;color:{{$tag->color}};">{{$tag->color}}</span></i>
                        </td>
                        <td>
                            <span style="color: {{$tag->color}}">{{$tag->name}}</span>
                        </td>
                        <td>
                            <a href="{{route('admin.tag.edit',['id'=>$tag->id])}}">修改</a>
                            <a href="javascript:void(0)" onclick="deleteTag({{$tag->id}})">删除</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">暂无数据</td>
                    </tr>
                     @endforelse
                </table>
                <div class="page_list">
                    {!! $tags->appends(Input::all())->render() !!}
                   <ul>
                       <li style="padding:0 5px;color: #337AB7;font-size: 12px">共{{$tags->total()}}条</li>
                   </ul>
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>
        // - 删除标签
        function deleteTag(id){
            layer.msg('确定执行删除操作么?', {
                time: 0 //不自动关闭
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    layer.close(index);
                    // - 执行区域
                    var url = "{{ route('admin.tag.destroy') }}";
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
                            window.setTimeout("window.location='/admin/tag'",2000);
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