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
            <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 内容管理  ➤ 添加内容
        </div>
    </div>
    <div id="content-header">
        <h1>添加内容</h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>添加</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{route('admin.article.store')}}" method="post" id="add-form" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="control-group">
                                <label class="control-label"><i style="color: red">*</i> 选择分类：</label>
                                <div class="controls">
                                    <select name="cate_id" class="span11" style="font-size: 10px">
                                        @forelse($cate_tree as $parent)
                                            <option value="{{$parent->cate_id}}" {{ ($parent->cate_pid == 0 ) ? 'disabled="true"': ''}} >{{$parent->cate_name}}</option>
                                        @empty
                                            <option value="">暂无父级分类</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('cate_id'))
                                        <span class="help-block" style="color: red">{{$errors->first('cate_id')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><i style="color: red">*</i> 标题：</label>
                                <div class="controls">
                                    <input type="text" name="title" id="title" class="span11" placeholder="请输入标题" value="{{old('title')}}"  style="font-size: 10px"/>
                                    @if($errors->has('title'))
                                        <span class="help-block" style="color: red">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">关键词：</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="keyword" value="{{old('keyword')}}" placeholder="请输入关键词，多个用逗号隔开" style="font-size: 10px" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">排序：</label>
                                <div class="controls">
                                    <input type="text" name="sort"  class="span11" value="{{old('sort')}}" placeholder="请输入正整数，默认为0" style="font-size: 10px" />
                                    @if($errors->has('sort'))
                                        <span class="help-block" style="color: red">{{$errors->first('sort')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">作者：</label>
                                <div class="controls">
                                    <input type="text" name="author" class="span11" value="{{old('author')}}" placeholder="请输入作者"  style="font-size: 10px"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">是否置顶：</label>
                                <div class="controls">
                                    <input type="radio" name="is_top" value="1" @if(old('is_top') == 1)checked="checked"@endif> <span style="margin-top: 3px">是</span> &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="is_top" value="0" @if(old('is_top') == 0)checked="checked"@endif> <span style="margin-top: 3px">否</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">浏览次数：</label>
                                <div class="controls">
                                    <input type="text" name="view" class="span11" value="{{old('view')}}" placeholder="请输入浏览次数，默认为0" style="font-size: 10px" />
                                    @if($errors->has('view'))
                                        <span class="help-block" style="color: red">{{$errors->first('view')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><i style="color: red">*</i> 描述：</label>
                                <div class="controls">
                                    <textarea class="span11" id="description" name="description" style="font-size: 10px" placeholder="请输入描述内容" rows="4" cols="20">{{old('description')}}</textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block" style="color: red">{{$errors->first('description')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><i style="color: red">*</i> 内容：</label>
                                <div class="controls">
                                    {{--<span id="editor" name="content" style="max-width:730px;height: 280px;" type="text/plain"></span>{{old('content')}}--}}
                                    <!-- 加载编辑器的容器 -->
                                        <script id="editor" name="content" style="height: 380px;margin-right: 70px" class="content-style" type="text/plain">{!! htmlspecialchars_decode(old('content')) !!}</script>
                                    @if($errors->has('content'))
                                        <span class="help-block" style="color: red">{{$errors->first('content')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" class="btn btn-success" value="保存" onclick=submit_form_add()>
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
<script>
    // - 百度编辑器
    var ue = UE.getEditor('editor', {
        lang: "en",
        zIndex: 900, //默认900
        emotionLocalization: true
    });
</script>
</body>
@endsection
