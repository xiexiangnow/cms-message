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
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 内容管理  ➤ 内容列表
            </div>
        </div>
        <div id="content-header">
            <h1>内容列表</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <form action="" method="get" id="list-form">
                         <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>列表</h5>
                            <a href="javascript:void(0)" onclick="refurbish()" class="btn btn-inverse btn-mini" style="margin-top: 10px;float: left;margin-left: 10px"><i class="fa fa-refresh"></i>更新排序</a>
                            @if((new \App\Helpers\UserHelp())->isAdmin())
                             <a href="{{url('admin/article/create')}}" class="btn btn-info btn" style="margin-top: 3px;float: left;margin-left: 10px">新增内容</a>
                            @endif

                            <a href="javascript:void(0)" onclick="submitForm()" class="btn btn-info btn" style="margin-top: 4px;float: right;margin-right: 10px">搜索</a>
                            <input type="text" name="keyword" style="margin-top: 4px;float: right;font-size: 10px;height: 18px" value="{{$now_keyword}}" placeholder="请输入搜索关键字...">
                            <select name="cate_id" id="" style="margin-top: 3px;float: right;margin-right: 10px;font-size: 10px" onchange="submitForm()">
                                <option value="0">分类全部</option>
                                @forelse($cate_tree as $parent)
                                    <option value="{{$parent->cate_id}}" @if($parent->cate_id == $now_cate_id)selected="selected"@endif  >{{$parent->cate_name}}</option>
                                @empty
                                    <option value="">暂无父级分类</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="widget-content ">
                            <table class="table table-bordered table-striped with-check">
                                <thead>
                                <tr>
                                    <th class="tc" width="5%">ID</th>
                                    <th class="tc" width="5%">排序</th>
                                    <th>标题</th>
                                    <th>分类</th>
                                    <th>关键词</th>
                                    <th width="8%">查看次数</th>
                                    <th>是否置顶</th>
                                    <th>创建时间</th>
                                    <th width="10%">操作</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse($articles as $article)
                                    <tr class="content-list">
                                        <td class="tc">{{$article->id}}</td>
                                        <td class="tc">
                                            {{$article->sort}}
                                        </td>
                                        <td>
                                            <a title="{{$article->title}}" style="font-size: 10px;float: left" id="example"
                                               href="{{route('admin.article.show',['id' => $article->id])}}" >{{str_limit($article->title,25)}}</a>
                                        </td>
                                        <td><a href="{{route('admin.article.index',['cate_id' => $article->category['cate_id']])}}" title="进入分类列表"><span class="date badge badge-important">{{$article->category['cate_name']}}</span></a></td>
                                        <td>{{str_limit($article->keyword,20)}}</td>
                                        <td>{{$article->view}}</td>
                                        <td>@if($article->is_top == 1)
                                                是
                                            @else
                                                否
                                            @endif
                                        </td>
                                        <td>{{$article->created_at}}</td>
                                        <td>
                                            @if((new \App\Helpers\UserHelp())->isAdmin())
                                            <a class="btn btn-warning btn-mini" href="{{ route('admin.article.edit',['id' => $article->id]) }}">修改</a>
                                            @endif
                                            @if((new \App\Helpers\UserHelp())->isAdmin())
                                            <a class="btn btn-danger btn-mini" href="javascript:void(0)" onclick="deleteArticle({{$article->id}})">删除</a>
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
                        <span style="margin-left: 10px;">共 {{ $articles->total() }} 条数据</span>
                        <div class="pagination alternate right">
                            <ul>
                                {{--<li class="disabled"><a href="#">Prev</a></li>--}}
                                {{--<li class="active"> <a href="#">1</a> </li>--}}
                                {{--<li><a href="#">2</a></li>--}}
                                {{--<li><a href="#">3</a></li>--}}
                                {{--<li><a href="#">4</a></li>--}}
                                {{--<li><a href="#">Next</a></li>--}}
                                <span style="float: right">{!! $articles->appends(Input::all())->render() !!}</span>
                            </ul>
                        </div>
                    </div>
                    </form>
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
            window.setTimeout("window.location='/admin/article'",2000);
        }

        // - 删除内容
        function deleteArticle(aId){
            layer.msg('确定执行删除操作么?', {
                time: 0 //不自动关闭
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    layer.close(index);
                    // - 执行区域
                    var url = "{{ route('admin.article.destroy') }}";
                    $.ajax({
                        data:{'id':aId},
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
                            window.setTimeout("window.location='/admin/article'",2000);
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

    </body>
@endsection