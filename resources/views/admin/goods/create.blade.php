@extends('layouts.middle')
@section('middle-content')

    <script src="{{asset('assets/diyUpload/jquery.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/diyUpload/css/webuploader.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/diyUpload/css/diyUpload.css')}}">

    <script type="text/javascript" src="{{asset('assets/diyUpload/js/webuploader.html5only.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/diyUpload/js/diyUpload.js')}}"></script>

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
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 商品管理  ➤ 添加商品
            </div>
        </div>
        <div id="content-header">
            <h1>添加商品</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>添加</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('admin.goods.store')}}" method="post" id="add-form" class="form-horizontal">
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 商品图片：</label>
                                    <div class="controls">
                                        <div id="box">
                                            <div id="upload" ></div>
                                        </div>
                                        <input type="hidden" id="pic_path" name="pic_path" value="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 选择分类：</label>
                                    <div class="controls">
                                        <select name="cate_id" class="span11" style="font-size: 10px">
                                                 <option value="0">请选择</option>
                                                <option value="1">百货</option>
                                                <option value="2">服装</option>
                                                <option value="3" >美妆</option>
                                                <option value="4">美食</option>
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
                                    <label class="control-label"><i style="color: red">*</i> 价格：</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="money" value="{{old('money')}}" placeholder="请输入商品价格" style="font-size: 10px" />
                                        @if($errors->has('money'))
                                            <span class="help-block" style="color: red">{{$errors->first('money')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 运费：</label>
                                    <div class="controls">
                                        <input type="text" name="postage" class="span11" value="{{old('postage')}}" placeholder="请输入商品运费"  style="font-size: 10px"/>
                                        @if($errors->has('postage'))
                                            <span class="help-block" style="color: red">{{$errors->first('postage')}}</span>
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

                                        <script type="text/javascript">
                                            $('#upload').diyUpload({
                                                url:"/admin/upload",
                                                success:function( data ) {
                                                    $('#pic_path').val(data.path);
                                                    console.info( data );
                                                },
                                                error:function( err ) {
                                                    console.info( err );
                                                },
                                                buttonText : '选择文件',
                                                chunked:true,
                                            });

                                        </script>
    </body>
@endsection
