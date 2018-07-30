@extends('layouts.middle')
@section('middle-content')
    <style>
        .control-group .controls label{
            display:inline-block;
        }
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}
    </style>
    <body>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 分类管理  ➤ 分类修改
            </div>
        </div>
        <div id="content-header">
            <h1>修改分类</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
                            <h5>修改</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('admin.category.update')}}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="cate_id" value="{{$category->cate_id}}">
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 父级分类：</label>
                                    <div class="controls">
                                        <select name="pid"  class="span11" @if($category->cate_pid == 0)readonly="true" @endif style="font-size: 10px">
                                            <option value="0">==顶级分类==</option>
                                            @forelse($cate_tree as $parent)
                                                <option value="{{$parent->cate_id}}" {{ $parent->cate_id == $category->cate_pid ? 'selected="selected"': ''}} >{{$parent->cate_name}}</option>
                                            @empty
                                                <option value="">暂无父级分类</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 分类名称：</label>
                                    <div class="controls">
                                        <input type="text" name="cate_name" class="span11" placeholder="请输入分类名称" value="{{$category->cate_name}}" style="font-size: 10px">
                                        @if($errors->has('cate_name'))
                                            <span class="help-block" style="color: red">{{$errors->first('cate_name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">分类标题：</label>
                                    <div class="controls">
                                        <input type="text" name="cate_title" class="span11" placeholder="请输入分类标题" value="{{$category->cate_title}}" style="font-size: 10px">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">关键词：</label>
                                    <div class="controls">
                                        <textarea name="cate_keywords" class="span11" placeholder="请输入分类的关键词" style="font-size: 10px">{{$category->cate_keywords}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">描述：</label>
                                    <div class="controls">
                                        <textarea name="cate_description" class="span11" placeholder="请输入分类的描述" style="font-size: 10px">{{$category->cate_description}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">排序：</label>
                                    <div class="controls">
                                        <input type="text" class="sm" name="cate_order" value="{{$category->cate_order}}" placeholder="输入为正整数" style="font-size: 10px">
                                        @if($errors->has('cate_order'))
                                            <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('cate_order')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" class="btn btn-success" value="提交">
                                    <input type="button" class="btn btn-info" onclick="history.go(-1)" value="返回">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.textarea_editor').wysihtml5();
    </script>
    </body>
@endsection