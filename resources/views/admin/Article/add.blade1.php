@extends('layouts.middle')
@section('middle-content')
<body>
<style>
    .edui-default{line-height: 28px;}
    div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
    {overflow: hidden; height:20px;}
    div.edui-box{overflow: hidden; height:22px;}

</style>
<link rel="stylesheet" type="text/css" href="{{asset('assets/org/diyupload/css/webuploader.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/org/diyupload/css/diyUpload.css')}}">
<script type="text/javascript" src="{{asset('assets/org/diyupload/js/webuploader.html5only.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/org/diyupload/js/diyUpload.js')}}"></script>

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章管理 &raquo; 添加添加
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>添加文章</h3>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{route('admin.article.store')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>选择分类：</th>
                        <td>
                            <select name="cate_id">
                                @forelse($cate_tree as $parent)
                                    <option value="{{$parent->cate_id}}" {{ ($parent->cate_pid == 0 ) ? 'disabled="true"': ''}} >{{$parent->cate_name}}</option>
                                @empty
                                    <option value="">暂无父级分类</option>
                                @endforelse
                            </select>
                            @if($errors->has('cate_id'))
                                <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('cate_id')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" name="title" class="lg" placeholder="请输入文章标题" value="{{old('title')}}">
                            @if($errors->has('title'))
                            <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('title')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>缩略图：</th>
                        <td>
                            <div id="img"></div>*单张大小不能超过500kb
                            <input type="hidden" name="thumb"  id="pic_name" value="{{old('thumb')}}" size="50">
                            @if($errors->has('thumb'))
                                <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('thumb')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标签：</th>
                        <td width="400">
                            <div id="demo2"></div>
                            <input type="hidden" name="tags" value="{{old('tags')}}" id="tags">
                            @if($errors->has('tags'))
                                <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('tags')}}</span>
                            @endif
                            <p style="margin-top: 5px;"><a href="{{url('admin/tag/create')}}">添加标签</a></p>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>内容：</th>
                        <td>
                            <span id="editor" name="content" style="max-width: 850px;height: 260px;" type="text/plain"></span>
                            @if($errors->has('content'))
                                <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('content')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>描述：</th>
                        <td>
                            <textarea name="description" placeholder="请输入分类的描述">{{old('description')}}</textarea>
                            @if($errors->has('description'))
                                <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('description')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <input type="text" name="keyword" class="lg" placeholder="请输入关键词" value="{{old('keyword')}}">
                            @if($errors->has('keyword'))
                                <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('keyword')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" name="sort"  placeholder="请输入排序，正整数" value="{{old('sort')}}">
                            @if($errors->has('sort'))
                                <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('sort')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>作者：</th>
                        <td>
                            <input type="text" name="author"  placeholder="请输入作者" value="{{old('author')}}">
                        </td>
                    </tr>
                    <tr>
                        <th>阅读数：</th>
                        <td>
                            <input type="text" name="view"  placeholder="请输入阅读数" value="{{old('view')}}">
                        </td>
                    </tr>
                    <tr>
                        <th>是否推荐：</th>
                        <td>
                            <input type="radio" name="is_top" value="1">是  &nbsp; &nbsp;
                            <input type="radio" name="is_top" value="0">否
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
<script>
    // - 百度编辑器
    var ue = UE.getEditor('editor', {
        lang: "en",
        zIndex: 900, //默认900
        emotionLocalization: true
    });
</script>
<script>
    // - 文件上传插件
    $('#img').diyUpload({
        url:"{{url('admin/article/upload')}}",
        success:function( data ) {
            $('#pic_name').val(data.path);
            console.info( data.msg );
        },
        error:function( err ) {
            console.info( err );
        },
        buttonText : '上传图片',
        chunked:true,
        // 分片大小
        chunkSize:500 * 1024,
        //最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
        fileNumLimit:1,
        fileSizeLimit:500 * 1024,
        fileSingleSizeLimit:500 * 1024,
        accept: {}
    });

</script>
<script type="text/javascript">
    // - 标签插件
    var data = {!! $tags !!};
    $('#demo2').comboboxfilter({
        url: '',
        scope: 'FilterQuery2',
        multiple: true,
        data:data,
        onChange:function(newValue){
            $('#demo_value').val(newValue);
            $('#tags').val(newValue);
        }
    });



    {{--function submit() {--}}



        {{--var url = "{{route('admin.article.store')}}";--}}
        {{--$.post(url, data).done(function (data) {--}}
            {{--prompt('success', '主机正在创建中');--}}
            {{--window.location = "{{ route('project.virtual.index', ['project_name'=>$projectName]) }}";--}}
        {{--}).fail(function (data) {--}}
            {{--tButton.attr("disabled", false);--}}
            {{--isSummit = false;--}}
            {{--prompt('error', '创建失败：' + data.responseJSON.msg);--}}
        {{--});--}}
    {{--}--}}



</script>
@endsection