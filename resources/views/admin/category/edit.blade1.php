@extends('layouts.resource')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 分类管理 &raquo; 修改分类
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
        <br/>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{route('admin.category.update')}}" method="post">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <input type="hidden" name="cate_id" value="{{$category->cate_id}}">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>父级分类：</th>
                        <td>
                            <select name="pid">
                                <option value="0">==顶级分类==</option>
                                @forelse($cate_tree as $parent)
                                    <option value="{{$parent->cate_id}}" {{ $parent->cate_id == $category->cate_pid ? 'selected="selected"': ''}} >{{$parent->cate_name}}</option>
                                @empty
                                    <option value="">暂无父级分类</option>
                                @endforelse
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                            <input type="text" name="cate_name" placeholder="请输入分类名称" value="{{$category->cate_name}}">
                            @if($errors->has('cate_name'))
                            <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('cate_name')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>分类标题：</th>
                        <td>
                            <input type="text" class="lg" name="cate_title" placeholder="请输入分类标题" value="{{$category->cate_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <textarea name="cate_keywords" placeholder="请输入分类的关键词">{{$category->cate_keywords}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="cate_description" placeholder="请输入分类的描述">{{$category->cate_description}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="cate_order" value="{{$category->cate_order}}" placeholder="输入为正整数">
                            @if($errors->has('cate_order'))
                             <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('cate_order')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
@endsection